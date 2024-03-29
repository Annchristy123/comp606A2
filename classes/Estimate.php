
<!-- Class Estimate having functions to update ,edit and delete estimates as well fetch estimates based on conditions -->
<?php

class Estimate{

  // private properties of this class 
  private $eid = null;
  private $jid = null;
  //private $cid = null;
  private $tid = null;
  private $mcost = "";
  private $lcost = "";
  private $tcost = "";
  private $expdate = null;
  private $isaccepted=null;
  
  
  // constructor to create new estimate object
  public function __construct($eid, $jid,$tid, $lcost,$mcost, $tcost, $expdate,$isaccepted){
    $this->eid = $eid;
    $this->jid = $jid;
    //$this->cid = $cid;
    $this->tid = $tid;
    $this->lcost = $lcost;
    $this->mcost = $mcost;
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
    $sql = sprintf("insert into estimatedetails(Tid,Jid,LabourCost,MaterialCost, TotalCost, ExpirationDate,IsAccepted) values('%s', '%s','%s', '%s', '%s', '%s','%s')",  $tid,$jid,$lcost,$mcost ,$tcost, $expdate,$isaccepted);
    echo $sql;
    $qresult = $db->query($sql);
    if ($qresult){
     $eid = $db->insert_id;
      $estimate = new Estimate($eid,$jid,$tid, $lcost,$mcost, $tcost, $expdate,$isaccepted);
      $result = $estimate;
      //var_dump($result);
    }
    return $result;
  }
  public static function updateestimate($db,$eid){
    // create a new estimate record in estimatedetails table and if successful 
    // create a estimate object and return it otherwise return false;
    echo $eid;
    $sql = sprintf("update estimatedetails set IsAccepted=1 where Eid='%s'", $eid);

    echo $sql;
    $qresult = $db->query($sql);
    if ($qresult){
      $result = true;
     
    }
    echo $result;
    return $result;
  }

  public static function getEstimateById($db,$eid){
  $result = false;
    $sql = sprintf("select * from estimatedetails where eid=%s ", $eid);
    //echo $sql;
    $result = $db->query($sql);    
    $estimate = false;
    if ($result){
     
      while($row = $result->fetch_assoc()){
        $estimate =  new Estimate($row['Eid'],$row['Jid'],$row['Tid'], $row['LabourCost'], $row['MaterialCost'], $row['TotalCost'], $row['ExpirationDate'], $row['IsAccepted']);
        
      }    
    }
    return $estimate; 
  }
  public static function getAll($db,$tid){
    // get all jobs and return as a collection of job objects
    // returns false or a collection of job objects
    $result = false;
    $sql = sprintf("select * from estimatedetails where tid=%s ", $tid);
    //echo $sql;
    $result = $db->query($sql);    
    $estimate = false;
    if ($result){
      $estimates = new Collection();
      while($row = $result->fetch_assoc()){
        $estimate =  new Estimate($row['Eid'],$row['Jid'],$row['Tid'], $row['LabourCost'], $row['MaterialCost'], $row['TotalCost'], $row['ExpirationDate'], $row['IsAccepted']);
        $estimates->Add($row['Eid'], $estimate);  
        //echo $row['Jid']    ;
      }    
    }
    return $estimates; 
  }
  public static function find($db,$jid){
    // get all jobs and return as a collection of job objects
    // returns false or a collection of job objects
    $sql = sprintf("select * from estimatedetails where Jid=%s",$jid);
    $result = $db->query($sql);    
    //echo $sql;
    $estimate = false;
    if ($result){
      $estimates = new Collection();
      while($row = $result->fetch_assoc()){
        $estimate =  new Estimate($row['Eid'],$row['Tid'],$row['Jid'], $row['LabourCost'], $row['MaterialCost'], $row['TotalCost'], $row['ExpirationDate'], $row['IsAccepted']);
        $estimates->Add($row['Eid'], $estimate); 
       
      }    
    }
    //var_dump($jobs);
    return $estimates;    
  }

  public function setEId($eid){
    $this->$eid = $eid;
  }
  public function setJId($jid){
    $this->$jid = $jid;
  }
  public function setTId($tid){
    $this->$tid = $tid;
  }
  public function setMcost($mcost){
    $result = true;
    if (is_string($mcost)){
        $this->mcost = $mcost;
      } else $result = false;
    return $result;
  } 

  public function setLcost($lcost){
    $result = true;
    if (is_string($lcost)){
        $this->lcost = $lcost;
      } else $result = false;
    return $result;
  } 

  public function setTcost($tcost){
    $result = true;
    if (is_string($tcost)){
        $this->tcost = $tcost;
      } else $result = false;
    return $result;
  } 

  public function setIsaccepted($isaccepted){
    $result = true;
    if (is_string($isaccepted)){
        $this->isaccepted = $isaccepted;
      } else $result = false;
    return $result;


    }

  // ------- getter methods ----------
  public function getEId(){    
    return $this->eid;
  }

  public function getMcost(){    
    return $this->mcost;
  }
  public function getLcost(){
    return $this->lcost;
  }

  public function getJId(){
    return $this->jid;
  }

  public function getTcost(){
    return $this->tcost;
  }

  public function getExpdate(){
    return $this->expdate;
  }

  public function getIsaccepted(){
    return $this->isaccepted;
  }
  
}