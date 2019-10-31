
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
  <a class="" href="viewjobscust.php"> View Jobs</a>
  <a class="active" href="jobForm.php">Create Job</a>

</div>

<div class="main-block">
</div>
	<div id="main-border">
    <p><center><img src="logo.jpg" alt="Logo" width="100" height="100"></p></center>

	<center><h2>Job Form</h2></center>
			
		<form action="addJob.php" method="post">
		
			<div class="main-form">
				<input type="text" placeholder="Jobtype" name="Jobtype" required>
                <input type="text" placeholder="Description" name="Description">
                <input type="text" placeholder="Location" name="Location" >
                <input type="date" placeholder="Startdate" name="Startdate" >
                <input type="date" placeholder="Estimatedate" name="Estimatedate">
                <input type="text" placeholder="ExpectedCost" name="Expectedcost">

				<button class="login_button" type="submit">Create Job</button>
			</div>
		</form>
		
	</div>

</body>
</html>
