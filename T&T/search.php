<?php
    if (isset($_GET['country'])) {
        $country = htmlspecialchars($_GET['country']); // Use htmlspecialchars to prevent XSS attacks
        header("Location: ../php/details.php?destination=$country");
    } else {
        echo "No country entered.";
    }
?>
