<?php

require_once("headers.php");

//$user=new Customer(1,$_POST['fname'],$_POST['lname'],$_POST['phone'],$_POST['email'],$_POST['phone'],$_POST['password']);
$newEstimate = Estimate::create($db,$_POST['jid'],$_SESSION['tid'], $_POST['LabourCost'], $_POST['MaterialCost'], $_POST['ExpirationDate']);

if(!$newEstimate){
    echo "<h2>Failed</h2>";
}
 else {
   
    echo "<h2>Estimte Posted Success</h2>";
    $_SESSION['eid'] = $newEstimate->getEId();
    header("Location: viewjobtrades.php?tid=".$_SESSION['tid']);//redirecting to user profile  

    
}


require_once("footer.php");

?>