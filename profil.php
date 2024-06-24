<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <link rel="stylesheet" href="profil.css">
</head>
<body class="body">

    <?php 
    include 'header.php'; 
    include "BDDconnexion.php";

    $message = '';

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $id_client = $_POST['id_client'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $rue = $_POST['rue'];
        $ville = $_POST['ville'];
        $code_postal = $_POST['code_postal'];

        // Mettre à jour les informations dans la base de données
        $update_query = "UPDATE Utilisateur u
                        JOIN Client c ON u.id_utilisateur = c.id_client
                        SET u.nom = '$nom', u.prenom = '$prenom', u.email = '$email', 
                            u.telephone = '$telephone', c.rue = '$rue', c.ville = '$ville', 
                            c.code_postal = '$code_postal'
                        WHERE u.id_utilisateur = '$id_client'";

        if (mysqli_query($id, $update_query)) {
            $message = "Les informations ont été mises à jour avec succès.";
        } else {
            $message = "Erreur lors de la mise à jour des informations : " . mysqli_error($id);
        }
    }

    // Récupérer et afficher les informations actuelles de l'utilisateur
    if (isset($_SESSION['id_client'])) {
        $id_client = $_SESSION['id_client'];

        $query_client = "SELECT u.id_utilisateur, u.nom, u.prenom, u.email, u.telephone, c.rue, c.ville, c.code_postal 
                        FROM Utilisateur u
                        JOIN Client c ON u.id_utilisateur = c.id_client
                        WHERE u.id_utilisateur = '$id_client'";
        $result_client = mysqli_query($id, $query_client);

        if ($result_client && mysqli_num_rows($result_client) > 0) {
            $row_client = mysqli_fetch_assoc($result_client);
            ?>

            <div class="container">
                <h1>Profil Utilisateur</h1>
                <div class="profil-info">
                    <?php if (!empty($message)) : ?>
                        <p class="messageOk"><?php echo $message; ?></p>
                    <?php endif; ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type="hidden" name="id_client" value="<?php echo $row_client['id_utilisateur']; ?>">

                        <label for="nom">Nom :</label>
                        <input  class="input" type="text" id="nom" name="nom" value="<?php echo $row_client['nom']; ?>" required><br><br>

                        <label for="prenom">Prénom :</label>
                        <input class="input" type="text" id="prenom" name="prenom" value="<?php echo $row_client['prenom']; ?>" required><br><br>

                        <label for="email">Email :</label>
                        <input class="input" type="email" id="email" name="email" value="<?php echo $row_client['email']; ?>" required><br><br>

                        <label for="telephone">Téléphone :</label>
                        <input class="input" type="tel" id="telephone" name="telephone" value="<?php echo $row_client['telephone']; ?>"><br><br>

                        <label for="rue">Adresse :</label>
                        <input class="input" type="text" id="rue" name="rue" value="<?php echo $row_client['rue']; ?>"><br><br>

                        <label for="ville">Ville :</label>
                        <input class="input" type="text" id="ville" name="ville" value="<?php echo $row_client['ville']; ?>"><br><br>

                        <label for="code_postal">Code Postal :</label>
                        <input class="input" type="text" id="code_postal" name="code_postal" value="<?php echo $row_client['code_postal']; ?>"><br><br>

                        <input type="submit" value="Enregistrer les modifications">
                    </form>
                </div>
            </div>

            <?php
        } else {
            echo "<p class='messageErreur'>Erreur: Impossible de récupérer les informations du profil.</p>";
        }

        mysqli_close($id); 
    } else {
        echo "<p class='messageErreur'>Erreur: Utilisateur non connecté.</p>";
    }
    ?>

    <?php include 'footer.php'; ?>

</body>
</html>
