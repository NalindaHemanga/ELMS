<?php
/*
 forum_rep_delete.PHP
 Deletes a specific entry from the 'forum_post' table
*/

 // connect to the database
 require_once 'core/init.php';

 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['pid']))
 {
 // get id value
 $id = $_GET['pid'];

 // delete the entry
 DB::getInstance()->delete("forum_posts",array("post_id"=>$id));

 // redirect back to the forum_view_posts page
 header("Location: forum_p.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to forum_view_posts page
 {
 header("Location: forum_p.php");
 }

?>