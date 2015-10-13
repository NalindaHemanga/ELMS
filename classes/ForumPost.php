<?php

class ForumPost{

	private $category_id,
			$category_title,
			$category_description,
			$last_post_date,
			$last_user_posted;






	public function __construct(){

	}



	public function create($data=array()){

		$this->category_id 					=	$data["category_id"];
		$this->category_title 				= 	$data["category_title"];
		$this->category_description			=	$data["category_description"];
		$this->last_post_date 	= 	$data["last_post_date"];
		$this->last_user_posted			=   $data["last_user_posted"];


	}


	public function createNew($data=array()){

		//$this->category_id 					=	$data["category_id"];
		$this->category_title 				= 	$data["category_title"];
		$this->category_description			=	$data["category_description"];
		//$this->last_post_date 	= 	$data["last_post_date"];
		//$this->last_user_posted			=   $data["last_user_posted"];


	}



	public function get_Title(){

		return $this->category_title;

	}



	public function get_Description(){

		return $this->category_description;

	}





	public function get_id(){

		return $this->id;

	}




	public function register(){

		$row=array(


				"category_id" => $this->category_id,
				"category_title" => $this->category_title,
				"category_description" => $this->category_description,
				"last_post_date" => $this->last_post_date,
				"last_user_posted" => $this->last_user_posted,


			);


		if(DB::getInstance()->insertRow("forum_category",$row)){
			return true;
		}
		else
			return false;

	}


		public static function getallForum(){

		$result=DB::getInstance()->directSelect("SELECT * FROM forum_category;");

		$allforums = array();
		foreach ($result as $key => $row) {
		$forum_post = new forumPost;
		$forum_post->create($row);
		$allforums[]=$forum_post;

				}
	return $allforums;
	}




	public static function search($values=array()){






}
}


?>
