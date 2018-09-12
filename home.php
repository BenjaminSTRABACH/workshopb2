<?php
// include 'bootstrap.php';
include_once 'Config.php';
$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
if (isset($_GET['search'])){
    $search = $_GET['search'];
} else {
    $search = "";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="page_home.css" rel="stylesheet" type="text/css"/>
    <title>Home</title>
</head>

<body>
<!-- <div id="fond_ecran" class="fond_ecran"></div> -->
    <div class="fg">
        <div class="home_header">
            <div class="user_info">
                <img class="profile_pict_small" src="medias/user.jpg">
                <p class="profile_name">Benjamin STRABACH</p>
            </div>
            <form class="searchbar" action="home.php" method="get">
                <select class="search-bar" type="text" name="search" placeholder="Catégorie">
                    <option value="">- Catégorie -</option>
                    <option value="Pizza">Pizza</option>
                    <option value="Kebab">Kebab</option>
                </select>
                <input class="search-btn" type="submit" value="Rechercher"> <!-- Bouton de recherche -->
            </form>
            <div class="disconnect">
                <input class="disconnect-btn" type="button" value="Déconnexion">
            </div>
        </div>

        <?php 
        if($search != ""){
            $sql = $db->prepare("SELECT `Nom`, `Adresse`, `Code_Postal`, `Ville`, `LabelC` FROM `resto` 
                                 JOIN `categories` ON resto.idC = categories.idC WHERE categories.LabelC='$search'");
        } else {
            $sql = $db->prepare("SELECT `Nom`, `Adresse`, `Code_Postal`, `Ville`, `LabelC` FROM `resto` 
                                 JOIN `categories` ON resto.idC = categories.idC");
        }
        // $sql = $db->prepare("SELECT `Nom`, `Adresse`, `Code_Postal`, `Ville`, `LabelC` FROM `resto` 
        //                      JOIN `categories` ON resto.idC = categories.idC");
        $sql->execute();
        $result = $sql->fetchAll();
        ?>

        <div class="search_list">
            <?php 
            for ($i = 0; $i < count($result); $i++) {
                $address = $result[$i][1] . ", " . $result[$i][2] . " " . $result[$i][3];
                ?> 
                <div class="list"> 
                    <strong class="place_name"> <?php echo($result[$i][0]) ?></strong>
                    <p class="place_address"><?php echo($address)?></p>
                    <div class="category">
                        <img class="category_pict" src="medias/logo_category.png">
                        <p class="category_text"><?php echo($result[$i][4])?></p>
                    </div>
                    <div class="token_score">
                    <p class="token_score_text">324</p>
                    </div>
                </div>
                <?php
            }

            ?>
        </div>
    </div>

</body>

<!--        <div class="list">
                <strong class="place_name">Nom restaurant</strong>
                <p class="place_address">Adresse</p>
                <div class="category">
                    <img class="category_pict" src="medias/logo_category.png">
                    <p class="category_text">Vegan</p>
                </div>
                <div class="token_score">
                    
                </div>
            </div> -->