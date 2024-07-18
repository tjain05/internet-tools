<?php 
    $currentPage = basename($_SERVER['PHP_SELF']);
    require_once "../includes/header.php";
    require_once '../db/conn.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fname']) &&
     isset($_POST['lname']) && isset($_POST['contact']) && isset($_POST['query'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $contact=$_POST['contact'];
        $query=$_POST['query'];

        $sql = "INSERT INTO `contact`(`fname`, `lname`, `contact_method`, `query`) 
        VALUES ('$fname','$lname','$contact','$query')";

        if (mysqli_query($conn, $sql)) {
            echo "<div style='text-align:center; background-color: green; color: lightgreen'>Your Message has been recorded!</div>";
        } else {
            echo "<div style='text-align:center; background-color: red; color: orange'>Oops! some error occured. Try Again.</div>";
        }
    }
?>
    <div class="container-fluid bg-dark" style="padding: 5em" >
        <div class="row">
            <div class="mt-1 col-lg-5 col-md-12 bg-dark form-container border rounded-5  text-center">
                <form method="post" action="">
                    <label style="font-size: 2.5em;" class=" text-center">Contact us via form</label>
                    <div class="mt-3 form-group">
                        <input type="text" class="form-control" id="firstName1" name="fname" placeholder="Enter first name" required>
                    </div>
                    <div class="mt-3 form-group">
                        <input type="text" class="form-control" id="lastName1" name="lname" placeholder="Enter last name" required>
                    </div>
                    <div class="mt-3 form-group">
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Prefered Contact method Phone/Mail" required>
                    </div>
                    <div class="mt-3 form-group">
                        <textarea class="form-control query-area" id="query" name="query" placeholder="Please enter your query here..." required></textarea>
                    </div>
                    <button type="submit" class="btn  mt-3" style="background-color: gold; color:black; font-weight: bold;">Submit</button>
                </form>
            </div>
            <div class="mt-1 col-lg-5 col-md-12 bg-dark content-container border rounded-5 text-center">
                <div class="text-center">
                    <label style="font-size: 2.5em;">Contact us directly</label>
                </div>
                <label style="font-size: 1.2em; color: silver;" class=" mt-2 text-center">Mail: abc@gmail.com</label><br>
                <label style="font-size: 1.2em; color: silver;" class=" text-center">Phone No.: +1-(647)-273-9282</label>
                <div class="mt-5 text-center">
                    <label style="font-size: 2em;">Hours of Operation</label>
                </div>
                <label style="font-size: 1.2em; color: silver;" class=" mt-2 text-center">Monday to Friday: 9 a.m. - 9 p.m</label><br>
                <label style="font-size: 1.2em; color: silver;" class=" text-center">Saturday: 9 a.m. - 6 p.m</label><br>
                <label style="font-size: 1.2em; color: silver;" class=" text-center">Sunday: Closed</label> 
            </div>
        </div>
    </div>
<?php 
    require_once "../includes/footer.php";
?>
