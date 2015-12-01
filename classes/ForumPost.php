<?php

class forumPost{

	private $post_id,
			$post_title,
			$post_description,
			$posted_date,
			$posted_user;

	public function __construct(){

	}



	public function create($data=array()){

		$this->post_id 					=	$data["post_id"];
		$this->post_title 				= 	$data["post_title"];
		$this->post_description			=	$data["post_description"];
		$this->posted_date 	= 	$data["posted_date"];
		$this->posted_user			=   $data["posted_user"];


	}


	public function createNew($data=array()){

		//$this->post_id 					=	$data["post_id"];
		$this->post_title 				= 	$data["post_title"];
		$this->post_description			=	$data["post_description"];
		$this->posted_date 	= 	$data["posted_date"];
		$this->posted_user			=   $data["posted_user"];


	}


//define the methods
	public function get_Title(){

		return $this->post_title;

	}



	public function get_Description(){

		return $this->post_description;

	}


	public function get_id(){

		return $this->post_id;

	}

	public function get_Posteduser(){

		return $this->posted_user;

	}

	public function get_Postdate(){

		return $this->posted_date;

	}


	public function register(){

		$row=array(


				"post_id" => $this->post_id,
				"post_title" => $this->post_title,
				"post_description" => $this->post_description,
				"posted_date" => $this->posted_date,
				"posted_user" => $this->posted_user,


			);


		if(DB::getInstance()->insertRow("forum_posts",$row)){
			return true;
		}
		else
			return false;

	}


		public static function getallForum(){

		$result=DB::getInstance()->directSelect("SELECT * FROM forum_posts;");

		$allforums = array();
		foreach ($result as $key => $row) {
		$forum_post = new forumPost;
		$forum_post->create($row);
		$allforums[]=$forum_post;

				}
	return $allforums;
	}




	public static function search($values=array()){



		$posts=array();
		$result1=DB::getInstance()->search("forum_posts",$values);

foreach ( $result1 as $post){


			$post_data=array(

				"post_id" 					=>	$post["post_id"],
				"post_title" 					=>	$post["post_title"],
				"post_description"	 				=> 	$post["post_description"],
				"posted_date"					=>	$post["posted_date"],
				"posted_user" 	=> 	$post["posted_user"],


				);

			$new_post=new forumPost();

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
