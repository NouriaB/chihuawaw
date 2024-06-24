<link rel="stylesheet" href="header.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">

<?php session_start();?>

<header>

    <div class="mainContainer">

        <!-- Logo -->
        <div class="divLogo"><a href="index.php"><img src="images/logo.jpg" alt="" class="logo"></a></div>
        
        <!-- Loupe -->
        <div class="containerLoupe">
            <form id="searchForm"method="GET" action="recherche.php">
                <input type="text" placeholder="Rechercher..." name="recherche" class="inputLoupe">
                <!-- <button type="submit"> -->
                    <svg id="submitSvg" fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                        <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
                    </svg>
                <!-- </button> -->
            </form>
        </div>
       
        <!-- div icones -->
            
        <div class="divIcones">
            <div class="divFavoris" onclick="location.href='favoris.php';" style="cursor: pointer;">
                <div class="icone"></div>
                <a href="favoris.php">Favoris</a>
            </div>
            <div class="divCompte">
                <a href="<?php echo isset($_SESSION["prenom"]) ? "profil.php" : "connexion.php"; ?>" style="cursor: pointer;">
                    <div class="icone"></div>
                    <?php if(isset($_SESSION["prenom"])) : ?>
                        <span><?php echo $_SESSION["prenom"]; ?></span>
                    <?php else : ?>
                        <span>Compte</span>
                    <?php endif; ?>
                </a>
            </div>
            <div class="divPanier" onclick="location.href='panier.php';" style="cursor: pointer;">
                <div class="icone"></div>
                <a href="panier.php">Panier</a>
            </div>
            <?php if(isset($_SESSION['prenom'])) : ?>
                <div class="divDeconnexion" onclick="location.href='deconnexion.php';" style="cursor: pointer;">
                    <div class="icone"></div>
                    <a href="deconnexion.php">Déconnexion</a>
                </div>
            <?php endif; ?>
        </div>


    </div>
        
    <!-- <hr> -->

    <nav>
        <ul class="ulNav">
            <li><a href="produits.php">Voir tous les produits</a></li>
            <li><a href="tshirts.php">T-shirts</a></li>
            <li><a href="pulls.php">Pulls</a></li>
            <li><a href="sweatshirts.php">Sweatshirts</a></li>
            <li><a href="robes.php">Robes</a></li>
            <li><a href="manteaux.php">Manteaux</a></li>
        </ul>
    </nav>
    
</header>

<script>
    document.getElementById('submitSvg').addEventListener('click', function() {
        document.getElementById('searchForm').submit();
    });
</script>