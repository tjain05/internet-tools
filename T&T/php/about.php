<?php 
$currentPage = basename($_SERVER['PHP_SELF']);
session_start();
require_once "../includes/header.php";
require_once '../db/conn.php';

?>
 <style>
        body{
            background-color: black;
        }
        .about-section {
            display: flex;
            align-items: center;
            padding: 2rem;
        }
        .about-image {
            max-width: 100%;
        }
        .about-text {
            flex: 1;
        }
        .container{
            background-color: rgb(59, 57, 57);
            box-shadow: 0 0 15px rgba(213, 215, 64, 0.7);
            padding: 2rem;
        }
        @media (min-width: 768px) {
            .container {
                margin-top: 2rem;
            }
}
        
    </style>
    <div class="container bg-dark h-100 p-5">
    <div class="row h-100">
        <div class="col-md-4">
            <img src="/assets/about.jpg" alt="About" class="about-image ">
        </div>
        <div class="col-md-8">
            <div class="about-text">
                <h1 class="text-center text-white">About Us</h1>
                <p class="text-white">LuxTravel is your one-stop solution for exploring the world. With over 20 years of experience in the travel industry, we are committed to making your travel dreams a reality. Our team of more than 50 dedicated and experienced employees is always ready to assist you in planning and enjoying your dream destinations.</p>
                <p class="text-white">We operate globally, ensuring that no destination is too small or too remote to be included in our tour offerings. If your desired location is not listed on our website, we will make every effort to arrange it for you.</p>
                <p class="text-center text-white"><strong>----Live your bucket list with us.----</strong></p>
            </div>
        </div>
    </div>
</div>


<?php
require_once "../includes/footer.php";
?>