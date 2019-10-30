<?php

require_once("headers.php");

//$user=new Customer(1,$_POST['fname'],$_POST['lname'],$_POST['phone'],$_POST['email'],$_POST['phone'],$_POST['password']);
$newUser = Tradesman::find($db, $_POST['email'], $_POST['password']);
//var_dump($newUser);
if(!$newUser){
    echo "<h2>Failed</h2>";
}
 else {
    echo "<h2>success</h2>";
    
}


require_once("footer.php");

?>