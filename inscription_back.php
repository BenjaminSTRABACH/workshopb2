<?php

include_once 'config.php';

if (!empty($_POST['nom']) && !empty($_POST['prenom'])) {
  //  $db = new PDO('mysql:host=localhost;port=3306;dbname=astiweb', 'root', '');
    $db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE, Config::UTILISATEUR, Config::MOTDEPASSE);

    $passe = $_POST['password'];
    $passe1 = $_POST['password_confirmation'];

    if ($passe == $passe1) {
        $email = $_POST['email'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

        $passe = password_hash($_POST['password'], PASSWORD_DEFAULT);

        
        $creation = $db->prepare("INSERT INTO `user`(`LastName`, `FirstName`, `Mail`, `password`) VALUES (:nom, :prenom, :mail , :password)");
        $creation->bindParam(':nom', $nom);
        $creation->bindParam(':prenom', $prenom);
        $creation->bindParam(':mail', $email);
        $creation->bindParam(':password', $passe);
        $creation->execute();
   echo "\nPDO::errorInfo():\n";
   print_r($creation->errorInfo());
       var_dump($creation);
        $resultat = $creation->fetch();

        
       // header('Location: page_accueil.php');
    }
}
    else {
        echo 'Les deux mots de passe que vous avez rentrés ne correspondent pas…';
    }
