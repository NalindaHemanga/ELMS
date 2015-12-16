<?php

//define the forumreply class
class forumReply{

	private $reply_id,
			$post_id,
			$reply_title,
			$reply_post,
			$reply_posted_user,
			$reply_posted_date;

      public function __construct(){

      }



      public function create($data=array()){

        $this->reply_id 					=	$data["reply_id"];
        $this->post_id 				= 	$data["post_id"];
        $this->reply_title			=	$data["reply_title"];
        $this->reply_post 	= 	$data["reply_post"];
        $this->reply_posted_user			=   $data["reply_posted_user"];
        $this->reply_posted_date			=   $data["reply_posted_date"];


      }


      public function createNew($data=array()){

        //$this->post_id 					=	$data["post_id"];
        $this->post_id            = $data["post_id"];
        $this->reply_title 				= 	$data["reply_title"];
        $this->reply_post			=	$data["reply_post"];
        $this->reply_posted_user 	= 	$data["reply_posted_user"];
        $this->reply_posted_date			=   $data["reply_posted_date"];


      }


//define the methods
      //Get reply_title from forum_reply table
      public function get_Title(){

        return $this->reply_title;

      }


      //Get reply_post from forum_reply table
      public function get_Post(){

        return $this->reply_post;

      }

      //Get reply_id from forum_reply table
      public function get_Replyid(){

        return $this->reply_id;

      }
      //Get post_id from forum_reply table
      public function get_Postid(){

        return $this->post_id;

      }
      //Get reply_posted_user from forum_reply table
      public function get_Posteduser(){

        return $this->reply_posted_user;

      }
      //Get reply_posted_date from forum_reply table
      public function get_Postdate(){

        return $this->reply_posted_date;

      }

      //register the data
      public function register(){

        $row=array(


            "reply_id" => $this->reply_id,
            "post_id" => $this->post_id,
            "reply_title" => $this->reply_title,
            "reply_post" => $this->reply_post,
            "reply_posted_date" => $this->reply_posted_date,
            "reply_posted_user" => $this->reply_posted_user,


          );


        if(DB::getInstance()->insertRow("forum_reply",$row)){
          return true;
        }
        else
          return false;

      }


        public static function getallForumReply(){

        $result=DB::getInstance()->directSelect("SELECT * FROM forum_reply;");

        $allforums = array();
        foreach ($result as $key => $row) {
        $forum_post = new forumReply;
        $forum_post->create($row);
        $allforums[]=$forum_post;

            }
      return $allforums;
      }


//return post_id values to forum_view_posts.php
      public static function getAllPostId(){
        $result2=DB::getInstance()->directSelect("SELECT post_id FROM forum_reply;");
        return $result2;
      }


      public static function search($values=array()){

        $posts=array();
        $result1=DB::getInstance()->search("forum_reply",$values);

      foreach ( $result1 as $post){


          $post_data=array(
            "reply_id" 					=>	$post["post_id"],
            "post_id" 					=>	$post["post_id"],
            "reply_title" 					=>	$post["post_title"],
            "reply_post"	 				=> 	$post["reply_post"],
            "reply_posted_date"			=>	$post["reply_posted_date"],
            "reply_posted_user" 	=> 	$post["reply_posted_user"],


            );

          $new_post=new forumReply();

          $new_post->create($post_data);
          $posts[]=$new_post;

        }
        if(count($posts)==1){

          return $posts[0];
        }
        else{
          return $posts;
        }
        /*}
        else{
          return null;

      }*/

      }
      }

      ?>
