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

    .estimate-form input {
      margin: 8px;
      border-radius: 0px;
    }

    .post-button {
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
          <a class="nav-link" href="viewjobtrades.php"> View Jobs</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="viewestimate.php">View Estimate</a>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="tradesmanlogin.php">Tradesman Logout</a>
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
      <h2>Estimate Form</h2>
    </center>

    <form action="addEstimate.php" method="post">

      <div class="main-form estimate-form">
        <input class="form-control" type="text" placeholder="Labour Cost" name="LabourCost" required>
        <input class="form-control" type="text" placeholder="Material Cost" name="MaterialCost">
        <input class="form-control" type="date" placeholder="ExpirationDate" name="ExpirationDate">
        <button class="post-button btn btn-primary" type="submit">Post Estimate</button>
        <input type="hidden" name="jid" value="<?php echo $_GET['jid']; ?>">
      </div>
    </form>

  </div>

</body>

</html>