
<!DOCTYPE html>
<html>
<head>
<title>Forum Template</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
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
   New Topic  :    <input type="text" name="topic">
   <br><br>
   Description: <textarea style="vertical-align: middle;" rows="4" cols="50" name="description"></textarea>
   <br><br>
   <input type="submit" name="submit" value="Submit" required>
</form>
</dialog>
            <?php

            require_once 'core/init.php';

// define variables and set to empty values

$topic = $description = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $topic = test_input($_POST["topic"]);
   $description = test_input($_POST["description"]);

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$new_forum_topic = new ForumPost();

    $new_forum_topic->createNew(array('category_title' => $topic, 'category_description'=>$description));
    $new_forum_topic->register();


$allposts = forumPost::getallForum();
foreach ($allposts as $key => $value) {
    $title=$value->get_Title();
    $des=$value->get_Description();
    echo "<a href='#' class='cat_links'> <b>$title</b> : <hr> <br><i>$des</i></a><br> ";

}

?>



        </div>
        </div>

       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
