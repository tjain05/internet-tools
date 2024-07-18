<?php
    require_once "./db/conn.php";
    session_start();
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $address = $_POST["address"];
    $city=$_POST["city"];
    $province= $_POST["province"];
    $postal= $_POST["postal"];
    $contact = $_POST["contact"];
    $email=$_SESSION['username'];

    $sql = "UPDATE `user` 
    SET `fname`='$fname',
        `lname`='$lname',
        `contact`='$contact',
        `address`='$address',
        `city`='$city',
        `provice`='$province',
        `postal`='$postal' 
    WHERE `email_id`='$email'";
    $result = mysqli_query($conn, $sql);
    if($result){ 
        header("Location: ./php/account.php");
    }else{
        echo "<h1>Some Error Occured</h1>";
    }
?>