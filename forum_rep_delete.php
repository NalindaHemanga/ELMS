<?php
/*
 forum_rep_delete.PHP
 Deletes a specific entry from the 'forum_reply' table
*/

 // connect to the database
 require_once 'core/init.php';

 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['rid']))
 {
 // get id value
 $id = $_GET['rid'];

 // delete the entry
 DB::getInstance()->delete("forum_reply",array("reply_id"=>$id));

 // redirect back to the forum_view_posts page
 header("Location: forum_view_posts.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to forum_view_posts page
 {
 header("Location: forum_view_posts.php");
 }

?>
