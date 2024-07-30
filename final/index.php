<?php
    include_once("./includes/header.php");
    session_start();
?>
<div class="container mt-5 bg-dark p-5">
    <?php
    
        if(isset($_SESSION['succ-message'])){
            echo "<p class='text-success text-center' style='background-color: lightgreen;'>".$_SESSION['succ-message']."</p>";
            unset($_SESSION['succ-message']);
        }
        if(isset($_SESSION['error-message'])){
            echo "<p class='text-danger'>".$_SESSION['error-message']."</p>";
            unset($_SESSION['error-message']);
        }
    ?>
    <form method="post" action="requireStringSubmit.php" class="d-flex flex-column">
        <input placeholder="Enter your message..." name="string_box" class="p-4 mt-2" required>
        <button type="submit" class="mt-2 p-2">Submit</button>
    </form>

    <div class="mt-5 text-center bg-warning p-3">
        <a href="showAll.php" class="text-danger" style="font-weight: bold;">Show All Records</a>
    </div>
    
</div>

<?php
    include_once("./includes/footer.php");
?>