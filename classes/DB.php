
<?php
class DB {

	private static $instance = null;
	private $pdo,
			$query=null,
			$error = false,
			$result=null,
			$count = 0;


	private function __construct(){
		try{
			$this->pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username') ,  Config::get('mysql/password'));
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e) {

			$message=$e->getMessage();
			echo "<script type='text/javascript'>alert('$message');</script>";
			die();

		}
	}

	public static function getInstance() {
		if(!isset(self::$instance)){
			self::$instance = new DB();
		}
		return self::$instance;



	}

	public function startTr(){ // starts a transaction

		$this->pdo->beginTransaction();

	}

	public function commitTr(){ // commit a transaction
		$this->pdo->commit();
	}

	public function rollBackTr(){ //rollback a transaction

		$this->pdo->rollBack();
	}



	public function getLastId(){ // returns the last inserted ID
		return $this->pdo->lastInsertId();
	}

	public function directInsert($sql){ // executes the Insert query

		$this->query=$this->pdo->prepare($sql);
		$this->query->execute();


	}




	public function search($table,$values=array()){ // select and return results
		
		try{

		if(count($values)>0){

		$no=0;

		$select_statement="SELECT * FROM ".$table." WHERE ";
		foreach ($values as $key => $value){
			$no+=1;
			$select_statement .= ($key."=:".$key);
			if($no!=count($values))
				$select_statement .= " AND ";

		}

		$this->query = $this->pdo->prepare($select_statement);

		foreach($values as $key => $value){

			if(is_int($value))
                $param_type = PDO::PARAM_INT;
            elseif(is_bool($value))
                $param_type = PDO::PARAM_BOOL;
            elseif(is_null($value))
                $param_type = PDO::PARAM_NULL;
            elseif(is_string($value))
                $param_type = PDO::PARAM_STR;


			$this->query->bindValue(":".$key,$value,$param_type);
		}
	}

	else{
			$this->query = $this->pdo->prepare("SELECT * FROM ".$table.";");

	}




    		$this->query->execute();


    		$this->result = $this->query->setFetchMode(PDO::FETCH_ASSOC);

    	}catch(PDOException $e){
    		echo "Error: " . $e->getMessage();
    	}

		return $this->query->fetchAll();


	}

	public function directSelect($sql){ //executes the select query and returns results
		try {


    $this->query = $this->pdo->prepare($sql);
    $this->query->execute();


    $this->result = $this->query->setFetchMode(PDO::FETCH_ASSOC);


	}
		catch(PDOException $e) {
    		echo "Error: " . $e->getMessage();
	}
		return $this->query->fetchAll();

	}

	public function directDelete(){ //executes the delete query


	}

	public function insertRow($table,$data=array()){ // easy insert function

	try{

		$values="";
		$columns="";
		$rows=0;
		$param_type=null;
		$state=false;

		foreach ($data as $key => $value) {
			$rows+=1;

				$columns.=$key;
				if($rows!=count($data)) $columns.=",";

				$values.=(":".$key);
				if($rows!=count($data)) $values.=",";


		$prepared_statement="INSERT INTO ".$table." (".$columns.") VALUES (".$values.");";
		$this->query = $this->pdo->prepare($prepared_statement);


		}



		foreach($data as $key => $value){

			if(is_int($value))
                $param_type = PDO::PARAM_INT;
            elseif(is_bool($value))
                $param_type = PDO::PARAM_BOOL;
            elseif(is_null($value))
                $param_type = PDO::PARAM_NULL;
            elseif(is_string($value))
                $param_type = PDO::PARAM_STR;

			$this->query->bindValue(":".$key,$value,$param_type);


		}

		if($this->query->execute())

			$state=true;

	}catch(PDOException $e){

		$message=$e->getMessage();
		echo $message;
		echo "<script type='text/javascript'>alert('$message');</script>";


	}

	return $state;

	}

	public function delete($table,$values=array()){ // executes the delete

		$state=false;
		try{

		$no=0;

		$select_statement="DELETE FROM ".$table." WHERE ";
		foreach ($values as $key => $value){
			$no+=1;
			$select_statement .= ($key."=:".$key);
			if($no!=count($values))
				$select_statement .= " AND ";

		}

		$this->query = $this->pdo->prepare($select_statement);

		foreach($values as $key => $value){

			if(is_int($value))
                $param_type = PDO::PARAM_INT;
            elseif(is_bool($value))
                $param_type = PDO::PARAM_BOOL;
            elseif(is_null($value))
                $param_type = PDO::PARAM_NULL;
            elseif(is_string($value))
                $param_type = PDO::PARAM_STR;


			$this->query->bindValue(":".$key,$value,$param_type);
		}


    		if($this->query->execute())
    			$state=true;




    	}catch(PDOException $e){
    		echo "Error: " . $e->getMessage();
    	}


    	return $state;

	}


	function directUpdate($sql){ //executes the update query
		
		$state=false;
		try {


    	$this->query = $this->pdo->prepare($sql);
    	if($this->query->execute()){
    		$state=true;
    	}



	}catch(PDOException $e) {
    		echo "Error: " . $e->getMessage();
		}

		return $state;

	}







}
