
<?php

    include '_config.php';

if(isset($_POST['ajout_panier'])) {
    $nom_pdt = $_POST['produit_nom'];
    $prix_pdt = $_POST['produit_prix'];
    $image_pdt = $_POST['produit_image'];
    $quantite_pdt = $_POST['produit_quantite'];

    $nbr_panier = mysqli_query($bdd, "SELECT * FROM `panier` WHERE nom = '$nom_pdt'") or die ('Erreur');

    if(mysqli_num_rows($nbr_panier) > 0) {
        echo 'Ce produit est déjà dans votre panier';
    }else{
        mysqli_query($bdd, "INSERT INTO `panier` (nom, prix, quantite, image) VALUES ('$nom_pdt', '$prix_pdt', '$quantite_pdt', '$image_pdt')");
        echo 'Produit ajouter au panier';
    }
}
?>



<section class="wrapper-produit">

<h1>Le meilleur de chez Gamestore !</h1>

    <div class="container-show-pdt">

        <?php 
            $select_nom_produit = mysqli_query($bdd, "SELECT * FROM `produit` LIMIT 8 ") or die('Erreur');
            if(mysqli_num_rows($select_nom_produit) > 0){
                while($fetch_produits = mysqli_fetch_assoc($select_nom_produit)){
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
                echo '<p class="vide">Vous n\'avez ajouté aucun produits :/</p>';
            }
        ?>

    </div>


<!-- MORE PRODUCT -->

<div class="button-center">
    <a href="plus.php" class="plus">Afficher plus</a>
</div>

<div class="hidden">

</div>




