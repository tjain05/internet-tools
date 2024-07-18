<?php 
    session_start();
    $currentPage = basename($_SERVER['PHP_SELF']);
    require_once "../includes/header.php";
    require_once '../db/conn.php';

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        header("Location: account.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['id']) && isset($_POST['password'])) {
        $id=$_POST['id'];
        $sql = "SELECT * FROM user where email_id='$id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    if (password_verify($_POST['password'], $row["password"])) {
                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $_POST['id'];
                        if (isset($_GET['destination']) && isset($_GET['amount'])) {
                            $destination = isset($_GET['destination']) ? $_GET['destination'] : '';
                            $amount = isset($_GET['amount']) ? $_GET['amount'] : '';
                            header("Location: payment.php?destination=" . urlencode($destination) . "&amount=" . urlencode($amount));
                        }else{
                            header("Location: account.php");
                        }
                    }else {
                        $_SESSION['login-message']="Invalid Email or Password";
                    }
                }else {
                $_SESSION['login-message']="No records found";
            }
        } else {                           
             $_SESSION['login-message']="Internal Error! Try again.";
        } 
    }
?>
<div class="d-flex flex-column justify-content-center align-items-center w-100 login-container" style="background-color: black; height: 80vh;">
    <h1 class="tagline">Book Your Adventure Today!</h1>
    <form method="post" 
        action="login.php<?php echo (isset($_GET['destination']) && isset($_GET['amount'])) ? '?destination=' . urlencode($_GET['destination']) . '&amount=' . urlencode($_GET['amount']): ''; ?>" 
        class="mt-4 d-flex flex-column justify-content-center align-items-center login_form bg-dark border rounded-5"
    >
    <?php
        if(isset($_SESSION['login-message'])){
            echo "<p class='text-danger text-center'>".$_SESSION['login-message']."</p>";
            unset($_SESSION['login-message']);
        }
    ?>
        <input class="mt-4 form-input" type="email" id="id" name="id" placeholder="Enter your mail id" required><br>
        <input class="form-input" type="password" id="password" name="password" placeholder="Enter your password" required><br>
        <button class="login-button">Login</button><br>
        <label class="mb-4 text-warning">Don't have an account? <a href="register.php" class="text-warning">Register Now.</a></label>
    </form>
</div>

<?php 
    require_once "../includes/footer.php";
?>
