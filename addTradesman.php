<?php

require_once("headers.php");
echo "hi1";
echo $_POST['fname'];
echo $_POST['lname'];
echo $_POST['phone'];
echo $_POST['email'];
echo $_POST['password'];
//$user=new Customer(1,$_POST['fname'],$_POST['lname'],$_POST['phone'],$_POST['email'],$_POST['phone'],$_POST['password']);
$newUser = Tradesman::create($db, $_POST['fname'], $_POST['lname'], $_POST['phone'], $_POST['email'], $_POST['password']);

echo "hi2";

var_dump($newUser);
if(!$newUser){
    echo "<h2>Failed</h2>";
}
 else {
    echo "<h2>New User Created</h2>";
    echo "<h2>Login Success</h2>";
    $_SESSION['tid'] = $newUser->getTId();
    
}


require_once("footer.php");

?>