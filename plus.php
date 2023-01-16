
<?php


include '_config.php';

session_start();

$user_id = $_SESSION['pseudo'];

if(!isset($user_id)){
   header('location:seconnecter.php');
}


if(isset($_POST['ajout_panier'])) {

    $nom_pdt = $_POST['produit_nom'];
    $prix_pdt = $_POST['produit_prix'];
    $image_pdt = $_POST['produit_image'];
    $quantite_pdt = $_POST['produit_quantite'];

    $nbr_panier = mysqli_query($bdd, "SELECT * FROM `panier` WHERE nom = '$nom_pdt'") or die ('Erreur');

    if(mysqli_num_rows($nbr_panier) > 0) {
        echo 'Ce produit est déjà dans votre panier';
    }else{
        mysqli_query($bdd, "INSERT INTO `panier` (nom, prix, quantite, image) VALUES ('$nom_pdt', '$prix_pdt', '$quantite_pdt', '$image_pdt')") or die ('Erreur');
        echo 'Produit ajouter au panier';
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les produits</title>
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

<!-- PLUS START -->

    <section class="plus_pdt">

    <h1>Tous les produits de chez Gamestore</h1>

        <div class="filtre">    
            <button>Ordinateur</button>
            <button>Moniteur</button>
            <button>Casque</button>
            <button>Clavier</button>
            <button>Souris</button>
            <button>Manette</button>
            <button>Accessoire</button>

            <!-- <button><i class="fa-solid fa-filter"></i>Filtre</button> -->
        </div>

    <div class="container-show-pdt">

        <?php  
            $select_products = mysqli_query($bdd, "SELECT * FROM `produit`") or die('Erreur');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_produits = mysqli_fetch_assoc($select_products)){
        ?>
            <form action="" method="post" class="box"> 
                <img src="img_upload/<?php echo $fetch_produits['image']; ?>" alt="">
                <div class="nom"><?php echo $fetch_produits['nom']; ?></div>
                <div class="categorie"><?php echo $fetch_produits['categorie']; ?></div>
                <div class="prix"><?php echo $fetch_produits['prix']; ?> €</div>
                <input type="number" min="1" max="100" name="produit_quantite" value="1" class="qty">
                <input type="hidden" name="produit_nom" value="<?php echo $fetch_produits['nom']; ?>">
                <input type="hidden" name="produit_prix" value="<?php echo $fetch_produits['prix']; ?>">
                <input type="hidden" name="produit_image" value="<?php echo $fetch_produits['image']; ?>">
                <input type="submit" value="Ajouter au panier" name="ajout_panier" class="panier">
            </form>
        <?php
            }
        }else{
            echo '<p class="empty">no products added yet!</p>';
        }
        ?>

    </div>

    </section>

    

<!-- PLUS END -->

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