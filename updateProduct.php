<?php
session_start();
if(!isset($_SESSION["id"])) {
    header("Location:login.php");
}
?>

<?php
        $productId = $_GET['pid'];
        $images;

        include 'db_connection.php';
        $con = OpenCon();

        $result = mysqli_query($con,"SELECT * FROM product where ProductID = ".$productId.";");

        while($products = mysqli_fetch_array($result)){
            $pid = $products['ProductID'];
            $pname = $products['ProductName'];
            $brand = $products['Brand'];
            $desc = $products['Description'];
            $uprice = $products['UnitPrice'];
            $images = $products['Image'];
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="Styles/style.css">
  <style>

     
      td {
          padding:10px;
      }
  </style>
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

    <div class="outerBox" style="width:60%;height:600px;margin-bottom:40px;">
        <h1>Update Product Details</h1>
    <form name="form1" method="post" action="" enctype="multipart/form-data">
        <table>
        <tr><td>Product ID</td><td><input type="text" name="pid" value="<?php echo htmlentities($pid); ?>" readonly></td></tr>
        <tr><td>Product Name</td><td><input type="text" name="pname2" value="<?php echo htmlentities($pname); ?>"></td></tr>
        <tr><td>Brand</td><td><input type="text" name="brand2" value="<?php echo htmlentities($brand); ?>"></td></tr>
        <tr><td>Description</td><td><input type="text" name="desc2" value="<?php echo htmlentities($desc); ?>"></td></tr>
        <tr><td>Unit Price</td><td><input type="text" name="uprice2" value="<?php echo htmlentities($uprice); ?>"></td></tr>
        <tr><td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $images ).'" style="width:100px; height:100px;"/>'; ?></td></tr>
        <tr><td>Product Image</td><td><input type="file" name="f1"></td></tr>
        <tr><td><input type="submit" value="Update Product" name="submit1" class="btn btn-success"></td></tr>
        </table><br>
        
    </form>
    </div>

    <?php
     $f1;
    //  $imgData;
    
    // $sql;

if (isset($_POST["submit1"])) {

    $pid = $_POST['pid'];
    $pname2 = $_POST['pname2'];
    $brand2 = $_POST['brand2'];
    $desc2 = $_POST['desc2'];
    $uprice2 = $_POST['uprice2'];

    

    if(isset($_POST['f1'])) {

        $f1 = $_POST['f1'];
        echo $f1;
        
}
        
    
        $imgData = addslashes(file_get_contents($_FILES['f1']['tmp_name']));

        $sql = "UPDATE product set ProductName='".$pname2."',Brand='".$brand2.
        "',Description='".$desc2."',UnitPrice='".$uprice2."',Image='".$imgData."' where ProductID='".$pid."'";
        
        
        $current_id = mysqli_query($con, $sql);

        if(isset($current_id) && count($_POST)>0) 
                echo "<center><font size='5' color='green'>Product Details updated successfully...</font></center>";
        else
                echo "<center><font size='5' color='red'>Error! Please provide valid details.</font></center>";
                
}
    ?>

</body>
</html>