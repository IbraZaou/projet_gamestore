<?php

    include '_config.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/ce6abbadbc.js" crossorigin="anonymous"></script>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- style -->
    <link rel="stylesheet" href="css/style.css">

    <!-- animate css -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- swipper css -->
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
</head>

<body>

    <?php
        // Header
        include('include/_header_dashboard.php');
    ?>

    <section class="dashboard">
        <h1>Dashboard</h1>

        <div class="dashboard-container">

        <!-- UTILISATEURS  -->
            <div class="data">
                <?php 
                    $select_users = mysqli_query($bdd, "SELECT * FROM `users`") or die('query failed');
                    $number_of_users = mysqli_num_rows($select_users)
                ?>
                    <h3><?php echo $number_of_users; ?></h3>
                    <p>Utilisateurs</p>
            </div>

        <!-- PRODUITS -->

            <div class="data">
                <?php 
                    $select_users = mysqli_query($bdd, "SELECT * FROM `produit`") or die('query failed');
                    $number_of_users = mysqli_num_rows($select_users)
                ?>
                    <h3><?php echo $number_of_users; ?></h3>
                    <p>Produits</p>
            </div>

        <!-- MESSAGES -->

            <div class="data">
                <?php 
                    $select_users = mysqli_query($bdd, "SELECT * FROM `message`") or die('query failed');
                    $number_of_users = mysqli_num_rows($select_users)
                ?>
                    <h3><?php echo $number_of_users; ?></h3>
                    <p>Messages</p>
            </div>

        </div>

    </section>


    <!-- swipper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- javscript -->
    <script src="js/main.js"></script>
</body>
</html>