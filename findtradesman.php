<?php

require_once("headers.php");

//$user=new Customer(1,$_POST['fname'],$_POST['lname'],$_POST['phone'],$_POST['email'],$_POST['phone'],$_POST['password']);
$newUser = Tradesman::find($db, $_POST['email'], $_POST['password']);
//echo $_SESSION['tid'];
//var_dump($newUser);
if(!$newUser){
    echo "<h2>Failed</h2>";
}
 else {
    header("Location: viewjobtrades.php?tid=".$_SESSION['tid']);//redirecting to user profile  

    
}


require_once("footer.php");

?>