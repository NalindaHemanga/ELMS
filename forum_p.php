<?php
ob_start();
  require_once 'core/init.php';

  $username=$_SESSION["logged_in_user"];

  $member=Member::search(array("member_email"=>$username));
  $name=$member->getInitials()." ".$member->getSurname();

 ?>
<!DOCTYPE html>
<html>
<head>
<title>Forum Posts</title>
<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/forumtable.css" />
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



            <div  style="width:50%;display:inline-block;vertical-align:top;">
              <ul style="list-style-type:none;">
                <li>
                  <font face="Agency FB" color="black" size="6px" ><Strong>Discussion Forum</Strong></font>
                </li>
                <li>
                  Start your discussions here
                </li>
              </ul>
            </div>
            <hr />

            <input  type="button"  value="Start New Discussion Forum" class="button" onclick="showForm()">
            <br><br>

            <script type="text/javascript">
              function showForm(){
                document.getElementById("dialog").showModal();
              }
            </script>


            <dialog id= "dialog">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              New Topic  :    <input type="text" name="topic" required>
              <br><br>
              Description: <textarea style="vertical-align: middle;" rows="4" cols="50" name="description" required></textarea>
              <br><br>
              <input type="submit" name="submit" value="Submit" >
            </form>
          </dialog>



<?php

// define variables and set to empty values

$topic = $description = "";
date_default_timezone_set("Asia/Colombo");
$date=date("Y-m-d H:i:s");

$_SESSION["formdatas"]=$topic and $description;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['description'])) {
    $topic = test_input($_POST["topic"]);
    $description = test_input($_POST["description"]);
    }


}


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

//update forum_post table
if(isset($_POST['submit']))
{
  $new_forum_topic = new ForumPost();

      $new_forum_topic->createNew(array('post_title' => $topic, 'post_description'=>$description, 'posted_user'=>$name,'posted_date'=>$date ));
      $new_forum_topic->register();
      header('Location: forum_p.php');
      exit();
}
ob_flush();


//Get details from forum_post table
echo "<div class='datagrid'><table>
    <thead><tr><th>Discussion</th><th>Posted by</th><th>Date</th></tr></thead>";
$allposts = ForumPost::getallForum();
foreach ($allposts as $key => $value) {
    $id=$value->get_id();
    $title=$value->get_Title();
    #$des=$value->get_Description();
    $pst_usr=$value->get_Posteduser();
    $pst_date=$value->get_Postdate();
    //echo "<a href='forum_view_posts.php?cid=".$id."' class='cat_links'>  <b>$title</b>:  <br> Posted By <i>$pst_usr</i> </a>  ";
    echo "
        <tbody><tr><td><a href='forum_view_posts.php?cid=".$id."' style='text-decoration: none; color:#0912cb;'>$title</a></td><td>$pst_usr</td><td>$pst_date</td></tr>
        <tr class=\"alt\">
        </tr>
        </tbody>
        ";
}
echo "</table></div>";

?>

        </div>
        </div>

       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
