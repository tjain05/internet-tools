<?php 
    require_once './includes/header.php';
    require_once './db/conn.php';
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Create variables for user inputs
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $postal = $_POST['postal'];
        $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
        
        $sql = "INSERT INTO `user`(`email_id`, `fname`, `lname`, `password`, `contact`, `address`, `city`, `provice`, `postal`) 
        VALUES ('$email','$fname','$lname','$hashedPassword','$contact','$address','$city','$province','$postal')";

        try {
            // Execute the query and check for success
            if (mysqli_query($conn, $sql)) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $email;
                header("Location: ./php/account.php");
                exit;
            } else {
                // Check for duplicate entry error
                if (mysqli_errno($conn) == 1062) {
                    $_SESSION['register-message']="This email is already registered.";
                    header("Location: ./php/register.php");
                } else {
                    $_SESSION['register-message']="Internal Error occured.";
                    header("Location: ./php/register.php");
                }
            }
        } catch (Exception $e) {
            $_SESSION['register-message']="This email is already registered.";
            header("Location: ./php/register.php");
        }

        

        //Execute the query and check for success
    }
    
 ?>