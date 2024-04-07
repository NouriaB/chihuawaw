<?php
include "BDDconnexion.php";
session_start();

if(isset($_POST["bout"])){
    $mail = $_POST["email"];
    $mdpsaisi = $_POST["mdp"];
    $req = "SELECT * FROM user WHERE mail='$mail'";
    $res = mysqli_query($id, $req);
    $ligne = mysqli_fetch_assoc($res);

    if ($ligne && password_verify($mdpsaisi, $ligne['mdp'])) {
        $_SESSION["mail"] = $mail;
        $_SESSION["nom"] = $ligne["nom"];
        $_SESSION["prenom"] = $ligne["prenom"];
        $_SESSION["idu"]=$ligne["idu"];
        header("location:home.php");
    } else {
        $erreur =  "<h4> Mot de passe incorrect ! </h4>";
    }
}
?>

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
                    <form action="" method="post">
                        <input class="input" name="email" placeholder="Email" type="email">
                        <input class="input" name="password" placeholder="Mot de passe" type="password">
                        <button class="formBTN">Se connecter</button>
                    </form>

                </div>

                <div class="flip-card__back">
                    <div class="title">S'inscrire</div>
                    <!-- Form inscription -->
                    <form action="" method="post">
                        <input class="input" placeholder="Nom" type="text">
                        <input class="input" placeholder="Prénom" type="text">
                        <input class="input" name="email" placeholder="Email" type="email">
                        <input class="input" name="password" placeholder="Mot de passe" type="password">
                        <button class="formBTN">Valider</button>
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

<?php include 'footer.php'; ?> 


</body>
</html>
