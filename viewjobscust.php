
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
  <a class="" href="custhome.php">Home</a>
  <a class="" href="customerslogin.php">Customer Logout</a>
  <a class="active" href="viewjobscust.php"> View Jobs</a>
  <a class="" href="jobForm.php">Create Job</a>

</div>
<?php
require_once("headers.php");
$jobs = Job::getAll($db);
//var_dump($jobs);
require_once("footer.php");
?>

<?php foreach($jobs->getRecords() as $id => $job){ 
     
      ?>


        <p><?php echo $job->getDescription(); ?></p>
        <p>Location: <b><?php echo $job->getLocation(); ?></b></p>
        <p>Cost: <b><?php echo $job->getExpectedcost(); ?></b></p>
        <p>Date: <b><?php echo $job->getStartdate(); ?></b></p>
        <p>Estimate Date: <b><?php echo $job->getEstimatedate(); ?></b></p>
        <?php echo "<a href=\"estimatejobcust.php?jid=".$job->getJId()."\">View Estimate</a>";?>
    <?php }; ?>
</div>
</div>
</body>
</html>
