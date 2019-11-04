<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <?php
  require('./libs/boosttrap_headers.php')
  ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-size: 100%;
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

    input {
      width: 450px;
      margin: 0 auto;
      padding: 10px;
      border: 1px solid #ccc;
    }

    .main-block {
      border-bottom: 8px;
      min-height: 100px;
    }

    #main-border {
      border-radius: 10px;
      background-color: white;
      border: 3px solid #133783;
      width: 500px;
      margin: 0 auto;
    }

    .main-form {
      width: 450px;
      margin: 0 auto;
    }

    .login_button {
      background-color: #4CAF50;
      color: white;
      margin-top: 10px;
      margin-bottom: 10px;
      padding: 10px;
      width: 100%;
      font-size: 18px;
      font-weight: bold;
    }

    .jobform input {
      margin: 8px;
      border-radius: 0px;
    }

    .login-button {
      border-radius: 0px !important;
      margin: auto;
      margin-left: 8px;
      margin-bottom: 10px;
    }

    #main-border {
      border: none;
      box-shadow: 1px 1px 9px 5px #ddd;
      padding: 50px 10px;
    }
    #divCheckbox{

      color:red;
    }

    /* .login-tradesman {
      color: #777;
      font-size: 14px;
      vertical-align: baseline;

    } */
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">SafeTrade</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="custhome.php">Home</a>
        </li>
        <li class="nav-item active">
          <a class="active nav-link" href="jobForm.php">Create Job</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="viewjobscust.php"> View Jobs</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="customerslogin.php">Customer Logout</a>
        </li>
    </div>
  </nav>
  <div class="main-block">
  </div>
  <div id="main-border">
    <p>
      <center><img src="logo.jpg" alt="Logo" width="100" height="100">
    </p>
    </center>

    <center>
      <h2>Job Form</h2>
    </center>
    <div id="divCheckbox" style="display: none;">All fields are required</div>

    <form action="addJob.php" method="post" id='jobForm'>

      <div class="main-form jobform">
      <div class="form-group">
      <label for="staticEmail" class="col-sm-2 col-form-label">JobType:</label> 
             <input class="form-control" type="text" placeholder="Jobtype" name="Jobtype" >
             <span></span>
      </div>
     
             <label for="staticEmail" class="col-sm-2 col-form-label">Description</label> 
        <input class="form-control" type="text" placeholder="Description" name="Description">
        <label for="staticEmail" class="col-sm-2 col-form-label">Location</label> 
        <input class="form-control" type="text" placeholder="Location" name="Location">
        <label for="staticEmail" class="col-sm-2 col-form-label">StartDate</label> 
        <input class="form-control" type="date" placeholder="Startdate" name="Startdate">
        <label for="staticEmail" class="col-sm-2 col-form-label">EstimateDate</label> 
        <input class="form-control" type="date" placeholder="Estimatedate" name="Estimatedate">
        <label for="staticEmail" class="col-sm-2 col-form-label">ExpectedCost</label> 
        <input class="form-control" type="text" placeholder="ExpectedCost" name="Expectedcost">

        <button class="login-button btn btn-primary" id='idsubmit' type="submit">Create Job</button>
      </div>
    </form>

  </div>

</body>

<script src="jquery-3.4.1.min.js"></script>


<script>


$('#idsubmit').on('click',function(e){

   var jobtype = $("input[name=Jobtype").val()
   var desc = $("input[name=Description").val()


  if(!jobtype&&!desc){

    $("#divCheckbox").css('display','block');

    return false;
  }
  else{
    return true
  }
 });


</script>

</html>
