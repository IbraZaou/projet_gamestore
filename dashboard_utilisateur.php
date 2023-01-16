<?php
    include '_config.php';

    session_start();
    
    // SUPPRESSION D'UN UTILISATEUR

    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($bdd, "DELETE FROM `users` WHERE usersID = '$delete_id'") or die('query failed');
        header('location:dashboard_utilisateur.php');
    }
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
        <h1>Les Utilisateurs</h1>

        <div class="dashboard-container-users">

        <!-- UTILISATEURS STARTS  -->

                <?php 
                    $select_users = mysqli_query($bdd, "SELECT * FROM `users`") or die('query failed');
                    while($fetch_users = mysqli_fetch_assoc($select_users)) {
                ?>
                
            <div class="data">
                    <p> Id : <span><?php echo $fetch_users['usersID']; ?></span></p>
                    <p> Nom : <span><?php echo $fetch_users['nom']; ?></span></p>
                    <p> Email : <span><?php echo $fetch_users['email']; ?></span></p>
                    <p> Pseudo : <span><?php echo $fetch_users['pseudo']; ?></span></p>
                    

                    <!-- Alert Box -->
                    <?php 
                        $alertBox = "Êtes vous sûr de vouloir supprimer " .$fetch_users['pseudo']. " ?";
                    ?>

                    <a href="dashboard_utilisateur.php?delete=<?php echo $fetch_users['usersID']; ?>" onclick="return confirm(' <?= $alertBox?>');" class="delete-btn" >Supprimer l'utilisateur</a>
                    
            </div>

                <?php
                    };
                ?>

        <!-- UTILISATEURS END  -->

            </div>



    </section>


    <!-- swipper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- javscript -->
    <script src="js/main.js"></script>
</body>
</html>