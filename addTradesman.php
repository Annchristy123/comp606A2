<?php

require_once("headers.php");

//$user=new Customer(1,$_POST['fname'],$_POST['lname'],$_POST['phone'],$_POST['email'],$_POST['phone'],$_POST['password']);
$newUser = Tradesman::create($db, $_POST['fname'], $_POST['lname'], $_POST['phone'], $_POST['email'], $_POST['password']);


if(!$newUser){
    echo "<h2>Failed</h2>";
}
 else {
    $_SESSION['tid'] = $newUser->getTId();
    header("Location: viewjobtrades.php?tid=".$_SESSION['tid']);//redirecting to user profile  

    
}


require_once("footer.php");

?>