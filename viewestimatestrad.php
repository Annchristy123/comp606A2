
<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
	font-size: 100%;
	background-image: url("massage.jpg");
	background-repeat: no-repeat;
    background-size: cover;
    font-family: Arial, Helvetica, sans-serif;
  }


.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
input{
    width: 450px;
	margin: 0 auto;
    padding: 10px;
    border: 1px solid #ccc;
}
.main-block {
    border-bottom: 8px;
    min-height: 100px;
}

#main-border{
	border-radius : 10px;
	background-color: white;
	border: 3px solid #133783;
	width: 500px;
	margin: 0 auto;
}
.main-form{
	width:450px;
	margin:0 auto;
}
.login_button {
    background-color: #4CAF50;
    color: white;
    margin-top:10px;
    margin-bottom: 10px;
    padding:10px;
    width: 100%;
	font-size:18px;
	font-weight: bold;
}
</style>
</head>
<body>

<div class="topnav">
  <a class="" href="tradesmanlogin.php">Tradesman Logout</a>
  <a class="active" href="viewestimates.php">View Estimates</a>
  <a class="" href="viewjobtrades.php"> View Jobs</a>

</div>
<?php
require_once("headers.php");
$estimates = Estimate::getAll($db);
//var_dump($jobs);
require_once("footer.php");
?>

<?php foreach($estimates->getRecords() as $id => $estimates){ 
     
      ?>

<?php
//var_dump($job);
 //echo $job->getJId(); ?>
        <p>Material Cost: <b><?php echo $estimates->getMcost(); ?></p>
        <p>Labour Cost: <b><?php echo $estimates->getLcost(); ?></b></p>
        <p>Total Cost: <b><?php echo $estimates->getTcost(); ?></b></p>
        <p>Expired Date: <b><?php echo $estimates->getExpdate(); ?></b></p>
        <p>Is Accepted: <b><?php echo $estimates->getIsaccepted(); ?></b></p>

       
    <?php }; ?>
</div>
</div>
</body>
</html>
