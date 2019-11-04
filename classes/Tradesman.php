<?php

class Tradesman{

  // private properties of this class 
  private $tid = null;
  private $fname = "";
  private $lname = "";
  private $email = "";
  private $phone = null;
  private $password = null;
  
  
  // constructor to create new user object
  public function __construct($tid, $fname, $lname,$phone,$email, $password){
    $this->tid = $tid;
    $this->fname = $fname;
    $this->lname = $lname;
    $this->email = $email;
    $this->phone = $phone;
    $this->password = $password;
  }

  public static function create($db, $fname, $lname,$phone,$email, $password){
    // create a new user record in customerdetails table and if successful 
    // create a user object and return it otherwise return false;   
    $password=md5($password);//Password encryption
    $result = false;
    //var_dump(result);
      $sql = sprintf("insert into tradesmandetails(FirstName, LastName,Phone,Email,Password) values('%s', '%s', '%s','%s', '%s')",  $fname, $lname, $phone,$email, $password);
      //var_dump(sql);
      $qresult = $db->query($sql);
      if ($qresult){
      $cid = $db->insert_id;
      $user = new Tradesman($tid, $fname, $lname,$phone,$email, $password);      
      $result = $user;
      $_SESSION['tid']=$tid;//initialising session

     }    
    return $result;
  }
  public static function find($db, $email,$password){
    // search customerdetails table and locate record with id
    // get that record and create user object 
    // return user object OR false if we cannot find it
    $result = false;
    $password=md5($password);
    $sql = sprintf("select * from tradesmandetails where Email='%s' and Password='%s'", $email,$password);
    $qresult = $db->query($sql);
    if ($qresult){
      if ($qresult->num_rows == 1){
        $row = $qresult->fetch_assoc();
        $user = new Tradesman($row['TId'], $row['FirstName'], $row['LastName'], $row['Phone'],$row['Email'], $row['Password']);
        $_SESSION['tid']=$row['tid'];//initialising session
         
        $result = $user;
      }
    }
    return $result;
  } 


  // ------ setter methods -------
  public function setTId($tid){
    $this->$tid = $tid;
  }

  public function setFName($fname){
    $result = true;
    if (is_string($fname)){
      $this->fname = $fname;
    } else $result = false;
    return $result;
  }

  public function setLName($lname){
    $result = true;
    if (is_string($lname)){
      $this->lname = $lname;
    } else $result = false;
    return $result;
  }
 

     public function setPhone($phone){
    $result = true;
    if (preg_match('/^[0-9]{10}+$/', $phone)){
      $this->phone = $phone;
      $result = true;
    } 
    else {
      $result=false;
    }
    return $result;
  }
 

  public function setEmail($email){
    // string, email format
    $result = true;
    if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
      $result = false;
    } else {
      $this->email = $email;
    }
    return $result;
  }  

  public function setPassword($password){
    // string, email format
    $result = true;
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
      $result = false;
    } else {
      $this->password = $password;
    }
    return $result;
  } 

  // ------- getter methods ----------
  public function getFName(){    
    return $this->fname;
  }

  public function getLName(){    
    return $this->lname;
  }
  public function getTId(){
    return $this->cid;
  }

  public function getEmail(){
    return $this->email;
  }

  public function getPhone(){
    return $this->phone;
  }

  public function getPassword(){
    return $this->password;
  }
  
}