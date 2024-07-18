<?php 
session_start();
require_once "../includes/header.php";
if(isset($_GET['destination']) && isset($_GET['amount'])){
    $people=$_GET['amount'];
    $destination=$_GET['destination'];
}
?>
<div style="padding: 30px; display: flex; flex-direction: column; margin: 0.5em;">
<h2>Total Amount: $<?php echo $people?></h2>
    <div style="background-color: black; color: white; padding: 1em; border-radius: 10px;">
    <form class="row g-3" action='/paymentProcess.php?amount=<?php echo $people?>&destination=<?php echo $destination?>' method='post' onsubmit="return validateForm()">
    <div class="col-12">
    <label class="form-label">Card Number</label>
    <input type="text" class="form-control" id="cardNo" placeholder="Enter your card number" maxlength="16" required>
  </div> 
  <div class="col-6">
    <label class="form-label">Name on Card</label>
    <input type="text" class="form-control" placeholder="Enter your name" required>
  </div>
  <div class="col-4">
    <label class="form-label">Expiry Date</label>
    <input type="text" class="form-control" id="expiry" placeholder="Expiry Date (MM/YYYY)" required>
  </div>
  <div class="col-md-2">
    <label class="form-label">CVV</label>
    <input type="password" class="form-control" id="cvv" maxlength="3" required>
  </div>
  <div class="col-12">
    <label class="form-label">Billing Address</label>
    <input type="text" class="form-control" placeholder="1234 Main St" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Pay</button>
  </div>
</form>
    </div>

</div>
<?php
    require_once "../includes/footer.php";
?>

<script src="/js/card.js"></script>
