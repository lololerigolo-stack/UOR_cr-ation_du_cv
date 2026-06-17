<!DOCTYPE html>
<html lang="fr"> <!-- Langue française -->
<head>
    <meta charset="UTF-8"> <!-- Permet d'utiliser les accents, ç ... -->
    <meta name="viewport" content="width=device-width, initial-scale=1" /> <!-- Balise pour le responsive -->
    <meta name="description" content="Author: Logan TRACHEZ, Category: CV, Subject: Informatique, University: Paris 8, Location: Ville-Saint-Jacques">
    <meta name="author" content="Logan TRACHEZ">
    <meta name="keywords" content="CV, Logan TRACHEZ, informatique, Paris 8">
    <title>Formulaire_avis</title>
    <link rel="stylesheet" href="style.css"> <!-- Lien CSS -->
</head>
<body class="mon_formulaire">
    <!-- Barre de navigation -->
    <nav class="navbar"> <!-- Création de la classe navbar pour le CSS -->
        <div class="logo"> <img class="logo-image" src="images/logo site.png" alt="logo site"></div> <!-- La div pour mettre un logo sur notre site -->
            <ul class="nav-links"> <!-- Les différentes pages de navigation -->
                <a href="sport_combat.html">Sport de combat</a>
                <a href="velo.html">Vélo</a>
                <a href="natation.html">Natation</a>
                <a href="Mon_cv.html">Mon CV</a>
                <a href="musculation.html">Musculation</a>
            </ul>
    </nav>
    <!-- Formulaire -->
    <!-- Un formulaire est toujours entouré d'une balise form -->
    <!-- Ensuite on rajoute une balise label et une balise input qui correspondent à l'étiquette et au champ -->
     <!-- Pour le 5.1 changer dans action par traitement.php -->
    <form action="traitement_nosql.php" method="POST" class="form">
    <!-- Nous avons choisi la méthode POST car avec un formulaire nous devons envoyer des données -->
        <!-- Ici nous devons entrer ce que l'utilisateur va voir -->
         <!-- le name est très important car c'est lui qui nous permettera de récuperer les informations -->
        <label for="prenom">Entrez votre prénom</label>
        <!-- C'est un champ de type text et nous avons rajouté required afin qu'il soit obligatoire -->
        <input type="text" name="prenom" id="prenom" required>
        <br>
        <label for="nom">Entrez votre nom</label>
        <input type="text" name="nom" id="nom" required>
        <br>
        <!-- Nous allons demander l'âge -->
        <label for="age">Quel est votre âge</label>
        <input type="number" name="age" min="1" max="120" required>
        <br>
        <!-- Pour l'email -->
        <label for="email">Quelle est votre adresse mail</label>
        <input type="email" name="email" id="email">
        <br>
        <!-- Un bouton radio -->
        <p>Avez-vous aimé ce site ?</p>
        <p>
        <input type="radio" name="avis" value="oui" required> Oui
        <input type="radio" name="avis" value="non" required> Non
        </p>
        <!-- Permet de laisser un commentaire -->
        <p>Laissez un commentaire :</p>
        <p><textarea name="commentaire" rows="5" cols="40" placeholder="Laissez un commentaire ici"></textarea></p>
        <!-- Permet d'envoyer les données -->
        <p><input type="submit" value="Envoyer" name="envoyer"></p>
    </form>
</body>
</html>