<?php

include '_config.php';

session_start();

    $user_id = $_SESSION['pseudo'];
    
    if(!isset($user_id)){
        header('location:seconnecter.php');
    }
    
if(isset($_POST['contact_submit'])) {
    $nom = mysqli_real_escape_string($bdd, $_POST['contact_nom']);
    $email = mysqli_real_escape_string($bdd, $_POST['contact_email']);
    $num = $_POST['contact_num'];
    $msg = mysqli_real_escape_string($bdd, $_POST['contact_msg']);

    $select_message = mysqli_query($bdd, "SELECT * FROM `message` WHERE nom = '$nom' AND email = '$email' AND num = '$num' AND message = '$msg'") or die('Erreur');

    if(mysqli_num_rows($select_message) > 0){
        echo 'Oops.. Votre message à déjà été envoyé';
    }else{
        mysqli_query($bdd, "INSERT INTO `message` (nom, email, num, message) VALUE ('$nom', '$email', '$num', '$msg')") or die('Erreur');
        echo 'Merci ! Votre message à bien été envoyé !';
    }
}


?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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

    <!-- CONTACT STARTS -->

        <section class="contact">
            <h2>Contact</h2>

            <form action="" method="post">

            <p>Envoyer nous un message !</p>

                <div class="genre">
                    <div class="monsieur">
                        <input type="radio" name="genre" required>
                        <label for="madame">Monsieur</label>
                    </div>

                    <div class="madame">
                        <input type="radio" name="genre" required>
                        <label for="madame">Madame</label>
                    </div>
                </div>

                <input type="text" name="contact_nom" placeholder="Votre Nom" required>
                <input type="text" name="contact_email" placeholder="Votre Email" required>
                <input type="num" name="contact_num" min="10" placeholder="Votre Numéro de téléphone (optionnelle)">

                <textarea name="contact_msg" id="" cols="30" rows="10" placeholder="Votre message" required></textarea>

                <div class="confi-container">
                    <input type="checkbox" name="" id="" required>
                    <label class="confi" for="">En soumettant ce formulaire, j'accepte que mes informations soient utilisées uniquement dans le cadre de ma demande et de la relation commerciale éthique et personnalisée qui peut en découler.</label>
                </div>

                <input type="submit" value="Envoyer" name="contact_submit">
            </form>

        </section>

    <!-- CONTACT END -->

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