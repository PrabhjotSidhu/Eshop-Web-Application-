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
        <a href="customerPayments.php">Payments List</a>
        <a href="customerList.php">Customers List</a>
        <a href="addProduct.php">Add Product</a>
        <a class="active" href="userProducts.php">Products</a>
        <a href="indexAdmin.php">Home</a>
    </div> 

    <!-- php code for displaying images  -->
<?php
    
    echo "<div class='container grid-text'><div class='row'>";
    $con = mysqli_connect('localhost','root','','project') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM product;");


    while($products = mysqli_fetch_array($result)){
    $pid = $products['ProductID'];
    $pname = $products['ProductName'];
    $brand = $products['Brand'];
    $desc = $products['Description'];
    $uprice = $products['UnitPrice'];
    $images = $products['Image'];
    
    
    echo "<div class='col-lg-4 col-md-6 hover-fade grid-div'>";
    echo '<img class="grid-img" src="data:image/jpeg;base64,'.base64_encode($products['Image']).'" alt="image" />';
    echo "<br><font size='5'>".$products['ProductName']."</font><br>".$products['Brand'].
    "<br>".$products['Description']."<br><font color='green' size='4'>$".$products['UnitPrice']."</font>";
    echo "<br><br><a class='btn-lg btn-success' href='updateProduct.php?pid=".$pid.
    "' style='text-decoration:none;'>UPDATE</a>&nbsp;<a class='btn-lg btn-danger' href='deleteProduct.php?pid=".$pid.
    "' style='text-decoration:none;' onclick=\"return confirm('Are you sure you want to delete this product?');\">DELETE</a></div>";
    

    
    }

    echo "</div></div>";
    ?>

</body>
</html>