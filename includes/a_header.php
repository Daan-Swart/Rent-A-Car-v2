<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Compiled and minified CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Box icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="../includes/adminstyle.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent-A-Car</title>
</head>

<body id="home" class="scrollspy">
    <!-- Navbar -->
    <div class="navbar-fixed">
        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo">Rent-A-Car <span style="font-size: 16px;">(Admin panel)</span> </a>
                    <?php if (isset($_SESSION['name'])) { ?>
                        <a href="#" data-target="mobile-nav" class="sidenav-trigger">
                            <i class="material-icons">menu</i>
                        </a>
                        <ul class="right hide-on-med-and-down">
                            <li><a href="#home">Home</a></li>
                            <li><a href="cars.php">Auto's</a></li>
                            <li><a href="verwijderd.php">Verwijderde autos</a></li>
                            <?php if (isset($_SESSION['name'])) { ?>
                                <li><a href="../includes/logout.php" class="log-out">Uitloggen</a></li>
                            <?php } ?>
                            <li><a href="../index.php">Naar orginele site</a></li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </div>

    <!-- Sidenav -->
    <!-- <ul class="sidenav" id="mobile-nav">
        <li><a href="#home">Home</a></li>
        <li><a href="#search">Search</a></li>
        <li><a href="#popular">Popular Places</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#contact">Conctact</a></li>
        <br>
        <li><a class="waves-effect waves-light btn">Inloggen</a></li>
    </ul> -->