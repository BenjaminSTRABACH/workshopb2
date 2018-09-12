<!--<!DOCTYPE html>

<?php
include 'bootstrap.php';
include_once 'Config.php';
$idU = $_GET['idU'];
$idR = $_GET['idR'];
$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);
?>

<html>
    <head>
        <title>PageResto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="row">
            <div class="col-md-1">marge</div>
            <div class="col-md-2">Col1</div>
            <div class="col-md-2">Col3</div>
            <div class="col-md-7">marge</div>
        </div>
    </body>
</html>-->
<!DOCTYPE html>
<html>
    <head>
        <title>PageResto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="restaurant.css" rel="stylesheet" type="text/css"/>
        <?php include_once 'CDN.php'; ?>
        <link href="Navbar.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="home_header">
            <div class="user_info">
                <img class="profile_pict_small" src="medias/user.jpg">
                <?php
                $req = $db->prepare("SELECT `LastName`, `FirstName` FROM `User` WHERE idUser=$idU");
                $req->execute();
                $name = $req->fetchAll();
                $nom = $name[0]['LastName'];
                $prenom = $name[0]['FirstName'];
                ?>
                <p class="profile_name"><?php echo $prenom." ".$nom ?></p>
            </div>
            <div class="searchbar">
                <input class="search_bar" type="text" placeholder="Rechercher">
                <input class="search-btn" type="submit" value="Rechercher">
            </div>
            <div class="disconnect">
                <input class="disconnect-btn" type="button" value="Déconnexion">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <h1>Nom du restaurant</h1>
            </div>
        </div>
        <h1>Nom du restaurant</h1><br>
        <div class="ui horizontal list">
            <div class="item">
                <i class="marker icon"></i>
                <div class="content">
                    Nantes
                </div>
            </div>
            <div class="item">
                <i class="phone icon"></i>
                <div class="content">
                    <a>02 43 25 83 85</a>
                </div>
            </div>
            <div class="item">
                <i class="linkify icon"></i>
                <div class="content">
                    <a href="#">nomdurestaurant.com</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Col1
            </div>
            <div class="col-md-1">
                Col2
            </div>
            <div class="col-md-2">
                Col3
            </div>
            <div class="col-md-1">
                Col4
            </div>
            <div class="6">
                Vide
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                Col1
            </div>
            <div class="col-md-1">
                Col2
            </div>
            <div class="col-md-2">
                Col3
            </div>
            <div class="col-md-1">
                Col4
            </div>
            <div class="6">
                Vide
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                Col1
            </div>
            <div class="col-md-1">
                Col2
            </div>
            <div class="col-md-2">
                Col3
            </div>
            <div class="col-md-1">
                Col4
            </div>
            <div class="6">
                Vide
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                Col1
            </div>
            <div class="col-md-1">
                Col2
            </div>
            <div class="col-md-2">
                Col3
            </div>
            <div class="col-md-1">
                Col4
            </div>
            <div class="6">
                Vide
            </div>
        </div>
        <br>
        <?php
        $sql = $db->prepare("SELECT `Adresse`, `Code_Postal`, `Ville` FROM `resto` WHERE idR=$idR");
        $sql->execute();
        $result = $sql->fetchAll();
        $address = $result[0]['Adresse'] . " " . $result[0]['Code_Postal'] . " " . $result[0]['Ville'];


        //$address = "16 Boulevard Général de Gaulle, 44200 Nantes";
        echo '<iframe width="100%" height="170" frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $address)) . '&z=14&output=embed"></iframe>';
        ?>
    </body>
</html>