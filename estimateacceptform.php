<?php

require_once("headers.php");

//$user=new Customer(1,$_POST['fname'],$_POST['lname'],$_POST['phone'],$_POST['email'],$_POST['phone'],$_POST['password']);
$newEstimate = Estimate::find($db,$_POST['jid']);
var_dump($newEstimate);

if(!$newEstimate){
    echo "<h2>Failed</h2>";
}
 else {
   
    echo "<h2>Estimte Posted Success</h2>";
    $_SESSION['eid'] = $newEstimate->getEId();
    
}


require_once("footer.php");

?>