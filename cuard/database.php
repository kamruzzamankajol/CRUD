<?php
Class Database{
	public $host = DB_HOST;
	public $user = DB_USER;
	public $pass = DB_PASS;
	public $db_name = DB_NAME;


    public $link;
    public $error;

    public function __construct(){

    	$this->connectDB ();

    }

    private function connectDB (){

    	$this->link = new mysqli ($this->host, $this->user, $this->pass, $this->db_name);

    	if(!$this->link){

    		$this->error ="failed".$this->link->connect_error;
            return false;
    	}
    }

    //SELECT OR READ DATA

    public function select($query){
    	$result = $this->link->query($query) or die ($this->link->error.__LINE__);
    	if($result->num_rows > 0){

    		return $result;
    	}else{
    		return false;
    	}
    }
   //INSER THE DATA

    public function insert($query){

    	$inset_row = $this->link->query($query) or die ($this->link->error.__LINE__);

    	if($inset_row){

    		header("Location:part1.php?msg=".urlencode('successful.'));
    		exit();
    	}else{

    		die("error : (".$this->link->errno.")".$this->link->error);
    	}
    }

    //update data 

    public function update($query){

    	$update_row = $this->link->query($query) or die ($this->link->error.__LINE__);

    	if($update_row){

    		header("Location:part1.php?msg=".urlencode('successful.'));
    		exit();
    	}else{

    		die("error : (".$this->link->errno.")".$this->link->error);
    	}
    }


} 
?>