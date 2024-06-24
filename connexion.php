<?php
include "BDDconnexion.php";
session_start();

if(isset($_POST["bout_connexion"])){
    $email = $_POST["email"];
    $mdpSaisi = $_POST["mdp"];
    $req = "SELECT id_utilisateur, mdp, nom, prenom 
    FROM utilisateur WHERE email='$email'";;
    $res = mysqli_query($id, $req);
    $ligne = mysqli_fetch_assoc($res);
    if(mysqli_num_rows($res) > 0){
        if(password_verify($mdpSaisi, $ligne['mdp'])){
            $_SESSION["email"] = $email;
            $_SESSION["nom"] = $ligne["nom"];
            $_SESSION["prenom"] = $ligne["prenom"];
            $_SESSION["id_utilisateur"]=$ligne["id_utilisateur"];

             // Récupérer id_client
             $id_utilisateur = $ligne["id_utilisateur"];
             $req_client = "SELECT id_client FROM client WHERE id_client = '$id_utilisateur'";
             $res_client = mysqli_query($id, $req_client);
             $ligne_client = mysqli_fetch_assoc($res_client);
             $_SESSION["id_client"] = $ligne_client["id_client"];

            header("location:index.php");
            $redirectionConnexion =  "<p class='pAlerteredirectionConnexion'> Bienvenue </p>";
        } else {
            $erreur =  "<p class='pAlerteErreur'> Identifiants incorrects </p>";
        }
    } else {
        $erreur =  "<p class='pAlerteErreur'> Identifiants incorrects </p>";
    }
}

if(isset($_POST["bout_inscription"])){
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $mdp_hache = password_hash($mdp, PASSWORD_DEFAULT);
    
    $_SESSION["prenom"] = $prenom;

    $req = "INSERT INTO utilisateur (nom, prenom, telephone, email, mdp, type_utilisateur) 
            VALUES ('$nom', '$prenom', null, '$email', '$mdp_hache', 'client')";
    mysqli_query($id, $req);

    // Récupérer id_utilisateur et l'insérer dans la table client
    $id_utilisateur = mysqli_insert_id($id);
    $date_inscription = date('Y-m-d H:i:s'); // Récupère la date et l'heure actuelle au format MySQL

    $req_client = "INSERT INTO client (id_client, date_inscription) 
                VALUES ('$id_utilisateur', '$date_inscription')";

    mysqli_query($id, $req_client);

 
     $_SESSION["id_utilisateur"] = $id_utilisateur;
     $_SESSION["id_client"] = $id_utilisateur;
     
    $redirection= "<p class='pAlerteRedirection'>Inscription validée, bienvenue $prenom!</p>";
    header("refresh:2;url=index.php");
    exit; 
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="connexion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
<section>
    <div class="divLogo"><img class="logo" src="images/logo.jpg" alt="logo"></div>
    <div class="wrapper">
        <div class="card-switch">
            <label class="switch">
                <input type="checkbox" class="toggle">
                <span class="designToggle"></span>
                <span class="card-side"></span>
                <div class="flip-card__inner">

                    <div class="flip-card__front">
                        <div class="title">Se connecter</div>
                        <!-- Form connexion -->
                        <form action="connexion.php" method="post">
                            <input class="input" name="email" placeholder="Email" type="email">
                            <input class="input" name="mdp" placeholder="Mot de passe" type="password">
                            <input class="formBTN" type="submit" value="Se connecter" name="bout_connexion">
                            <?php if(isset($erreur)) echo $erreur;?>
                            <?php if(isset($redirection)) echo $redirection;?>
                        </form>
                    </div>

                    <div class="flip-card__back">
                        <div class="title">S'inscrire</div>
                        <!-- Form inscription -->
                        <form action="connexion.php" method="post">
                            <input class="input" name="nom" placeholder="Nom" type="text" required>
                            <input class="input" name="prenom" placeholder="Prénom" type="text" required>
                            <input class="input" name="email" placeholder="Email" type="email" required>
                            <input class="input" name="mdp" placeholder="Mot de passe" type="password" required>
                            <input class="formBTN" type="submit" value="Valider" name="bout_inscription">
                            <?php if(isset($redirection)) echo $erreur;?>
                        </form>
                    </div>
                    
                </div>
            </label>
        </div>   
    </div>
</section>
<div class="divRetourSite">
    <a href="index.php"><img class="iconeFleche" src="images/retour.png" alt="icone_fleche"></a>
    <a href="index.php">Retour au site</a>
</div>
</body>
</html>
