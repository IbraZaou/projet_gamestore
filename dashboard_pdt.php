<?php
    include '_config.php';

    session_start();
    
    // AJOUT D'UN PRODUIT STARTS

        if(isset($_POST['ajout_pdt'])) {

            $produit = mysqli_real_escape_string($bdd, $_POST['produit']);
            $prix = $_POST['prix'];
            $categorie = $_POST['categorie'];
            $image = $_FILES['image']['name']; // toujours 'name' fonction PHP
            $image_size = $_FILES['image']['size'];
            $image_tmp_produit = $_FILES['image']['tmp_name']; // toujours 'tmp_name' fonction PHP
            $image_fichier = 'img_upload/'.$image;

            $select_nom_produit = mysqli_query($bdd, "SELECT nom FROM `produit` WHERE nom = '$produit'") or die('query failed');

            if(mysqli_num_rows($select_nom_produit) > 0){
                echo 'Le nom à déjà été choisis pour un autre produit...';
            }else{
                $ajout_pdt_req = mysqli_query($bdd, "INSERT INTO `produit` (nom, categorie, prix, image) VALUES ('$produit', '$categorie', '$prix', '$image')") or die('Erreur');

                if($ajout_pdt_req) {
                    if($image_size > 2000000) {
                        echo 'image trop lourde, veuillez choisir une autre image.';
                    }else{
                        move_uploaded_file($image_tmp_produit, $image_fichier);
                        echo 'Votre produit à bien été ajouté';
                    }
                }else {
                    echo "Le produit n'a pas pu être ajouté";
                }
            }
        }

    // AJOUT D'UN PRODUIT END


    // SUPPRESSION D'UN PRODUIT STARTS

        if(isset($_GET['delete'])){
            $delete_id = $_GET['delete'];
            $supp_image_req = mysqli_query($bdd, "SELECT image FROM `produit` WHERE produitID = '$delete_id' ") or die('Erreur');
            $fetch_supp_image = mysqli_fetch_assoc($supp_image_req);
            unlink('img_upload/'.$fetch_supp_image['image']);
            mysqli_query($bdd, "DELETE FROM `produit` WHERE produitID = '$delete_id'") or die('Erreur');
            header('location:dashboard_pdt.php');
        }

    // SUPPRESSION D'UN PRODUIT END


    // METTRE A JOUR UN PRODUIT STARTS

        if(isset($_POST['modif_pdt'])) {
            $modif_produit = $_POST['update_p_id'];
            $modif_nom = $_POST['modif_nom_pdt'];
            $modif_prix = $_POST['modif_prix'];
            $modif_categorie = $_POST['modif_categorie'];

            mysqli_query($bdd, "UPDATE `produit` SET nom = '$modif_nom', prix = '$modif_prix', categorie = '$modif_categorie' WHERE produitID = '$modif_produit' ") or die('Erreur');

            $modif_image = $_FILES['modif_image']['name'];
            $modif_image_nom_tmp = $_FILES['modif_image']['tmp_name'];
            $modif_image_size = $_FILES['modif_image']['size'];
            $modif_fichier = 'img_upload/' .$modif_image;
            $modif_old_image = $_POST['update_old_image'];
        
            if(!empty($modif_image)){
                if($modif_image_size > 2000000) {
                    echo "image trop lourde, veuillez choisir une autre image.";
                }else{
                    mysqli_query($bdd, "UPDATE `produit` SET image = '$modif_image' WHERE produitID = '$modif_produit'") or die ('Erreur');
                    move_uploaded_file($modif_image_nom_tmp, $modif_fichier);
                    unlink('img_upload/' .$modif_old_image);
                }
            }

            header('location:dashboard_pdt.php');
        }

    // METTRE A JOUR UN PRODUIT END

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


<!-- PRODUIT C.R.U.D STARTS -->

    <section class="dashboard">
        <h1>Les Produits</h1>

            <form class='dashboard-container-pdt' method="post" enctype="multipart/form-data">
                <h3>Ajouter un produit</h3>
                <input type="text" name="produit" placeholder="Produit" required autocomplete="off">
                <select name="categorie">
                    <option value="categorie">Catégorie</option>
                    <option value="accessoire">Accessoire</option>
                    <option value="casque">Casque</option>
                    <option value="clavier">Clavier</option>
                    <option value="manette">Manette</option>
                    <option value="moniteur">Moniteur</option>
                    <option value="ordinateur">Ordinateur</option>
                    <option value="souris">Souris</option>
                </select>
                <input type="number" min="0" name="prix" placeholder="Prix" required>

                    <label class="img-upload">
                        <input type="file" name="image" accept="image/png" required>
                        <span>Insérer l'image du produit <i class="fa-solid fa-upload"></i></span>
                    </label>

                <input type="submit" value="Ajouter le produit" name="ajout_pdt">
            </form>

    </section>


<!-- PRODUIT C.R.U.D END -->

<!-- AFFICHAGE DES PRODUITS STARTS -->

    <div class="wrapper-container-show">

        <div class="container-show-pdt">

            <?php 

                $select_nom_produit = mysqli_query($bdd, "SELECT * FROM `produit`") or die('Erreur');
                if(mysqli_num_rows($select_nom_produit) > 0){
                    while($fetch_produits = mysqli_fetch_assoc($select_nom_produit)){
            ?>

                <div class="box">
                    <img src="img_upload/<?php echo $fetch_produits['image']; ?>" alt="">
                    <div class="nom"><?php echo $fetch_produits['nom']; ?></div>
                    <div class="categorie"><?php echo $fetch_produits['categorie']; ?></div>
                    <div class="prix"><?php echo $fetch_produits['prix']; ?> €</div>
                    <a href="dashboard_pdt.php?update=<?php echo $fetch_produits['produitID']?>" class="modif-btn">Modifier</a>

                    <?php 
                        $alertBoxSupp = "Êtes vous sûr de vouloir supprimer " .$fetch_produits['nom']. " ?";
                    ?>

                    <a href="dashboard_pdt.php?delete=<?php echo $fetch_produits['produitID']?>" onclick="return confirm(' <?= $alertBoxSupp?>');" class="supp-btn">Supprimer</a>
                </div>
            <?php
            }
                }else{
                    echo '<p class="vide">Vous n\'avez ajouté aucun produits :/</p>';
                }
            ?>

        </div>
    </div>

<!-- AFFICHAGE DES PRODUITS END -->

<!-- AFFICHAGE MODIFICATION DES PRODUITS STARTS -->

    <section class="modif-produit">

    <?php
    
        if(isset($_GET['update'])){
            $update_id = $_GET['update'];
            $update_req = mysqli_query($bdd, "SELECT * FROM `produit` WHERE produitID = '$update_id'") or die('Erreur');
            if(mysqli_num_rows($update_req) > 0) {
                while($fetch_update = mysqli_fetch_assoc($update_req)) {
    ?>

    <form action="" method="post" enctype='multipart/form-data'>
        <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['produitID']; ?>">
        <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
        <img src="img_upload/<?php echo $fetch_update['image']; ?>" alt="">
        <input type="text" name="modif_nom_pdt" value="<?php echo $fetch_update['nom']; ?>" placeholder="Nouveau nom du produit">
        <select name="modif_categorie" value = "<?php echo $fetch_update['categorie'];?>">
            <option value="categorie">Catégorie</option>
            <option value="accessoire">Accessoire</option>
            <option value="casque">Casque</option>
            <option value="clavier">Clavier</option>
            <option value="manette">Manette</option>
            <option value="moniteur">Moniteur</option>
            <option value="ordinateur">Ordinateur</option>
            <option value="souris">Souris</option>
        </select>
        <input type="number" min="0" name="modif_prix" value="<?php echo $fetch_update['prix']; ?>" placeholder="Nouveau prix du produit">
        
        <label class="img-upload">
            <input type="file" name="modif_image" accept="image/png">
            <span>Insérer l'image du produit <i class="fa-solid fa-upload"></i></span>
        </label>

        <input type="submit" value="modifier" name="modif_pdt">
        <input type="reset" id="close-modif" value="annuler">
    </form>

    <?php
    }
        }
        }else{
            echo '<script>document.querySelector(".modif-produit").style.display = "none";</script>';
        }
    ?>

    </section>

<!-- AFFICHAGE MODIFICATION DES PRODUITS END -->

    <!-- swipper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- javascript -->
    <script src="js/admin.js"></script>
</body>
</html>