
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
  <a class="" href="customerslogin.php">Customer Logout</a>
  <a class="" href="viewjobscust.php"> View Jobs</a>
  <a class="" href="jobForm.php">Create Job</a>
  <a class="" href="custhome.php">Home</a>

</div>

<div class="main-block">
</div>
	<div id="main-border">
    <?php 
    require_once("headers.php");
    $job=Job::find($db,$_GET['jid']);?>

    <p><center><img src="logo.jpg" alt="Logo" width="100" height="100"></p></center>

	<center><h2>Job Form</h2></center>
			
    <form method="post" id="insert_form" action="editjobcust.php">
        <input type="hidden" name="jid" value="<?php echo $job->getJId();?>" />
            <div class="row"><div class="col-25"><label>Job Type</label></div> <div class="col-75"><input name="Jobtype" type="text"  value="<?php echo $job->getJobtype();?>"></div></div>
            <div class="row"><div class="col-25"><label>Description</label></div> <div class="col-75"><textarea name="Description"  type="text" value=""><?php echo $job->getDescription();?></textarea></div></div>
            <div class="row"><div class="col-25"><label>Location</label></div> <div class="col-75"><input name="Location"  type="text" value="<?php echo $job->getLocation();?>"></div></div>
            <div class="row"><div class="col-25"><label>Expected Cost</label></div> <div class="col-75"><input name="Expectedcost" type="text"  value="<?php echo $job->getExpectedcost();?>"></div></div> 
            <div class="row"><div class="col-25"><label>Start Date</label></div> <div class="col-75"><input name="Startdate" type="date"  value="<?php echo $job->getStartdate();?>"></div></div>
            <div class="row"><div class="col-25"><label>Estimate Date</label></div> <div class="col-75"><input name="Estimatedate" type="date"  value="<?php echo $job->getEstimatedate();?>"></div> </div>
            <div class="row"><div class="col-75"><input type="submit" style="text-align:center;" value="Confirm"></div></div>
        </form>
		
	</div>

</body>
</html>
