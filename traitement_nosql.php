<?php
//chargement des blibliothèques
require_once 'vendor/autoload.php';

// Connexion à MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");

// Sélection de la base de données et de la collection
// MongoDB crée automatiquement la base et la collection si elles n'existent pas
//cela fonctionne un peux comme les dossier d'un ordinateur
//Utilisation des accolades nécessaire à cause du tiret
$collection = $client->{'mon-site'}->avis;

// Si le bouton a été cliqué
if(isset($_POST['envoyer'])){

    // Stockage dans des variables
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $avis = $_POST['avis'];
    $commentaire = $_POST['commentaire'];

    // Nettoyage des données
    $nom = nettoyer($nom);
    $prenom = nettoyer($prenom);
    $age = nettoyer($age);
    $email = nettoyer($email);
    $avis = nettoyer($avis);
    $commentaire = nettoyer($commentaire);

    // Insertion du document dans la collection MongoDB
    // Contrairement à MySQL, pas besoin d'id les id sont générés automatiquement par djongo
    $collection->insertOne([
        "nom" => $nom,
        "prenom" => $prenom,
        "age" => $age,
        "email" => $email,
        "avis" => $avis,
        "commentaire" => $commentaire
    ]);
}

// Récupère le dernier document inséré
// _id joue le rôle de l'id auto-incrémenté de MySQL
$document = $collection->findOne([], ['sort' => ['_id' => -1]]);

// Affichage du dernier avis
if($document) {
    echo "<p><strong>" . $document['prenom'] . " " . $document['nom'] . "</strong> (âge : " . $document['age'] . ")<br>";
    echo "Email : " . $document['email'] . "<br>";
    echo "Avis : " . $document['avis'] . "<br>";
    echo "Commentaire : " . $document['commentaire'] . "</p>";
}

// Fonction de nettoyage
function nettoyer($donnee) {
    return htmlspecialchars(stripslashes(trim($donnee)));
}

?>