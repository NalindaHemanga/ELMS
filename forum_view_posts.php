<?php
  require_once 'core/init.php';
  $username=$_SESSION["logged_in_user"];

  $member=Member::search(array("member_email"=>$username));
  $name=$member->getInitials()." ".$member->getSurname();

  if(count($_GET)>0){
    $id=$_GET["cid"];
    $post=forumPost::search(array("post_id"=>$id));
    $title=$post->get_Title();
    $des=$post->get_Description();
    $pst_usr=$post->get_Posteduser();
    $pst_date=$post->get_Postdate();
    //print_r($post);
  }
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Forum Template</title>
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
          <?php echo "<div class=\"datagrid\"><table>
          <tbody><tr><td style=\"color:black;\"><b>Discussion Topic : <span style=\"color:black;font-size:120%;\"> $title <span></b></td><td>Posted by :$pst_usr</td></tr>
          <tr class=\"alt\"><td style=\"color:black;font-size:110%;\">$des</td><td>Posted date: $pst_date</td></tr>
          </tbody>
          </table></div>"

           ?>

            <div  style="width:50%;display:inline-block;vertical-align:top;">
              <ul style="list-style-type:none;">
                <li>
                  <div>
                  <input  type="button"  value="Reply" class="button" onclick="showForm()">
                </div>
                </li>
              </ul>
            </div>
            <hr />

            <script type="text/javascript">
              function showForm(){
                document.getElementById("dialog").showModal();
              }
            </script>

            <dialog id= "dialog">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <label style="padding-left:23px;">Subject     :</label>   <input type="text" name="subject" required>
              <br><br>
              Description: <textarea style="vertical-align: middle;" rows="4" cols="50" name="description" required></textarea>
              <br><br>
              <input type="submit" name="submit" value="Submit" >
            </form>
          </dialog>

        

            <br><br>
        </div>
        </div>

       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
