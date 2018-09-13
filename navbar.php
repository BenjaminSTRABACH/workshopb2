<link href="navbar.css" rel="stylesheet" type="text/css"/>
<div class="header">
    <div class="user_info">
        <img class="profile_pict_small" src="medias/user.jpg">
        <p class="profile_name">Benjamin STRABACH</p>
    </div>
    <form class="searchbar" action="home.php" method="get">
        <input class="search-place" type="text" name="place" placeholder="Ville">
        <select class="search-category" name="category" placeholder="Catégorie">
            <option value="">- Catégorie -</option>
            <option value="Pizza">Pizza</option>
            <option value="Kebab">Kebab</option>
        </select>
        <input class="search-btn" type="submit" value="Rechercher"> <!-- Bouton de recherche -->
    </form>
    <div class="disconnect">
        <a href="home.php"><img class="home-btn" src="medias/home.png"></a>
        <img class="disconnect-btn" src="medias/sign_out.png">
        <!-- <input class="disconnect-btn" type="button" value="Déconnexion"> -->
    </div>
</div>