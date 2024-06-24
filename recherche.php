<?php 
    include 'header.php';
    include "BDDconnexion.php";
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
    <link rel="stylesheet" href="produits.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>
    
<body class="body">
    

<section>
<?php
if (isset($_GET['recherche'])) {
    $laRecherche = $_GET['recherche'];
    $query = "SELECT * FROM produit WHERE nom_produit LIKE '%$laRecherche%' OR couleur LIKE '%$laRecherche%'";
    $result = mysqli_query($id, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <p class="pInfos">Résultats pour la recherche "<?php echo isset($_GET['recherche']) ? htmlspecialchars($_GET['recherche']) : ''; ?>" :</p>
            <div class="carte">
                <img class="image" src="images/vetements/<?php echo $row['image_front'] ?>" alt="<?php echo $row['nom_produit']; ?>" 
                    onmouseover="this.src='images/vetements/<?php echo $row['image_back']; ?>'"
                    onmouseout="this.src='images/vetements/<?php echo $row['image_front']; ?>'">
                <p class="titreArticle"><?php echo $row['nom_produit']; ?></p>
                <div class="divInfosArticle">
                    <p><?php echo $row['prix']; ?> €</p>
                    <img class="iconeAjouterPanier" src="images/ajouter_panier.png" alt="Ajouter au panier">
                </div>
                <a class="BTNdescription" href="descriptionArticle.php">Description</a>
            </div>
        <?php
        }
    } else {
        echo "<div class='pInfos'> Aucun résultat trouvé pour \"" . htmlspecialchars($laRecherche) . "\"</div>";
    }

    mysqli_close($id);
}
?>
</section>

<?php include 'footer.php'; ?>


</body>
</html>

