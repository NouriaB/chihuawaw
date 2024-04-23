<link rel="stylesheet" href="header.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">

<header>

    <ul class="bandeauLivraison">
        <li><img src="images/navbar/iconeFDP" class="iconeBandeau" alt="">Livraison offerte dès 59 €</li>
        <li><img src="images/navbar/iconeLivraison" class="iconeBandeau" alt="">Point Relais ou à domicile</li>
        <li><img src="images/navbar/iconeRetour" class="iconeBandeau" alt="">Retour gratuit sous 30 jours</li>
    </ul>

    <div class="mainContainer">
        <!-- Loupe -->
        <div class="container-input">
            <input type="text" placeholder="Search" name="text" class="input">
            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
            </svg>
        </div>
        <!-- Logo -->
        <div class="divLogo"><a href="index.php"><img src="images/logo.jpg" alt="" class="logo"></a></div>
        <!-- Nav icone -->
        <nav>
            <ul class="ulNav">
                <div class="divFavoris" onclick="location.href='favoris.php';" style="cursor: pointer;">
                    <li class="iconeNav"></li>
                    <li><a href="favoris.php">Favoris</a></li>
                </div>
                <div class="divCompte" onclick="location.href='connexion.php';" style="cursor: pointer;">
                    <li class="iconeNav"></li>
                    <li><a href="connexion.php">Compte</a></li>
                </div>
                <div class="divPanier" onclick="location.href='panier.php';" style="cursor: pointer;">
                    <li class="iconeNav"></a></li>
                    <li><a href="panier.php">Panier</a></li>
                </div>
            </ul>
        </nav>

    </div>
        
    <ul class="ulProduits">
        <li><a href="">Voir tous les produits</a></li>
        <li><a href="">T-shirts</a></li>
        <li><a href="">Pulls</a></li>
        <li><a href="">Sweatshirts</a></li>
        <li><a href="">Robes</a></li>
        <li><a href="">Manteaux</a></li>
    </ul>
    
</header>