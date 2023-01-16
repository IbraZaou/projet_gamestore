<?php
include('_config.php');
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/ce6abbadbc.js" crossorigin="anonymous"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
    
<header>
        <nav>
            <div class="logo">
                <h1>GAME STORE</h1>
            </div>

            <ul class="catalogue">
                <li class="off">
                    <span>Catalogue</span>
                </li>
                <li>
                    <i class="fa-solid fa-user"></i>
                    <a href="">Profil</a>
                </li>

                <li>
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <a href="">Rechercher</a>
                </li>

                <li>
                    <i class="fa-solid fa-fire-flame-curved"></i>
                    <a href="">Promotions</a>
                </li>

                <li>
                    <i class="fa-solid fa-heart"></i>
                    <a href="">Favoris</a>
                </li>
            </ul>

            <p></p>

            <ul class="categories">
                <li class="off">
                    <span>Catégories</span>
                </li>
                <li>
                    <i class="fa-solid fa-computer"></i>
                    <a href="#ordinateur">Ordinateur</a>
                </li>
                <li>
                    <i class="fa-solid fa-tv"></i>
                    <a href="#moniteur">Moniteur Gaming</a>
                </li>
                <li>
                    <i class="fa-solid fa-headset"></i>
                    <a href="#casque">Casque Gaming</a>
                </li>
                <li>
                    <i class="fa-solid fa-keyboard"></i>
                    <a href="#clavier">Clavier Gaming</a>
                </li>
                <li>
                    <i class="fa-solid fa-computer-mouse"></i>
                    <a href="#souris">Souris Gaming</a>
                </li>
                <li>
                    <i class="fa-solid fa-gamepad"></i>
                    <a href="#manette">Manette</a>
                </li>
                <li>
                    <i class="fa-solid fa-circle-plus"></i>
                    <a href="#accessoire">Accessoire</a>
                </li>
            </ul>
        </nav>
    </header>


    <div class="wrapper-confirmation">

        <div class="container-confirmation">

            <h1>Votre panier</h1>

            <p>Votre produit: </p>
            <p>Prix: €</p>
            <p>Quantité: <?= $_POST['quantite']; ?></p>
            
            <p>Total à payer: €</p>


        </div>

        <button>Confirmer votre achat</button>
    </div>

</body>
</html>