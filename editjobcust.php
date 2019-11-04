<?php

require_once("headers.php");

//$user=new Customer(1,$_POST['fname'],$_POST['lname'],$_POST['phone'],$_POST['email'],$_POST['phone'],$_POST['password']);
$newUser = Job::edit($db,$_POST['jid'],$_POST['Jobtype'], $_POST['Description'], $_POST['Location'], $_POST['Startdate'], $_POST['Estimatedate'],$_POST['Expectedcost']);

if(!$newUser){
    echo "<h2>Failed</h2>";
}
 else {
    echo "<h2>Success</h2>";
    echo $_SESSION['cid'];
    header("Location: custhome.php?cid=".$_SESSION['cid']);//redirecting to user profile  


    
}


require_once("footer.php");

?>