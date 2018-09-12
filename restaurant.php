<!--<!DOCTYPE html>
<?php
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
        <!--        <link href="restaurant.css" rel="stylesheet" type="text/css"/>-->
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
                <p class="profile_name"><?php echo $prenom . " " . $nom ?></p>
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
            <div class="item">
                <i class="marker icon"></i>
                <div class="content">
                    <?php
                    $sqa = $db->prepare("SELECT COUNT(*) FROM avis where idU=$idU & idR=$idR");
                    $sqa->execute();
                    $tokken = $sqa->fetch();
                    if ($tokken[0] < 1) {
                        ?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Tokken +1
                        </button>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un commentaire (facultatif)</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form  action="CreationPost.php?idU=<?php echo $idU ?>&idR=<?php echo $idR ?>" method="post">

                                            <div id="objet" class="form-group">

                                                <label for="Commentaire">Commentaire</label>

                                                <input type="text" class="form-control" name="Commentaire">
                                                <!-- <div class="form-group">
                                                                      <label for="inputdefault">Nom</label>
                                                                      <input type='text' name='Nom' required placeholder="Votre nom d'utilisateur">-->
                                            </div>
                                            <div id="boutonform">
                                                <input class="btn btn-outline-secondary" type="submit" value="Envoyer">
                                            </div>

                                        </form>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Vegan
            </div>
            <div class="col-md-1">
                <?php
                $sql2 = $db->prepare("SELECT vegan from resto where idR='1'");
                $sql2->bindParam(':idresto', $idR);
                $sql2->execute();
                $resultat2 = $sql2->fetch();
                if ($resultat2['vegan'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat2['vegan'] == '0'){
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
<!--                <i class="fas fa-check fa-lg" style="color:green;" ></i>-->
            </div>
            <div class="col-md-2">
                	Air Conditionné
            </div>
            <div class="col-md-1">
                <?php
                $sql3 = $db->prepare("SELECT air from resto where idR='1'");
                $sql3->bindParam(':idresto', $idR);
                $sql3->execute();
                $resultat3 = $sql3->fetch();
                if ($resultat3['air'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat3['air'] == '0'){
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Parking
            </div>
            <div class="col-md-1">
                <?php
                $sql4 = $db->prepare("SELECT parking from resto where idR='1'");
                $sql4->bindParam(':idresto', $idR);
                $sql4->execute();
                $resultat4 = $sql4->fetch();
                if ($resultat4['parking'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat4['parking'] == '0'){
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-2">
                Sans Gluten
            </div>
            <div class="col-md-1">
                <?php
                $sql5 = $db->prepare("SELECT gluten from resto where idR='1'");
                $sql5->bindParam(':idresto', $idR);
                $sql5->execute();
                $resultat5 = $sql5->fetch();
                if ($resultat5['gluten'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat5['gluten'] == '0'){
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                Accesibilité Handicapé
            </div>
            <div class="col-md-1">
                <?php
                $sql6 = $db->prepare("SELECT handicap from resto where idR='1'");
                $sql6->bindParam(':idresto', $idR);
                $sql6->execute();
                $resultat6 = $sql6->fetch();
                if ($resultat6['handicap'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat6['handicap'] == '0'){
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-2">
                Plats BIO
            </div>
            <div class="col-md-1">
                 <?php
                $sql7 = $db->prepare("SELECT bio from resto where idR='1'");
                $sql7->bindParam(':idresto', $idR);
                $sql7->execute();
                $resultat7 = $sql7->fetch();
                if ($resultat7['bio'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat7['bio'] == '0'){
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                Terrasse
            </div>
            <div class="col-md-1">
                 <?php
                $sql8 = $db->prepare("SELECT terrasse from resto where idR='1'");
                $sql8->bindParam(':idresto', $idR);
                $sql8->execute();
                $resultat8 = $sql8->fetch();
                if ($resultat8['terrasse'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat8['terrasse'] == '0'){
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-2">
                Menu enfants
            </div>
            <div class="col-md-1">
                 <?php
                $sql9 = $db->prepare("SELECT enfant from resto where idR='1'");
                $sql9->bindParam(':idresto', $idR);
                $sql9->execute();
                $resultat9 = $sql9->fetch();
                if ($resultat9['enfant'] == '1') {
                    ?>
                    <i class="fas fa-check fa-lg" style="color:green;" ></i>
                    <?php
                } else if ($resultat9['enfant'] == '0'){
                    ?>
                    <i class="fas  fa-times fa-lg" style="color:red;"></i>
                    <?php
                }
                ?>
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


$requete = $db->prepare('SELECT idU, Avis, idTokken FROM avis WHERE idR=:id_restaurant');
$requete->bindParam(':id_restaurant', $idR);
$requete->execute();
while ($donnees = $requete->fetch()) {
    ?>
            <div class="news">
                <p>
            <?php echo htmlspecialchars($donnees['Avis']); ?>
                </p>
            </div>
                    <?php
                }
                ?>
    </body>
</html>