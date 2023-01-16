
<?php 

    include '_config.php';

    session_start();

    $user_id = $_SESSION['pseudo'];

    if(!isset($user_id)){
        header('location:seconnecter.php');
    }


    // MODIFIER QUANTITE START

        if(isset($_POST['maj_panier'])){
            $panier_id = $_POST['panier_id'];
            $quantite_panier = $_POST['quanite_panier'];
        mysqli_query($bdd, "UPDATE `panier` SET quantite = '$quantite_panier' WHERE panierID = '$panier_id'") or die('Erreur');

            echo '
            <div class="echo_php">
                <span class="echo" id="echo_php">Votre panier à été mis à jour !</span>
            </div>';
        }

    // MODIFIER QUANTITE END

    // SUPPRIMER PRODUIT PANIER START

        if(isset($_GET['delete'])){
            $supp_id = $_GET['delete'];
            mysqli_query($bdd, "DELETE FROM `panier` WHERE panierID = '$supp_id'") or die('Erreur');
            header('location:panier.php');
        }

    // SUPPRIMER PRODUIT PANIER END

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
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
        include('include/_header_connected.php');
    ?>


<main>

    <!-- PANIER START -->

    <section class="panier-page">

        <h2>Votre panier</h2>

        <div class="container-panier">
            <?php
                $total = 0;
                $select_panier = mysqli_query($bdd, "SELECT * FROM `panier` WHERE user_id = '$user_id'") or die ('Erreur');
                if(mysqli_num_rows($select_panier) > 0) {
                    while($fetch_panier = mysqli_fetch_assoc($select_panier)) {
            ?> 
            
            <div class="show-container-panier">
            <a href="panier.php?delete=<?php echo $fetch_panier['panierID']; ?>" class="fas fa-times" onclick="return confirm('Supprimer du panier?');"></a>
            <img src="img_upload/<?php echo $fetch_panier['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_panier['nom']; ?></div>
            <div class="price"><?php echo $fetch_panier['prix']; ?> €</div>

        <form action="" method="post">
            <input type="hidden" name="panier_id" value="<?php echo $fetch_panier['panierID']; ?>">
            <input type="number" min="1" name="quanite_panier" value="<?php echo $fetch_panier['quantite']; ?>">
            <input type="submit" name="maj_panier" value="Modifier" class="modif-btn">
        </form>

        <div class="sub-total"> sous total : <span><?php echo $sous_total = ($fetch_panier['quantite'] * $fetch_panier['prix']); ?> €</span> </div>

            </div>
            
            <?php
                $total += $sous_total;
                        }
                    }else {
                        echo '<p class="vide">Votre panier est vide</p>';
                    }
            ?>
        </div>

    </section>


    <!-- PANIER END -->

</main>

    <?php
        // Footer
        include('include/_footer.php');
    ?>

    <!-- swipper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- javscript -->
    <script src="js/main.js"></script>
</body>
</html>