<?php

class Job
{

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
  public function __construct($jid, $cid, $Jobtype, $Description, $Location, $Startdate, $Estimatedate, $Expectedcost)
  {
    $this->jid = $jid;
    $this->cid = $cid;
    $this->Jobtype = $Jobtype;
    $this->Description = $Description;
    $this->Location = $Location;
    $this->Startdate = $Startdate;
    $this->Estimatedate = $Estimatedate;
    $this->Expectedcost = $Expectedcost;
  }

  public static function create($db, $Jobtype, $Description, $Location, $Startdate, $Estimatedate, $Expectedcost)
  {
    // create a new user record in jobdetails table and if successful 
    // create a user object and return it otherwise return false;   
    $password = md5($password); //Password encryption
    $result = false;

    $sql = sprintf("insert into jobdetails(Cid,Jobtype, Description,Location,Startdate,Estimatedate,Expectedcost) values('%s','%s', '%s', '%s','%s', '%s','%s')", $_SESSION['cid'], $Jobtype, $Description, $Location, $Startdate, $Estimatedate, $Expectedcost);
    $qresult = $db->query($sql);
    if ($qresult) {

      $jid = $db->insert_id;
      $user = new Job($jid, $_SESSION['cid'], $Jobtype, $Description, $Location, $Startdate, $Estimatedate, $Expectedcost);
      $result = $user;
      $_SESSION['jid'] = $jid; //initialising session

    }
    return $result;
  }
  public static function edit($db, $jid, $Jobtype, $Description, $Location, $Startdate, $Estimatedate, $Expectedcost)
  {
    // edit an estimate record in estimatedetails table and if successful 
    // create a estimate object and return it otherwise return false;
    $result = false;
    $sql1 = sprintf("select * from jobdetails where Jid=%s", $jid);
    $qresult1 = $db->query($sql1);
    if ($qresult1) {
      if ($qresult1->num_rows == 1) {
        $row = $qresult1->fetch_assoc();
        $cid = $row['Cid'];
      }
    }
    $sql = sprintf("update jobdetails set Jobtype='%s', Description='%s', Location='%s', Startdate='%s', Estimatedate='%s', Expectedcost='%s' where Jid='%s'",  $Jobtype, $Description, $Location, $Startdate, $Estimatedate, $Expectedcost, $jid);
    $qresult = $db->query($sql);
    if ($qresult) {

      $job = new Job($jid, $cid, $Jobtype, $Description, $Location, $Startdate, $Estimatedate, $Expectedcost);
      $result = $job;
    }

    return $result;
  }
  public static function find($db, $jid)
  {

    $sql = sprintf("select * from jobdetails where jid=%s", $jid);
    $result = $db->query($sql);
    $job = false;
    if ($result) {

      while ($row = $result->fetch_assoc()) {
        $job =  new Job($row['Jid'], $row['Cid'], $row['Jobtype'], $row['Description'], $row['Location'], $row['Startdate'], $row['Estimatedate'], $row['Expectedcost']);
      }
    }
    //var_dump($jobs);
    return $job;
  }
  public static function delete($db, $jid)
  {

    $sql = sprintf("delete from jobdetails where jid=%s", $jid);
    $result = $db->query($sql);
    $job = false;
    if ($result) {
      $job = true;
    }

    //var_dump($jobs);
    return $job;
  }


  public static function getAll($db)
  {
    // get all jobs and return as a collection of job objects
    // returns false or a collection of job objects
    $sql = "select * from jobdetails";
    //echo $sql;
    $result = $db->query($sql);
    //echo $sql;
    $job = false;
    if ($result) {
      $jobs = new Collection();
      while ($row = $result->fetch_assoc()) {
        $job =  new Job($row['Jid'], $row['Cid'], $row['Jobtype'], $row['Description'], $row['Location'], $row['Startdate'], $row['Estimatedate'], $row['Expectedcost']);
        $jobs->Add($row['Jid'], $job);
      }
    }
    //var_dump($jobs);
    return $jobs;
  }


  public static function getAllcust($db, $cid)
  {
    // get all jobs and return as a collection of job objects
    // returns false or a collection of job objects
    $sql = sprintf("select * from jobdetails where Cid=%s", $cid);
    //echo $sql;
    $result = $db->query($sql);

    $job = false;
    if ($result) {
      $jobs = new Collection();
      while ($row = $result->fetch_assoc()) {
        $job =  new Job($row['Jid'], $row['Cid'], $row['Jobtype'], $row['Description'], $row['Location'], $row['Startdate'], $row['Estimatedate'], $row['Expectedcost']);
        $jobs->Add($row['Jid'], $job);
      }
    }
    //var_dump($jobs);
    return $jobs;
  }


  // ------ setter methods -------
  public function setJId($jid)
  {
    $this->$jid = $jid;
  }
  public function setCId($cid)
  {
    $this->$cid = $cid;
  }
  public function setJobtype($Jobtype)
  {
    $result = true;
    if (is_string($Jobtype)) {
      $this->Jobtype = $Jobtype;
    } else $result = false;
    return $result;
  }

  public function setDescription($Description)
  {
    $result = true;
    if (is_string($Description)) {
      $this->Description = $Description;
    } else $result = false;
    return $result;
  }


  public function setLocation($Location)
  {
    $result = true;
    if (is_string($Location)) {
      $this->Location = $Location;
    } else $result = false;

    return $result;
  }

  public function setStartdate($Startdate)
  {
    $result = true;
    if (is_string($Startdate)) {
      $this->Startdate = $Startdate;
    } else $result = false;
    return $result;
  }
  public function setEstimatedate($Estimatedate)
  {
    $result = true;
    if (is_string($Estimatedate)) {
      $this->Estimatedate = $Estimatedate;
    } else $result = false;
    return $result;
  }
  public function setExpectedcost($Expectedcost)
  {
    $result = true;
    if (is_string($Expectedcost)) {
      $this->Expectedcost = $Expectedcost;
    } else $result = false;
    return $result;
  }

  // ------- getter methods ----------
  public function getJobtype()
  {
    return $this->Jobtype;
  }

  public function getJId()
  {
    return $this->jid;
  }

  public function getDescription()
  {
    return $this->Description;
  }
  public function getLocation()
  {
    return $this->Location;
  }

  public function getStartdate()
  {
    return $this->Startdate;
  }

  public function getEstimatedate()
  {
    return $this->Estimatedate;
  }

  public function getExpectedcost()
  {
    return $this->Expectedcost;
  }
}
