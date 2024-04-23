<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <link rel="stylesheet" href="produits.css">

    <?php include 'header.php';  
    include "BDDconnexion.php";
    $sql = "SELECT * FROM produit";
    $result = mysqli_query($id, $sql);
    ?>
</head>
<body>

    <section> 

    <?php
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="carte">
                <img class="image" src="images/vetements/<?php echo $row['image_front'] ?>" alt="" 
                onmouseover="this.src='images/vetements/<?php echo $row['image_back']; ?>'"
                onmouseout="this.src='images/vetements/<?php echo $row['image_front']; ?>'">
                <p class="titreArticle"><?php echo $row['nom_produit']; ?></p>
                <div class="divInfosArticle">
                    <p><?php echo $row['prix']; ?> €</p>
                    <p>Logo</p>
                </div>
                <button class="BTNdescription">Description</button>
            </div>
            <?php
        }
    } else {
        echo "Aucun produit trouvé.";
    }
    ?>
    
    </section>

    <?php include 'footer.php';?>

    
</body>
</html>