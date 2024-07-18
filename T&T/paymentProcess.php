<?php
    require_once "./db/conn.php";
    session_start();
    $amount = $_GET["amount"];
    $destination = $_GET["destination"];
    $email=$_SESSION['username'];

    $sql="INSERT INTO `package_booked`(`email`, `country`, `amount`) VALUES ('$email','$destination','$amount')";
    $result = mysqli_query($conn, $sql);
    if($result){ 
        echo "<div style='background-color: green; color: white; width: 50%; '><p style='font-weight: bold' class='p-5'>Your tour booked successfully. You will be Redirected in 3 seconds.</p><div>";
    }else{
        echo "<h1>Some Error Occured. Please Try Again!</h1>";
    }
?>
<script type="text/javascript">
    setTimeout(function(){
        window.location.href = "./php/details.php?destination=<?php echo $destination; ?>";
    }, 3000);
</script>