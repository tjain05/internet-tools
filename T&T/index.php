<?php 
$currentPage = basename($_SERVER['PHP_SELF']);
require_once "./includes/header.php";
require_once "./db/conn.php";
$sql = "SELECT pd.*, cp.image FROM package_details pd 
        JOIN package cp ON pd.country = cp.location";
$result = mysqli_query($conn, $sql);

$packages = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $packages[] = $row;
    }
} else {
    echo "Error executing query: " . mysqli_error($conn);
}
?>

<div>
    <div class="image-container">
        <img src="assets/homePage.png" alt="image" class="main-image"/>
        <img class="down-button" onclick="scrollToNextSection()" src="./assets/down_image.png" alt="down key"/>
    </div>

    <div style="background-color: #343a40;">
        <label class="text-label">Hot Selling Offers 🔥</label>
        <div class="cards" >
            <?php
            $count = 0;
            foreach ($packages as $row) {
                if ($count++ >= 5) break;
                $destination = $row['country'];
                $days = $row["noDays"];
                $price = $row["amount"];
                $details = $row["itinerary"];
                $photo = base64_encode($row["image"]);
                echo "
                <a href='./php/details.php?destination=$destination'>
                    <div class='card'  style='background-color: black; color: gold; padding: 6px;'>
                        <img src='data:image/jpeg;base64,$photo' class='card-img' alt='img'/>
                        <h5  style='margin-top: 3px;background-color: black; color: gold;'>$destination</h5>
                        <p  style='background-color: black; color: gold;'>" . htmlspecialchars($days) . " days " . htmlspecialchars($days - 1) . " night </p>
                    </div>
                </a>";
            }
            ?>
        </div>
    </div>

    <div style="background-color: #343a40;">
        <label class="text-label">Most Travelled Destination ✈️</label>
        <div class="cards">
            <?php
            $count = 0;
            foreach ($packages as $row) {
                if ($count++ < 5) continue;
                $destination = $row['country'];
                $days = $row["noDays"];
                $price = $row["amount"];
                $details = $row["itinerary"];
                $photo = base64_encode($row["image"]);
                echo "
                <a href='./php/details.php?destination=$destination'>
                    <div class='card'  style='background-color: black; color: gold; padding: 6px'>
                        <img src='data:image/jpeg;base64,$photo' class='card-img' alt='img''/>
                        <h5 style='margin-top: 3px;background-color: black; color: gold;'>$destination</h5>
                        <p style='background-color: black; color: gold;'>" . htmlspecialchars($days) . " days " . htmlspecialchars($days - 1) . " night </p>
                    </div>
                </a>";
            }
            ?>
        </div>
    </div>
</div>

<?php 
    require_once "./includes/footer.php";
?>
