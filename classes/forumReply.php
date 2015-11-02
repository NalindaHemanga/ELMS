<?php

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
        $this->post_id            = $data["post_id"]
        $this->reply_title 				= 	$data["reply_title"];
        $this->reply_post			=	$data["reply_post"];
        $this->reply_posted_user 	= 	$data["reply_posted_user"];
        $this->reply_posted_date			=   $data["reply_posted_date"];


      }



      public function get_Title(){

        return $this->reply_title;

      }



      public function get_Post(){

        return $this->reply_post;

      }


      public function get_Replyid(){

        return $this->reply_id;

      }

      public function get_Postid(){

        return $this->post_id;

      }

      public function get_Posteduser(){

        return $this->reply_posted_user;

      }

      public function get_Postdate(){

        return $this->reply_posted_date;

      }


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


        public static function getallForum(){

        $result=DB::getInstance()->directSelect("SELECT * FROM forum_reply;");

        $allforums = array();
        foreach ($result as $key => $row) {
        $forum_post = new forumReply;
        $forum_post->create($row);
        $allforums[]=$forum_post;

            }
      return $allforums;
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
