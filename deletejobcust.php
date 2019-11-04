<?php

require_once("headers.php");

//$user=new Customer(1,$_POST['fname'],$_POST['lname'],$_POST['phone'],$_POST['email'],$_POST['phone'],$_POST['password']);
$newUser = Job::delete($db, $_GET['jid']);


if(!$newUser){
    echo "<h2>Failed</h2>";
}
 else {

    header("Location: custhome.php?cid=".$_SESSION['cid']);//redirecting to user profile  


    
}


require_once("footer.php");

?>