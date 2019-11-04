
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

  <div class="topnav">





  </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">SafeTrade</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="custhome.php">Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="jobForm.php">Create Job</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="viewjobscust.php"> View Jobs</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="customerslogin.php">Customer Logout</a>
        </li>


    </div>
  </nav>
  <?php
  require_once("headers.php");
  $estimates = Estimate::find($db, $_GET['jid']);
  //var_dump($estimates);
  $approved = false;
  require_once("footer.php");
  ?>

  <?php
  foreach ($estimates->getRecords() as $id => $estimate) {

    if ($estimate->getIsAccepted() == 1) {
      $approved = true;
      // echo $approved;
    }
  }
  if ($approved != 1) {
    $style = "";
  } else {

    $style = "'display:none'";
  }

  foreach ($estimates->getRecords() as $id => $estimate) {
    ?>

    <form action="estimateacceptform.php" method="post">
      <div class="main-form">
        <p>Material Cost: <b><?php echo $estimate->getMcost(); ?></p>
        <p>Labour Cost: <b><?php echo $estimate->getLcost(); ?></b></p>
        <p>Total Cost: <b><?php echo $estimate->getTcost(); ?></b></p>
        <p>Expired Date: <b><?php echo $estimate->getExpdate(); ?></b></p>
        <input type="hidden" name="eid" value="<?php echo $estimate->getEId(); ?>">
        <?php


          if ($estimate->getIsAccepted() == 0) {
            ?>
          <button class="login_button" type="submit">Accept</button>
        <?php
          } elseif ($estimate->getIsAccepted() == 1) {
            //echo "Accepted";
          }



          ?>
      </div>
    </form>

  <?php }; ?></div>
  </div>
</body>

</html>
