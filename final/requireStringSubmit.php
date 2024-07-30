<?php
    session_start();
    include_once("../final/db/conn.php");

    If($_SERVER["REQUEST_METHOD"] == "POST"){
        $message = $_POST['string_box'];

        $message = mysqli_real_escape_string($conn, $message);

        $sql = "INSERT INTO `string_info`(`message`) VALUES ('$message')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['succ-message']="Record added successfully!";
            header('Location: index.php');
        } else {
            $_SESSION['error-message']="Some Internal Error";
            header('Location: index.php');
        }
    }
    
?>