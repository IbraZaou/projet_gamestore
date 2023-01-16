<?php
    include '_config.php';

    session_start();
    
    // SUPPRESSION D'UN UTILISATEUR

    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($bdd, "DELETE FROM `message` WHERE messageID = '$delete_id'") or die('query failed');
        header('location:dashboard_msg.php');
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
        <h1>Les Messages</h1>

        <div class="dashboard-container-users">

        <!-- MESSAGE STARTS  -->

                <?php 
                    $select_message = mysqli_query($bdd, "SELECT * FROM `message`") or die('query failed');
                    while($fetch_message = mysqli_fetch_assoc($select_message)) {
                ?>
                
            <div class="data">
                    <p> Id : <span><?php echo $fetch_message['messageID']; ?></span></p>
                    <!-- <p> Genre : <span><?php echo $fetch_message['email']; ?></span></p> -->
                    <p> Nom : <span><?php echo $fetch_message['nom']; ?></span></p>
                    <p> Email : <span><?php echo $fetch_message['email']; ?></span></p>
                    <p> Num : <span><?php echo $fetch_message['num']; ?></span></p>
                    <p> Message : <span><?php echo $fetch_message['message']; ?></span></p>

                    

                    <!-- Alert Box -->
                    <?php 
                        $alertBox = "Êtes vous sûr de vouloir supprimer le message de " .$fetch_message['nom']. " ?";
                    ?>

                    <a href="dashboard_msg.php?delete=<?php echo $fetch_message['messageID']; ?>" onclick="return confirm(' <?= $alertBox?>');" class="delete-btn" >Supprimer le message</a>
                    
            </div>

                <?php
                    };
                ?>

        <!-- MESSAGE END  -->

            </div>



    </section>


    <!-- swipper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- javscript -->
    <script src="js/main.js"></script>
</body>
</html>