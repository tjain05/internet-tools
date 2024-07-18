<?php 
    session_start();
    $currentPage = 'login.php';
    require_once "../includes/header.php";
    require_once '../db/conn.php';
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }
    $email = $_SESSION['username'];
    $sql = "SELECT * FROM user WHERE email_id = '$email'";
    $result = mysqli_query($conn, $sql);
    if($result){
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $fname = $row["fname"];
            $lname = $row["lname"];
            $address = $row["address"];
            $city=$row["city"];
            $province= $row["provice"];
            $postal= $row["postal"];
            $contact = $row["contact"];
        }
        else{
            echo "No records found";
        }
    }


?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById("delete-form");
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            var userConfirmation = confirm("Do you want to proceed to the delete account?");
            if(userConfirmation){
                form.action = "delete.php";
                form.submit();
            }else{
                header("Location: account.php");
            }
            
        });
    });
</script>
<div style="background-color: black;">
    <div style="display: flex; justify-content:end;width: 100%; padding: 3em; gap: 2em">
        <form id="delete-form" method="post" style="margin: 0;">
            <button type="submit" class="account-buttons">Delete Account</button>
        </form>
        <form id="logout-form" action="logout.php" method="post" style="margin: 0;">
            <button type="submit" class="account-buttons">Log Out</button>
        </form>
    </div>
    <div class="account-container">
        <div class="inner-container-account">
        <div style="text-align: end;">
        <button onclick="enableTextArea()" class="account-buttons">Edit</button>
        </div>
        
        <form method="post" action="/receive-account.php" >
            <div  class="mt-3 inner-label-account">
                <label>Account Summary</label>
            </div>
           <hr>
           <div class="account-detail-container"> 
                <p class="mt-3">Email: </p>
                <textarea name="email" style="background-color:bisque" disabled><?php echo htmlspecialchars($email); ?></textarea>
            </div>
            <div class="account-detail-container"> 
                <p class="mt-3">First Name: </p>
                <textarea class="detail-area" name="fname" disabled><?php echo htmlspecialchars($fname); ?></textarea>
            </div>
            <div class="account-detail-container"> 
                <p class="mt-3">Last Name: </p>
                <textarea class="detail-area" name="lname" disabled><?php echo htmlspecialchars($lname); ?></textarea>
            </div>
            <hr>
            <div class="account-detail-container"> 
                <p class="mt-3">Address: </p>
                <textarea class="detail-area" name="address" disabled><?php echo htmlspecialchars($address); ?></textarea>
            </div>
            <div class="account-detail-container"> 
                <p class="mt-3">City: </p>
                <textarea class="detail-area" name="city" disabled><?php echo htmlspecialchars($city); ?></textarea>
            </div>
            <div class="account-detail-container"> 
                <p class="mt-3">Province: </p>
                <textarea class="detail-area" name="province" disabled><?php echo htmlspecialchars($province); ?></textarea>
            </div>
            <div class="account-detail-container"> 
                <p class="mt-3">Postal: </p>
                <textarea class="detail-area" name="postal" disabled><?php echo htmlspecialchars($postal); ?></textarea>
            </div>
            <hr>
            <div class="account-detail-container"> 
                <p class="mt-3">Contact Details: </p>
                <textarea class="detail-area" name="contact" disabled><?php echo htmlspecialchars($contact); ?></textarea>
            </div>
            <hr>
                <button type="submit" id="submit-details" class="account-buttons">Submit</button>
            </form>
            
        </div>
    </div>
</div>
    
    <script>
        function enableTextArea() {
            var textareas = document.getElementsByClassName('detail-area');
            for (var i = 0; i < textareas.length; i++) {
                textareas[i].removeAttribute('disabled');
            }
            document.getElementById('submit-details').style.display='inline-block';
        }
    </script>
<?php 
    require_once "../includes/footer.php";
?>