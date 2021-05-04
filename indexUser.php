<?php
session_start();
if(!isset($_SESSION["id"])) {
  header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eshop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="Styles/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="topnav">
        <div>Eshop</div>
        <a href="logout.php">Logout</a>
        <a href="booklist.php">Booklist</a>
        <a href="customerProducts.php">Products</a>
        <a class="active" href="index.php">Home</a>
    </div> 

    <?php
        if($_SESSION["name"]) {
        ?>
        <center><h2>Welcome <?php echo "<font color='green'>".$_SESSION["name"]."</font>";?></h2></center> 
        <?php
        }else echo "<h1>Please login first .</h1>";
    ?>


        <!-- Making carousel using bootstrap -->
<div class="container">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="Images/mobile.jpg" alt="Mobile-Img" style="width:100%;">
      </div>

      <div class="item">
        <img src="Images/earth.jpg" alt="Earth-day-img" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="Images/doorbell.jpg" alt="Doorbell-img" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<p class="footer-text">All Rights Reserved &copy;2007-2021, Eshop.com, Inc. or its affiliates</p>


</body>
</html>