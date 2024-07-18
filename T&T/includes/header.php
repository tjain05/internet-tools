<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T&T</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/contact.css">
    <link rel="stylesheet" href="/css/details.css">
    <link rel="stylesheet" href="/css/account.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Merriweather', serif;
  font-weight: 500;
  font-style: normal;">
    <header class="common-class">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="../index.php">
                <img height="50px" width="50px" src="/assets/logo.png" alt="Logo" />
                <h2 style="color: gold; margin: 0;">T&T</h2>
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link p-2 <?php if ($currentPage === 'index.php') echo 'active'; ?>" aria-current="page" href="../index.php" style="color: gold">Home</a>
                    <a class="nav-link p-2 <?php if ($currentPage === 'about.php') echo 'active'; ?>" href="/php/about.php" style="color: gold">About Us</a>
                    <a class="nav-link p-2 <?php if ($currentPage === 'package.php') echo 'active'; ?>" href="/php/package.php" style="color: gold">New Offers</a>
                    <a class="nav-link p-2 <?php if ($currentPage === 'contact.php') echo 'active'; ?>" href="/php/contact.php" style="color: gold">Contact Us</a>
                    <a class="nav-link p-2 <?php if ($currentPage === 'login.php') echo 'active'; ?>" href="/php/login.php" style="color: gold">My Account</a>
                </div>
            </div>
        </div>
    </nav>
    </header>
    <main>
