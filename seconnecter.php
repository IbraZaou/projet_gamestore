<?php
        include('_config.php');
        session_start() ;
        
        if(isset($_POST['envoi'])){

            $pseudo = mysqli_real_escape_string($bdd, $_POST['pseudo']);
            $mdp = mysqli_real_escape_string($bdd, sha1($_POST['mdp']));
            $select_users = mysqli_query($bdd, "SELECT * FROM `users` WHERE pseudo = '$pseudo' and mdp = '$mdp'");

            if(mysqli_num_rows($select_users) > 0){

                if($select_users == 1) {

                    // Afficher le pseudo et l'email de l'utilisateur
                    $_SESSION['pseudo'] = $pseudo;
                    header('location:connected.php');
                } 

                
            }else{  
                echo 'Oops ! Pseudo ou Mot de passe incorrect!';
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

    <div class="container-connection">
        <div class="connection">

        <h1>Connexion</h1>

            <form action="" method="post">
                <input type="text" name="pseudo" placeholder="Pseudo" autocomplete='off'>
                <input type="password" name="mdp" placeholder="Mot de passe">
                <input type="submit" value="Entrer" name="envoi">
            </form>
            <p>Vous n'avez pas de compte? inscrivez-vous <a href="inscription.php"> ici </a> </p>
        </div>
    </div>

    <?php
        include('include/_footer.php');
    ?>

</body>
</html>