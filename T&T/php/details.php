<?php 
session_start();
require_once "../includes/header.php";
require_once '../db/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        $destination = isset($_GET['destination']) ? $_GET['destination'] : '';
        $amount = isset($_GET['amount']) ? $_GET['amount'] : '';
        if($amount==='0')
            echo "Invalid Days";
        else
        header("Location: payment.php?destination=" . urlencode($destination) ."&amount=" . urlencode($amount));

    } else {
        $destination = isset($_GET['destination']) ? $_GET['destination'] : '';
        $amount = isset($_GET['amount']) ? $_GET['amount'] : '';
        if($amount==='0')
            echo "Invalid Days";
        else
        $_SESSION['login-message']="Please Login to Continue";
        header("Location: login.php?destination=" . urlencode($destination) ."&amount=" . urlencode($amount));
        exit;
    }
}

if (isset($_GET['destination'])) {
    $destination = $_GET['destination'];
    $sql = "SELECT pd.*, cp.image FROM package_details pd 
            JOIN package cp ON pd.country = cp.location 
            WHERE pd.country='$destination'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $days = $row["noDays"];
            $price = $row["amount"];
            $details = $row["itinerary"];
            $photo = base64_encode($row["image"]);
            $found=true;
        } else {
            echo "Location coming soon.";
            $days= 'Not Available';
            $price= 'Not Available';
            $details= 'Not Available';
            $found=false;
        }
    } else {                           
        echo "Error executing query: " . mysqli_error($conn);
    }
} else {
    echo "Destination not specified";
}
?>
<div style="background-color: black; padding: 1em; color: #c6c7c8; ">
<div class="details" >
    <div>
        <?php
            if(!$found){
                echo "<img src='/assets/not_found.jpg' class='details-img' style='box-shadow: 0 0 15px rgba(213, 215, 64, 0.7);
                transition: transform 0.3s, box-shadow 0.3s;'>";
            }else{
                
            }
        ?>
        <img src='data:image/jpeg;base64,<?php echo $photo;?>' class='details-img'
        style="background-color: rgb(59, 57, 57);
        padding: 7px;
        box-shadow: 0 0 15px rgba(213, 215, 64, 0.7);
        transition: transform 0.3s, box-shadow 0.3s;"> ;
            </div>
            <div class="details-content" >
                <h1 style="color: gold; font-family: 'Cinzel', serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;"><?php echo htmlspecialchars($destination); ?></h1>
        <?php
            if($found){
                $night=$days-1;
                echo "<p class='mt-4'>Package: $days days $night night </p>";
            }else{
                echo "<p class='mt-4'>Package: Not Available</p>";
            }
        ?>
        <p>Price: $<?php echo htmlspecialchars($price); ?></p>
        <label for="days" >Choose a number of Person:</label>
        <div class="mt-3">
            <button onclick="changeDays(-1)" style="background-color: gold; color: black; border-radius: 10px">-</button>
            <span id="days">0</span>
            <button onclick="changeDays(1)" style="background-color: gold; color: black; border-radius: 10px">+</button>
        </div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById("bookTourForm");

        form.addEventListener("submit", function(event) {
            event.preventDefault();
            var days = document.getElementById("days").innerText;
            var price= <?php echo htmlspecialchars($price); ?>;
            var amount= parseInt(days)*price;
            form.action = "details.php?destination=<?php echo urlencode($destination); ?>&amount=" + encodeURIComponent(amount);
            form.submit();
        });
    });
</script>
<?php
    if($found){
        echo "<form id='bookTourForm' method='post'>
        <button class='mt-5' type='submit' style='background-color: gold; color: black; border-radius: 10px'>Book Tour</button>
        </form>";
    }   
?>

    </div>
</div>
<div
style="display: flex;
    flex-direction: column;
   ">
    <h1 style="color: gold; text-align: center; font-family: 'Cinzel', serif;
  font-optical-sizing: auto;
  font-weight: 400;
  font-style: normal;">Tour Details</h1>
    <pre style="
 
  background-color: rgb(59, 57, 57);
  padding: 10px;
  box-shadow: 0 0 15px rgba(213, 215, 64, 0.7);
  transition: transform 0.3s, box-shadow 0.3s;"><?php echo htmlspecialchars($details); ?></pre>
</div>

<div>
    <p style="color: gold;">Still Have any Doubt? No Problem! <a href="contact.php">Contact Us today!</a></p>
</div>
</div>
<script src="/js/details.js"></script>
<?php 
require_once "../includes/footer.php";
?>
