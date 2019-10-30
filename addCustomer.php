<?php

require_once("headers.php");

//$user=new Customer(1,$_POST['fname'],$_POST['lname'],$_POST['phone'],$_POST['email'],$_POST['phone'],$_POST['password']);
$newUser = Customer::create($db, $_POST['fname'], $_POST['lname'], $_POST['phone'], $_POST['email'], $_POST['password']);


if(!$newUser){
    echo "<h2>Failed</h2>";
}
 else {
    echo "<h2>New User Created</h2>";
    echo "<h2>Login Success</h2>";
    $_SESSION['cid'] = $newUser->getCId();
    $_SESSION['tid'] = '';
    
}


require_once("footer.php");

?>