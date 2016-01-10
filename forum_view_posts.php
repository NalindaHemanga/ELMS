<?php
  require_once 'core/init.php';
  $username=$_SESSION["logged_in_user"];

  $member=Member::search(array("member_email"=>$username));
  $name=$member->getInitials()." ".$member->getSurname();
  $roles = $member->getRoles();
  $rolesArray=explode(",", $roles);

//get the entered details of forum discussions and save in a session variable
  if(count($_GET)>0){
      $_SESSION["id"]=$_GET["cid"];
      $_SESSION["post"]=ForumPost::search(array("post_id"=>$_SESSION["id"]));
      $_SESSION["title"]=$_SESSION["post"]->get_Title();
      $_SESSION["des"]=$_SESSION["post"]->get_Description();
      $_SESSION["pst_usr"]=$_SESSION["post"]->get_Posteduser();
      $_SESSION["pst_date"]=$_SESSION["post"]->get_Postdate();
    }
//Put into variable to ease to use
$new_id=$_SESSION["id"];

?>
<!DOCTYPE html>
<html>
<head>
  <title>Forum Reply</title>
  <link rel="stylesheet" type="text/css" href="css/modelwindow.css" />
  <link rel="stylesheet" type="text/css" href="css/forumtable.css" />
  <link rel="stylesheet" type="text/css" href="css/content.css" />
  <link rel="stylesheet" type="text/css" href="css/replypost.css" />
  <link rel="stylesheet" type="text/css" href="css/btn.css" />
  <link rel="stylesheet" type="text/css" href="css/wrapper.css" />
  <link rel="stylesheet" type="text/css" href="css/forum_styles.css" />
  <link rel="stylesheet" type="text/css" href="css/form.css" />
</head>

<body>

<script src="lib/jquery.min.js"></script>
  <div id="wrapper">
    <?php include "includes/header.php" ?>
    <?php include "includes/leftnav.php" ?>

    <div id="contentwrap">
      <div id="content">

<?php
  ob_start();

  $x=0;
  $link_post_del='';
  $link_update_post='';

//Checked the logged user is an admin and also posted user
  foreach ($rolesArray as $m_role) {
    $m_role=str_replace(" ","%19%",$m_role);
    $allposts = forumReply::getallForumReply();
    if ($m_role=='%19%System%19%Administrator%19%' && $name==$_SESSION["pst_usr"]){
      $x=1;

      $link_post_del="<a id='delete_link' href=\"forum_posts_delete.php?pid=".$_SESSION["id"]."'\" class='links' onclick=\"return confirm('Are you sure you want to delete this?')\">Delete</a>";
      $link_update_post="<a id='delete_link' onClick='javascript:showeditPost(this);' href=\"#openeditpostModal\" class='links'>Edit</a>";
      //Check whether there are replied
      foreach ($allposts as $key =>$value) {
        $post_id=$value->get_Postid();
        if ($post_id==$_SESSION["id"]){
          $link_post_del="<a id='delete_link' href=\"forum_posts_delete.php?pid=".$_SESSION["id"]."'\" class='links' onclick=\"return confirm('Are you sure you want to delete this?')\">Delete</a>";
          $link_update_post='';
          break;
        }
      }
    }


//Check the logged user is only the admin but not the posted user
    else if ($m_role=='%19%System%19%Administrator%19%' && $name!=$_SESSION["pst_usr"]){
      $x=1;

      $link_post_del="<a id='delete_link' href=\"forum_posts_delete.php?pid=".$_SESSION["id"]."'\" class='links' onclick=\"return confirm('Are you sure you want to delete this?')\">Delete</a>";
      $link_update_post="";

      //Check whether there are replied
      foreach ($allposts as $key =>$value) {
        $post_id=$value->get_Postid();
        if ($post_id==$_SESSION["id"]){
          $link_post_del="<a id='delete_link' href=\"forum_posts_delete.php?pid=".$_SESSION["id"]."'\" class='links' onclick=\"return confirm('Are you sure you want to delete this?')\">Delete</a>";
          $link_update_post='';
          break;
        }
      }
    }
   }

// Compare the logged user & posted user to show delete link
    if ($name==$_SESSION["pst_usr"] && $x==0){
      //get details of reply posts
      $allposts = forumReply::getallForumReply();
      //define the delete variable to delete post. this will unavailable if foreach execute
      $link_post_del="<a id='delete_link' href=\"forum_posts_delete.php?pid=".$_SESSION["id"]."'\" class='links' onclick=\"return confirm('Are you sure you want to delete this?')\">Delete</a>";
      $link_update_post="<a id='delete_link' onClick='javascript:showeditPost(this);' href=\"#openeditpostModel\" class='links'>Edit</a>";
      //check availabilty of foriegn key post_id (table forum_reply) of primary key post id (table forum_post)
      foreach ($allposts as $key =>$value) {
        $post_id=$value->get_Postid();
        if ($post_id==$_SESSION["id"]){
          $link_post_del='';
          $link_update_post='';
          break;
        }         
      }    
     }
     
echo "<script type='text/javascript'>
              function showeditPost(element){
                var e_post = element.parentNode;
                var rep = e_post.querySelector('div');
                var rep_content = document.getElementById(rep.id);
                var x = rep_content.innerHTML;
                document.getElementById('post_des').value = x;
                document.getElementById('postedit_id').value=e_post.id;
                document.getElementById('openeditpostModal').showModal();
              }
            </script>"; 
    
    
// Print the discussion topic
echo "<div class=\"datagrid\"><table>
<thead><tr><th width=\"80%\" ><span style=\"color:black;font-size:100%;\"><b>Discussion Topic :</b></span></br><hr><span style='font-size:90%;text-align:justify;'>".$_SESSION["title"]. "</span><br><br></th><th width=\"20%\"><span style=\"color:black;font-size:120%;\">Posted by :</span>".$_SESSION["pst_usr"]."</th></tr></thead>";

echo "<tbody>
<td><div id='$new_id'><div  style='text-align:justify;'  id='$new_id+100' >".$_SESSION["des"]."</div><br>$link_post_del"." "."$link_update_post</div></td><td>Posted date: ".$_SESSION["pst_date"]." </td></tr>
<tr class=\"alt\">
</tbody>";

echo "</table></div>";

?>
<!--Reply Button-->
<div  style="width:50%;display:inline-block;vertical-align:top;">
  <ul style="list-style-type:none;">
    <li>
      <div>
      <input  type="button"  value="Reply" class="button" onclick="buttonClicked()">
        <a href="#openModal" onClick='javascript:showForum();' style="visibility: hidden;"><b>Reply</b></a>
      </div>
    </li>
  </ul>
</div>
            
<hr />

<!-- show model after click reply button -->
<script type="text/javascript">
  function buttonClicked(){
    location.href="#openModal"; 
  }    
//Close function for edit option
  function closeModel(){
    document.getElementsByClassName("close")[0].click();
    window.location.reload()
  }
</script>

            <!-- Model Window for Reply-->
            <div id="openModal" class="modalDialog">
              <div>
                <div class="form">
                <a href="#close" title="Close" class="close">X</a>
                  <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  Reply: 
                  <br><br>
                  <textarea style="vertical-align: middle;" rows="10" cols="86" name="reply" required></textarea>
                  <br>              
                  <br>
                  <input class="button" type="submit" name="submit" value="Submit" >
                  </form>
                  </div>
              </div>
            </div>

            <!-- Model Window for Edit Discussion -->
            <div id="openeditpostModal" class="modalDialog">
              <div>
                <div class="form">
                <a href="#close" title="Close" class="close">X</a>
                  <form class="form" method="post">
                  <input id="postedit_id" type="hidden" name="id" value="">
                  Description : 
                  <br><br>
                  <textarea id="post_des" style="vertical-align: middle;" rows="10" cols="86" name="description" value="" required></textarea>
                  <br>              
                  <br>
                  <input id="submit_discussion" class="button" type="submit" name="submit_post" value="Submit" onclick="closeModel();" >
                  <span id ="save_statuss"></span>
                  </form>
                  </div>
              </div>
            </div>
<script type="text/javascript" src="js/ajax_update_discussion.js"></script>


            <!-- Model Window for edit option -->
            <div id="openeditModel" class="modalDialog">
              <div>
                <div class="form">
                <a href="#close" title="Close" class="close">X</a>
                  <form id="update_rep" class="form" method="post">
                  
                  Reply: 
                  <br><br>
                  <textarea id="text_area" style="vertical-align: middle;" rows="10" cols="86" name="reply" value="" required></textarea>
                  <input id="reply_id" type="hidden" name="id" value="">
                  <br>              
                  <br>
                  <input class="button" type="button" id="submit_rep" name="submit_rep" value="Submit" onclick="closeModel();">
                  <span id ="save_statuss"></span>
                  </form>
                  </div>
              </div>
            </div>
<script type="text/javascript" src="js/ajax.js"></script>

<?php
// define variables and set to empty values
$subject = $reply = $reply_pst_date = $reply_pst_usr= "";
date_default_timezone_set("Asia/Colombo");
$date=date("Y-m-d H:i:s");

$_SESSION["formdatas"]=$subject and $reply;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['reply'])) {
    //$subject = test_input($_POST["subject"]);
    $reply   = test_input($_POST["reply"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Update the database -> forum_reply table
if(isset($_POST['submit'])){
  $new_forum_topic = new forumReply();
  $new_forum_topic->createNew(array('post_id' => $_SESSION["id"], 'reply_title'=>$subject, 'reply_post'=>$reply, 'reply_posted_user'=>$name,'reply_posted_date'=>$date ));
  $new_forum_topic->register();
  header("Location: forum_view_posts.php?cid=" .$_SESSION["id"]);
  exit();
}
ob_flush();

// Get the updated details of forum_reply table
echo "<div class='datagrid'>
<table><thead><tr><th width=\"70%\">Reply</th><th width=\"10%\">Posted Date</th><th width=\"10%\">Posted By</th></tr></thead>";
$allposts = forumReply::getallForumReply();
foreach ($allposts as $key => $value) {
  $post_id=$value->get_Postid();
  if ($post_id==$_SESSION["id"]){
    $reply_id=$value->get_Replyid();
    #$subject=$value->get_Title();
    $reply=$value->get_Post();
    $reply_pst_usr=$value->get_Posteduser();
    $reply_pst_date=$value->get_Postdate();

  $y=0;
  $link_del='';
  $link_update='';

//Checked the logged user is an admin and also posted user
  foreach ($rolesArray as $role) {
    $role=str_replace(" ","%19%",$role);
    if ($role=='%19%System%19%Administrator%19%' && $name==$reply_pst_usr){
      $y=1;
      $link_del="<a id='delete_link' href=\"forum_rep_delete.php?rid=".$reply_id."\" class='links' onclick=\"return confirm('Are you sure you want to delete this?')\">Delete</a>";
      $link_update="<a id='delete_link' onClick='javascript:showEdit(this);' href=\"#openeditModel\" class='links'>Edit</a>";
    }
    } 

    foreach ($rolesArray as $role) {
    $role=str_replace(" ","%19%",$role);
    if ($role=='%19%System%19%Administrator%19%' && $name!=$reply_pst_usr){
      $y=1;
      $link_del="<a id='delete_link' href=\"forum_rep_delete.php?rid=".$reply_id."\" class='links' onclick=\"return confirm('Are you sure you want to delete this?')\">Delete</a>";
      $link_update="";
    } 
  }

    // Compare the loged user & posted user to show delete link
    if ($name==$reply_pst_usr && $y==0) {
      $link_del="<a id='delete_link' href=\"forum_rep_delete.php?rid=".$reply_id."\" class='links' onclick=\"return confirm('Are you sure you want to delete this?')\">Delete</a>";
      
      $link_update="<a id='delete_link' onClick='javascript:showEdit(this);' href=\"#openeditModel\" class='links'>Edit</a>";
    }
    else if ($name!=$reply_pst_usr && $y==0){
      $link_del='';
      $link_update='';
    }

    //function : Load the replies to model window

    echo "<script type='text/javascript'>
              function showEdit(element){
                var reply = element.parentNode;
                var rep = reply.querySelector('div');
                var rep_content = document.getElementById(rep.id);
                var x = rep_content.innerHTML;
                document.getElementById('text_area').value = x;
                document.getElementById('reply_id').value=reply.id;
                document.getElementById('openeditModel').showModal();
              }
            </script>"; 

  //print the replys
    echo "
    <tbody><tr><td style=\"text-overflow: ellipsis; white-space: initial;\"><p ><div style=\" word-wrap: break-word;
     color:black; padding-right:5px; text-align:justify;\" id='$reply_id'><div id='$reply_id+$post_id'>$reply</div><br>$link_del"." "."$link_update</p></div></td><td>$reply_pst_date</td><td> $reply_pst_usr</td></tr>
    <tr class=\"alt\">
    </tr>
    </tbody>";
  }
}
    echo "</table></div>";

?>


        </div>
        </div>

       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
