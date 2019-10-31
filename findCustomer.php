<?php

require_once("headers.php");
//echo $_POST['email'];
//$user=new Customer(1,$_POST['fname'],$_POST['lname'],$_POST['phone'],$_POST['email'],$_POST['phone'],$_POST['password']);
$newUser = Customer::find($db, $_POST['email'], $_POST['password']);
//var_dump($newUser);
if(!$newUser){
    echo "<h2>Failed</h2>";
}
 else {
    echo "<h2>success</h2>";
    //var_dump($newUser);
    echo  $_SESSION['cid'];
   header("Location: custhome.php?cid=".$_SESSION['cid']);//redirecting to user profile  

    
}


require_once("footer.php");

?>