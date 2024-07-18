<?php
require_once '../db/conn.php';
    session_start();
    $email=$_SESSION['username'];
    $sql="DELETE FROM package_booked WHERE email= '$email'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $sql="DELETE FROM user WHERE `user`.`email_id` = '$email'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<div class=' text-center' style='background-color: red; color: white; width: 50%;'><p style='font-weight: bold' class='p-5'>Your account deleted permanently. You will be redirected to main page in 3 seconds.</p><div>";
            $_SESSION['loggedin']=false;
        }
    }
?>

<script type="text/javascript">
    setTimeout(function(){
        window.location.href = "login.php";
    }, 3000);
</script>