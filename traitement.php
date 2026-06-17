<!-- Ouverture de notre balise PHP -->
<?php

// fonction de nettoyage
function nettoyer($donnee) {
    return htmlspecialchars(stripslashes(trim($donnee)));
}

// Liaison entre le PHP et le serveur MySQL
// localhost car nous sommes en local et utilisateurs car c'est le nom de notre base
$dsn = 'mysql:host=localhost;dbname=utilisateurs;charset=utf8';
// User root car c'est le nom par défaut
$user = 'root';
// Mot de passe vide par défaut
$pass = '';
try {
    // Essaie de se connecter à la base MySQL
    $cnx = new PDO($dsn, $user, $pass);
    // Sinon, attrape l'erreur et renvoie le message « Une erreur est survenue »
} catch (PDOException $e) {
    echo 'Une erreur est survenue !';
}



// Si le bouton a été cliqué
if(isset($_POST['envoyer'])){
    // Stockage dans des variables
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $avis = $_POST['avis'];
    $commentaire = $_POST['commentaire'];
    //nettoyage des variables.
    $nom = nettoyer($nom);
    $prenom = nettoyer($prenom);
    $age = nettoyer($age);
    $email = nettoyer($email);
    $avis = nettoyer($avis);
    $commentaire = nettoyer($commentaire);
    

    // prepare à l'envoie des données et les insers dans notre table users 
    $requete = $cnx->prepare("INSERT INTO users VALUES (0, :nom, :prenom, :age, :email, :avis, :commentaire)");
    // on execute la requete 
    $requete->execute(
        // fait un tableau avec nos variable receuilli :
        array(
            "nom" => $nom,
            "prenom" => $prenom,
            "age" => $age,
            "email" => $email,
            "avis" => $avis,
            "commentaire" => $commentaire,
        )

    );

};


// Nous passons à la partie afin de renvoyer les avis
// Nous allons récupérer le dernier avis de la table
$requete = $cnx->query("SELECT * FROM users ORDER BY id DESC LIMIT 1"); // Ici nous stockons dans requête la sélection de la table users triée par ID descendant et limitée au dernier résultat
$ligne = $requete->fetch(PDO::FETCH_ASSOC); // Nous stockons dans la variable ligne la requête qui récupère une ligne avec fetch
// Affichage des données
if($ligne) {
    echo "<p><strong>" . $ligne['prenom'] . " " . $ligne['nom'] . "</strong> (âge : " . $ligne['age'] . ")<br>";
    echo "Email : " . $ligne['email'] . "<br>";
    echo "Avis : " . $ligne['avis'] . "<br>";
    echo "Commentaire : " . $ligne['commentaire'] . "</p>";
}


?>
