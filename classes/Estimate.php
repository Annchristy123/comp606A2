<!-- Class Estimate having functions to update ,edit and delete estimates as well fetch estimates based on conditions -->
<?php

class Estimate{

  // private properties of this class 
  private $eid = null;
  private $jid = null;
  private $tid = null;
  private $mcost = "";
  private $lcost = "";
  private $tcost = "";
  private $expdate = null;
  private $isaccepted=null;
  
  
  // constructor to create new estimate object
  public function __construct($eid, $jid,$tid,$mcost, $lcost, $tcost, $expdate,$isaccepted){
    $this->eid = $eid;
    $this->jid = $jid;
    $this->tid = $tid;
    $this->mcost = $mcost;
    $this->lcost = $lcost;
    $this->tcost = $tcost;
    $this->expdate = $expdate;
    $this->isaccepted=$isaccepted;
  }

  public static function create($db,$jid,$tid,  $lcost, $mcost,$expdate){
    // create a new estimate record in estimatedetails table and if successful 
    // create a estimate object and return it otherwise return false;
    $eid=0;
    $result = false;
    $tcost=$lcost+$mcost;
    //echo $tcost;
    $isaccepted=0;
    $sql = sprintf("insert into estimatedetails(Tid,Jid,MaterialCost, LabourCost, TotalCost, ExpirationDate,IsAccepted) values('%s', '%s','%s', '%s', '%s', '%s','%s')",  $tid,$jid,$mcost,$lcost ,$tcost, $expdate,$isaccepted);
    //echo $sql;
    $qresult = $db->query($sql);
    if ($qresult){
      $eid = $db->insert_id;
      $estimate = new Estimate($eid,$jid,$tid, $mcost, $lcost, $tcost, $expdate,$isaccepted);
      $result = $estimate;
    }
    return $result;
  }
  public static function find($db,$jid){
    // get all jobs and return as a collection of job objects
    // returns false or a collection of job objects
    $sql = sprintf("update estimatedetails set IsAccepted=1 where Jid=%s",$jid);
    $result = $db->query($sql);    
    //echo $sql;
    $job = false;
    if ($result){
      $jobs = new Collection();
      while($row = $result->fetch_assoc()){
        $job =  new Job($row['Jid'],$row['Cid'], $row['Jobtype'], $row['Description'], $row['Location'], $row['Startdate'], $row['Estimatedate'], $row['Expectedcost']);
        $jobs->Add($row['Jid'], $job); 
       
      }    
    }
    //var_dump($jobs);
    return $jobs;    
  }
}
  ?>