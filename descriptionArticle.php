<?php
include "BDDconnexion.php";
include "header.php";

if (isset($_GET['id_produit'])) {
    $id_produit = $_GET['id_produit'];

    // Requête pour récupérer les détails du produit
    $query = "SELECT * FROM Produit WHERE id_produit = $id_produit";
    $result = mysqli_query($id, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Description du Produit</title>
            <link rel="stylesheet" href="descriptionArticle.css">
        </head>
        <body class="body">

        <div class="container">
            <h2><?php echo $row['nom_produit']; ?></h2>
            <div class="product-details">
                <div class="product-images">
                    <img class="image front-image" src="images/vetements/<?php echo $row['image_front']; ?>" alt="Image avant du produit">
                    <img class="image back-image" src="images/vetements/<?php echo $row['image_back']; ?>" alt="Image arrière du produit">
                </div>
                <div class="product-info">
                    <p><strong>Couleur :</strong> <?php echo $row['couleur']; ?></p>
                    <p><strong>Description :</strong> <?php echo $row['description']; ?></p>
                    <p><strong>Prix :</strong> <?php echo $row['prix']; ?> €</p>
                </div>
            </div>
        </div>

        </body>
        </html>
        <?php
    } else {
        echo "<p>Aucun produit trouvé avec cet identifiant.</p>";
    }

    mysqli_close($id);
} else {
    echo "<p>Identifiant du produit non spécifié.</p>";
}
?>
