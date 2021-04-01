<?php

require_once 'KLogger.php';

class Dao {

public $dsn ='mysql:dbname=heroku_2f5a5fc0489b985;host=us-cdbr-east-03.cleardb.com';
public $user ='b2d0c95d74e935';
public $password = "cdbdc263";

  //public $dsn = 'mysql:dbname=webdev;host=127.0.0.1';
  //public $user = "root";
  //public $password = "password";
  protected $logger;

  public function __construct () {
    $this->logger = new KLogger ( "log.txt" , KLogger::DEBUG );
  }

  private function getConnection () {
    try {
        $connection = new PDO($this->dsn, $this->user, $this->password);
        $this->logger->LogDebug("Got a connection");
    } catch (PDOException $e) {
        $error = 'Connection failed: ' . $e->getMessage();
        $this->logger->LogError($error);
    }
    return $connection;
  }

  public function userExist ($email, $password) {
    $connection = $this->getConnection();
    try {
        $q = $connection->prepare("select count(*) as total from user where email = :email and password = :password");
        $q->bindParam(":email", $email);
        $q->bindParam(":password", $password);
        $q->execute();
        $row = $q->fetch();
        if ($row['total'] == 1) {
           $this->logger->LogInfo("user found!" . print_r($row,1));
           return true;
        } else {
           return false;
        }
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }

  }
  
  public function createUser ($email, $password, $name) {
	/*
		if (userExists($email)){
			return false;
		}
	*/
	$connection = $this->getConnection();
	$this->logger->LogInfo("email: " . $email);
	$this->logger->LogInfo("password: " . $password);
	$this->logger->LogInfo("name: " . $name);

	
	try {
		$data = [
			'email' => $email,
			'password' => $password,
			'name' => $name
			
		];
		$sql = "INSERT INTO user (email, password, name) VALUES (:email, :password, :name)";
		$q= $connection->prepare($sql);
		$q->execute($data);
		$result = $q->fetch();
		$this->logger->LogInfo("Status: " . print_r($result));
		return true;
	} catch(Exception $e) {
	  echo print_r($e,1);
	  exit;
	}
  }
  
    public function getArtists () {
    $connection = $this->getConnection();
    try {
      $data = $connection->query("SELECT email, name FROM user")->fetchAll();
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
    return $data;
  }


  public function deleteComment ($id) {
    $this->logger->LogInfo("deleting comment id [{$id}]");
    $conn = $this->getConnection();
    $deleteQuery = "delete from comment where comment_id = :id";
    $q = $conn->prepare($deleteQuery);
    $q->bindParam(":id", $id);
    $q->execute();
  }

  public function insertComment ($name, $comment, $imagePath) {
    $this->logger->LogInfo("inserting a comment name=[{$name}], comment=[{$comment}]");
    $conn = $this->getConnection();
    $saveQuery = "insert into comment (name, comment, image_path) values (:name, :comment, :image_path)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":name", $name);
    $q->bindParam(":comment", $comment);
    $q->bindParam(":image_path", $imagePath);
    $q->execute();
  }

  public function getComments () {
    $connection = $this->getConnection();
    try {
        $rows = $connection->query("select name, comment_id, comment, image_path, date_entered from comment order by date_entered desc", PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
    return $rows;
  }

}

