<?php

function add_user($fname, $lname, $address, $city, $state, $zip, $email, $password, $phone) { 
    // global $db;
    $dns = "mysql:host=localhost;dbname=project";
    global $db; 
    $db = new PDO($dns, 'root', '');

    $password = sha1($email . $password);
    $query = "insert into customer(FirstName, Lastname, Address, City, State, ZipCode, Email, Password, Phone) ".
            "VALUES ('".$fname."','".$lname."','".$address."','".$city."','".$state."','".$zip."',:email,:password,'".$phone."');";
    $statement = $db->prepare($query);
    $statement->bindValue(':email',$email);
    $statement->bindValue(':password',$password);
    $statement->execute();
    $inserted = $statement->rowCount();
    $statement->closeCursor();
    return $inserted;
}

function is_valid_login($email, $password) {
    // global $db;
    $dns = "mysql:host=localhost;dbname=project";
    global $db; 
$db = new PDO($dns, 'root', '');

    
    $password = sha1($email . $password);
    $query = "select CustomerID,FirstName from customer where Email=:email and Password=:password;";
    $statement = $db->prepare($query);
    $statement->bindValue(':email',$email);
    $statement->bindValue(':password',$password);
    $statement->execute();
    $result = $statement->fetch();
    $valid = ($statement->rowCount() == 1);
    if($valid) {
        $_SESSION["id"] = $result['CustomerID'];
        $_SESSION["name"] = $result['FirstName'];
    }
    $statement->closeCursor();
    return $valid;

}


?>