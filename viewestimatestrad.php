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
        <li class="nav-item active">
          <a class="nav-link" href="viewestimatestrad.php">View Estimates</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="tradesmanlogin.php">Tradesman Logout</a>
        </li>



    </div>
  </nav>
  <?php
  require_once("headers.php");
  $estimates = Estimate::getAll($db, $_SESSION['tid']);
  //var_dump($estimates);
  require_once("footer.php");
  ?>
  <div class="table-container">
    <table class="table jobs-table table-striped table-bordered">
      <thead>
        <tr>
          <th scope=" col">Job Id</th>
          <th scope=" col">Job Type</th>
          <th scope=" col">Job Description</th>
          <th scope="col">Estimate Id</th>
          <th scope="col">Material Cost</th>
          <th scope="col">Labour Cost</th>
          <th scope="col">Total Cost</th>
          <th scope="col">Expired Date</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($estimates->getRecords() as $id => $estimate) {

          ?>
          <?php
            $est = Estimate::getEstimateById($db, $estimate->getEId());
            //var_dump($est);
            $job = Job::find($db, $est->getJId());
            ?>
          <tr>
            <td><?php echo $est->getJId(); ?></td>
            <td><?php echo $job->getJobtype(); ?></td>
            <td><?php echo $job->getDescription(); ?></td>
            <td><?php echo $estimate->getEId(); ?></td>
            <td><?php echo $estimate->getMcost(); ?></td>
            <td><?php echo $estimate->getLcost(); ?></td>
            <td><?php echo $estimate->getTcost(); ?></td>
            <td><?php echo $estimate->getExpdate(); ?></td>
          </tr>
        <?php }; ?>
      </tbody>
    </table>
  </div>
  </div>
</body>

</html>