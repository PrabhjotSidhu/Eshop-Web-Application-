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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="Styles/style.css">
  <style>
      th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
        }
        td {
            text-align: left;
        }
  </style>
</head>
<body>
<div class="topnav">
        <div>Eshop</div>
        <a href="logout.php">Logout</a>
        <a href="customerPayments.php">Payments List</a>
        <a class="active" href="customerList.php">Customers List</a>
        <a href="addProduct.php">Add Product</a>
        <a href="userProducts.php">Products</a>
        <a href="indexAdmin.php">Home</a>
    </div> 

    

    <?php
    try {
            $dns = "mysql:host=localhost;dbname=project";
            $db = new PDO($dns, 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "Select * from Customer where FirstName not in ('admin');";

            $returnSelect = $db->query($sql);

            echo "<div class='outBox' style='margin-top:20px;height:350px;margin-left:200px;background-color:white;'>
            <h1 style='margin-bottom:20px;'>Customer Details</h1><table class='table table-striped table-hover'><tr><th>Customer ID</th><th>First Name</th>".
            "<th>Last Name</th><th>Address</th><th>City</th><th>State</th>".
            "<th>Zip Code</th><th>Email</th><th>Phone</th></tr>";
            while($rowArray = $returnSelect->fetch())
            {
                echo "<tr>".
                "<td>".$rowArray['CustomerID'] . "</td>" .
                "<td>".$rowArray['FirstName'] . "</td>" .
                "<td>".$rowArray['LastName'] . "</td>" .
                "<td>".$rowArray['Address'] . "</td>" .
                "<td>".$rowArray['City'] . "</td>" .
                "<td>".$rowArray['State'] . "</td>" .
                "<td>".$rowArray['ZipCode'] . "</td>" .
                "<td>".$rowArray['Email'] . "</td>" .
                "<td>".$rowArray['Phone'] . "</td>" .
                "</tr>";
            }

            echo "</table></div>";
            
        }
        catch(PDOException $e) {
            echo $e->getMessage();
          }
    ?>
</body>
</html>