<?php

class Job{

  // private properties of this class 
  private $jid = null;
  private $cid = null;
  private $Jobtype = "";
  private $Description = "";
  private $Location = "";
  private $Startdate = null;
  private $Estimatedate = null;
  private $Expectedcost = null;
  
  
  // constructor to create new user object
  public function __construct($jid,$cid, $Jobtype, $Description,$Location,$Startdate, $Estimatedate,$Expectedcost){
    $this->jid = $jid;
    $this->cid = $cid;
    $this->Jobtype = $Jobtype;
    $this->Description = $Description;
    $this->Location = $Location;
    $this->Startdate = $Startdate;
    $this->Estimatedate = $Estimatedate;
    $this->Expectedcost = $Expectedcost;
  }

  public static function create($db, $Jobtype, $Description,$Location,$Startdate, $Estimatedate,$Expectedcost){
    // create a new user record in jobdetails table and if successful 
    // create a user object and return it otherwise return false;   
    $password=md5($password);//Password encryption
    $result = false;
    var_dump(result);
      $sql = sprintf("insert into jobdetails(Jobtype, Description,Location,Startdate,Estimatedate,Expectedcost) values('%s', '%s', '%s','%s', '%s','%s')",  $Jobtype, $Description,$Location,$Startdate, $Estimatedate,$Expectedcost);
      var_dump(sql);
      $qresult = $db->query($sql);
      if ($qresult){
      $cid = $db->insert_id;
      $user = new Job($jid,$Jobtype, $Description,$Location,$Startdate, $Estimatedate,$Expectedcost);      
      $result = $user;
      $_SESSION['jid']=$jid;//initialising session
  
        $_SESSION['cid']=$cid;
     }    
    return $result;
  }
  

  

  // ------ setter methods -------
  public function setJId($jid){
    $this->$jid = $jid;
  }
  public function setCId($cid){
    $this->$cid = $cid;
  }
  public function setJobtype($Jobtype){
    $result = true;
    if (is_string($Jobtype)){
      $this->Jobtype = $Jobtype;
    } else $result = false;
    return $result;
  }

  public function setDescription($Description){
    $result = true;
    if (is_string($Description)){
      $this->Description = $Description;
    } else $result = false;
    return $result;
  }
 

    public function setLocation($Location){
    $result = true;
    if (is_string($Location)){
        $this->Location = $Location;
      } else $result = false;
 
    return $result;
  }

  public function setStartdate($Startdate){
    $result = true;
    if (is_string($Startdate)){
        $this->Startdate = $Startdate;
      } else $result = false;
    return $result;
  } 
  public function setEstimatedate($Estimatedate){
    $result = true;
    if (is_string($Estimatedate)){
        $this->Estimatedate = $Estimatedate;
      } else $result = false;
    return $result;
  } 
  public function setExpectedcost($Expectedcost){
    $result = true;
    if (is_string($Expectedcost)){
        $this->Expectedcost = $Expectedcost;
      } else $result = false;
    return $result;
  } 

  // ------- getter methods ----------
  public function getJobtype(){    
    return $this->Jobtype;
  }

  public function getDescription(){    
    return $this->Description;
  }
  public function getLocation(){
    return $this->Location;
  }

  public function getStartdate(){
    return $this->Startdate;
  }

  public function getEstimatedate(){
    return $this->Estimatedate;
  }

  public function getExpectedcost(){
    return $this->Expectedcost;
  }
  
}