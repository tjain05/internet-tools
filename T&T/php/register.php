<?php 
    $currentPage = basename($_SERVER['PHP_SELF']);
    require_once "../includes/header.php";
    session_start();
?>
<div style="padding: 30px; background-color: black; color: gold;">
<form class="row g-3" method="post" action="/receive.php" >
  <?php
        if(isset($_SESSION['register-message'])){
            echo "<p class='text-danger text-center'>".$_SESSION['register-message']."</p>";
            unset($_SESSION['register-message']);
        }
    ?>
  <div class="col-md-6">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email"  name="email" required>
  </div>
  <div class="col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="col-6">
    <label for="fname" class="form-label">First Name</label>
    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" required>
  </div>
  <div class="col-6">
    <label for="lname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" required>
  </div>
  <div class="col-12">
    <label for="contact" class="form-label">Contact</label>
    <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter your 10 digit number" required>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" required>
  </div>
  
  
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity" name="city" required>
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label" >Province</label>
    <select id="inputState"  name="province"class="form-select">
        <option selected>Choose...</option>
        <option value="Alberta">Alberta</option>
        <option value="British Columbia">British Columbia</option>
        <option value="Manitoba">Manitoba</option>
        <option value="New Brunswick">New Brunswick</option>
        <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
        <option value="Nova Scotia">Nova Scotia</option>
        <option value="Ontario">Ontario</option>
        <option value="Prince Edward Island">Prince Edward Island</option>
        <option value="Quebec">Quebec</option>
        <option value="Saskatchewan">Saskatchewan</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip" name="postal" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" style="background-color: gold; color: black;">Register</button>
  </div>
</form>
</div>
<?php 
    require_once "../includes/footer.php";
?>