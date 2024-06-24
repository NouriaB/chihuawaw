<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <link rel="stylesheet" href="produits.css">

    <?php 
    include 'header.php';  
    include "BDDconnexion.php";
    $sql = "SELECT * FROM produit";
    $result = mysqli_query($id, $sql);

    // Tableau des favoris de l'utilisateur
    $favoris = [];

    // Si l'utilisateur est connecté, récupérer ses favoris
    if (isset($_SESSION['id_client'])) {
        $id_client = $_SESSION['id_client'];
        $favoris_sql = "SELECT id_produit FROM favori WHERE id_client = '$id_client'";
        $favoris_result = mysqli_query($id, $favoris_sql);

        if ($favoris_result && mysqli_num_rows($favoris_result) > 0) {
            while ($favori_row = mysqli_fetch_assoc($favoris_result)) {
                $favoris[] = $favori_row['id_produit'];
            }
        }
    }
    ?>

</head>

<body class="body">

    <section> 

        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $is_favori = in_array($row['id_produit'], $favoris);
                $icone_favori = $is_favori ? 'favori_rempli.png' : 'favori_vide.png';
                ?>
                <div class="carte">
                    <img class="image" src="images/vetements/<?php echo $row['image_front'] ?>" alt="<?php echo $row['nom_produit'] ?>" 
                        onmouseover="this.src='images/vetements/<?php echo $row['image_back']; ?>'"
                        onmouseout="this.src='images/vetements/<?php echo $row['image_front']; ?>'">

                    <!-- Affichage de l'icône Favori en fonction de l'état -->
                    <?php if (isset($_SESSION['id_client'])): ?>
                        <img class="iconeFavori <?php echo $is_favori ? 'favori_rempli' : ''; ?>" 
                            src="images/<?php echo $icone_favori; ?>" 
                            alt="favori" 
                            data-idproduit="<?php echo $row['id_produit']; ?>">
                    <?php endif; ?>

                    <p class="titreArticle"><?php echo $row['nom_produit']; ?></p>
                    <div class="divInfosArticle">
                        <p><?php echo $row['prix']; ?> €</p>
                        <img class="iconeAjouterPanier" src="images/ajouter_panier.png" alt="Ajouter au panier">
                    </div>
                    <a class="BTNdescription" href="descriptionArticle.php?id_produit=<?php echo $row['id_produit']; ?>">Description</a>
                    <!-- <a class="BTNdescription" href="descriptionArticle.php">Description</a> -->
                </div>
                <?php
            }
        }
        ?>
    </section>
    <?php include 'footer.php'; 
    include 'gestionFavoris.php'?>

</body>
</html>
