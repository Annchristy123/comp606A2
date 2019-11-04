<?php

require_once("headers.php");
//$user=new Customer(1,$_POST['fname'],$_POST['lname'],$_POST['phone'],$_POST['email'],$_POST['phone'],$_POST['password']);
$newEstimate = Estimate::updateestimate($db,$_POST['eid']);

if(!$newEstimate){
    echo "<h2>Failed</h2>";
}
 else {
   
    header("Location: custhome.php");//redirecting to estimate profile  

    
}


require_once("footer.php");

?>