<?php
  require_once 'core/init.php';
  $username=$_SESSION["logged_in_user"];

  $member=Member::search(array("member_email"=>$username));
  $name=$member->getInitials()." ".$member->getSurname();

//get the entered details of forum discussions and save in a session variable
  if(count($_GET)>0){
      $_SESSION["id"]=$_GET["cid"];
      $_SESSION["post"]=ForumPost::search(array("post_id"=>$_SESSION["id"]));
      $_SESSION["title"]=$_SESSION["post"]->get_Title();
      $_SESSION["des"]=$_SESSION["post"]->get_Description();
      $_SESSION["pst_usr"]=$_SESSION["post"]->get_Posteduser();
      $_SESSION["pst_date"]=$_SESSION["post"]->get_Postdate();
      //print_r($post);
    }
    $new_id=$_SESSION["id"];
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Forum Reply</title>
<link rel="stylesheet" type="text/css" href="css/modelwindow.css" />
<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/replypost.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/forum_styles.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
</head>
<body>
    <div id="wrapper">
        <?php include "includes/header.php" ?>

        <?php include "includes/leftnav.php" ?>
        <div id="contentwrap">
        <div id="content">
  <?php
  ob_start();
    //Compare the logged user and posted user is same or not
    if ($name==$_SESSION["pst_usr"]){
      //get details of reply posts
      $allposts = forumReply::getallForumReply();
      //define the delete variable to delete post. this will unavailable if foreach execute
      $link_post_del="<a id='delete_link' href=\"forum_posts_delete.php?pid=".$_SESSION["id"]."'\" class='links' onclick=\"return confirm('Are you sure you want to delete this?')\">Delete</a>";
      //check availabilty of foriegn key post_id (table forum_reply) of primary key post id (table forum_post)
      foreach ($allposts as $key =>$value) {
        $post_id=$value->get_Postid();
        if ($post_id==$_SESSION["id"]){
          $link_post_del='';
          break;

        }
          
      }
      
     }
   
    
    // Compare the logged user & posted user to show delete link
    
    else{
      $link_post_del='';
    }
  
          // Print the discussion topic
          echo "<div class=\"datagrid\"><table>
          <tbody><tr><td style=\"color:black;\"><b>Discussion Topic : <span style=\"color:black;font-size:120%;\">".$_SESSION["title"]. "<span></b></td><td>Posted by :".$_SESSION["pst_usr"]."</td></tr>
          <tr class=\"alt\"><td style=\"color:black;font-size:110%; max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: normal;\"><p style=\"width:230px; word-wrap: break-word;
            width: 580px;color:black; padding-right:5px;\"> ".$_SESSION["des"]."</p><br>$link_post_del</td><td>Posted date: ".$_SESSION["pst_date"]." </td></tr>
          </tbody>
          </table></div>"

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

            <!-- Model Window for edit option -->
            <div id="openeditModel" class="modalDialog">
              <div>
                <div class="form">
                <a href="#close" title="Close" class="close">X</a>
                  <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  Reply: 
                  <br><br>
                  <textarea id="text_area" style="vertical-align: middle;" rows="10" cols="86" name="reply" required></textarea>
                  <br>              
                  <br>
                  <input class="button" type="submit" name="submit_rep" value="Submit" >
                  </form>
                  </div>
              </div>
            </div>
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
echo "<div class='datagrid' style=\"table-layout:fixed; cellpadding=10;\"><table><thead><tr><th width=\"70%\">Reply</th><th width=\"10%\">Posted Date</th><th width=\"10%\">Posted By</th></tr></thead>";
$allposts = forumReply::getallForumReply();
foreach ($allposts as $key => $value) {
  $post_id=$value->get_Postid();
  if ($post_id==$_SESSION["id"]){
    $reply_id=$value->get_Replyid();
    #$subject=$value->get_Title();
    $reply=$value->get_Post();
    $reply_pst_usr=$value->get_Posteduser();
    $reply_pst_date=$value->get_Postdate();


    // Compare the loged user & posted user to show delete link
    if ($name==$reply_pst_usr) {
      $link_del="<a id='delete_link' href=\"forum_rep_delete.php?rid=".$reply_id."\" class='links' onclick=\"return confirm('Are you sure you want to delete this?')\">Delete</a>";
      
      $link_update="<a id='delete_link' onClick='javascript:showEdit(this);' href=\"#openeditModel\" class='links'>Edit</a>";
    }
    else{
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
                document.getElementById('text_area').innerHTML = x;
                document.getElementById('openeditModel').showModal();
              }
            </script>"; 

  //print the replys
    echo "
    <tbody><tr><td style=\"max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: normal;\"><p ><div style=\"width:230px;word-wrap: break-word;
     width: 790px;color:black; padding-right:5px;\" id='$reply_id'><div id='$reply_id+$post_id'>$reply</div><br><br><br>$link_del"." "."$link_update</p></div></td><td>$reply_pst_date</td><td> $reply_pst_usr</td></tr>
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
