<?php 
    $currentPage = basename($_SERVER['PHP_SELF']);
    require_once "../includes/header.php";
    require_once '../db/conn.php';


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
<style>
    .carousel-item img {
        height: 65vh;
    }
</style>
<form class="input-group" method="get" action="/search.php">
        <input type="text" class="form-control" name="country" placeholder="Search Your favourite destination here...">
        <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <?php
            foreach ($packages as $row) {
                $destination = $row['country'];
                if($destination!=='Switzerland') continue;
                $days = $row["noDays"];
                $price = $row["amount"];
                $details = $row["itinerary"];
                $photo = base64_encode($row["image"]);
            }
        ?>
      <img src="data:image/jpeg;base64,<?php echo $photo; ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h5>Switzerland</h5>
        <p><?php echo htmlspecialchars($days); ?> days <?php echo htmlspecialchars($days-1); ?> night</p>
      </div>
    </div>
    <div class="carousel-item">

    <?php
            foreach ($packages as $row) {
                $destination = $row['country'];
                if($destination!=='Dubai') continue;
                $days = $row["noDays"];
                $price = $row["amount"];
                $details = $row["itinerary"];
                $photo = base64_encode($row["image"]);
            }
        ?>
         <div class="carousel-caption">
        <h5>Dubai</h5>
        <p><?php echo htmlspecialchars($days); ?> days <?php echo htmlspecialchars($days-1); ?> night</p>
      </div>
      <img src="data:image/jpeg;base64,<?php echo $photo; ?>" class="d-block w-100" alt="...">
     
    </div>
    <div class="carousel-item">
    <?php
            foreach ($packages as $row) {
                $destination = $row['country'];
                if($destination!=='Maldives') continue;
                $days = $row["noDays"];
                $price = $row["amount"];
                $details = $row["itinerary"];
                $photo = base64_encode($row["image"]);
            }
        ?>
      <img src="data:image/jpeg;base64,<?php echo $photo; ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h5>Maldives</h5>
        <p><?php echo htmlspecialchars($days); ?> days <?php echo htmlspecialchars($days-1); ?> night</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<?php 
    require_once "../includes/footer.php";
?>