<?php

        session_start();

        include('_config.php');
        
        if(isset($_POST['creer'])){

                //faire en sorte que le pseudo ne contienne pas des caractères pour injecter du code
                //faire en sorte que le mot de passe sois hashé
                $pseudo = mysqli_real_escape_string($bdd, $_POST['pseudo']);
                $email = mysqli_real_escape_string($bdd, $_POST['email']);
                $nom = mysqli_real_escape_string($bdd, $_POST['nom']);
                $mdp = mysqli_real_escape_string($bdd, sha1($_POST['mdp']));

                $select_users = mysqli_query($bdd, "SELECT * FROM `users` WHERE email = '$email'");

                // si l'utilisateur possède la meme adresse mail
                if(mysqli_num_rows($select_users) > 0) {
                    echo("L'utilisateur existe déjà...");
                }else{
                    // Sinon Insertion de l'utilisateur dans la bdd + execution
                    mysqli_query($bdd, "INSERT INTO `users` (nom, email, pseudo, mdp) VALUES ('$nom', '$email', '$pseudo', '$mdp')") or die ('query failed');
                    echo "Votre compte a bien été crée !";
                    header('location:seconnecter.php');
                }
            }
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/ce6abbadbc.js" crossorigin="anonymous"></script>

</head>
<body>

    <?php
        include('include/_header.php');
    ?>

    <div class="container-inscription">
        <div class="inscription">

        <h1>Inscription</h1>

            <form action="" name="utilisateur_type" method="post">
                <input type="text" name="nom" placeholder="Entrez votre nom" autocomplete='off' required>
                <input type="text" name="email" placeholder="Entrez votre email" autocomplete='off' required>
                <input type="text" name="pseudo" placeholder="Entrez un pseudo" autocomplete='off' required>
                <input type="password" name="mdp" placeholder="Entrez un mot de passe" required>
                <input type="submit" value="Créer" name="creer">
            </form>
            <p>Déjà inscrit? connectez-vous<a href="seconnecter.php"> ici </a> </p>
        </div>
    </div>

    <?php
        include('include/_footer.php');
    ?>

</body>
</html>