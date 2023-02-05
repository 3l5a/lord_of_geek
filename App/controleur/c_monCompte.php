<?php

include 'App/modele/M_Utilisateur.php';
include 'App/modele/M_Session.php';

switch ($action) {
    case 'connecter':
        $email = filter_input(INPUT_POST, 'email');
        $mdp = filter_input(INPUT_POST, 'mdp');
        $user = M_Utilisateur::findUser($email, $mdp);

        if ($user === true) {
            $_SESSION['client'] = $client;
        } else {
            afficheMessage("Vous devez entrer les bon identifiants ou vous créer un compte");
        }
        break;
    case 'signOut':
        M_Session::signOut();
        break;
    case 'signUp':
        $email = filter_input(INPUT_POST, 'email');
        $mdp = filter_input(INPUT_POST, 'mdp');
        $nom = filter_input(INPUT_POST, 'nom');
        $prenom = filter_input(INPUT_POST, 'prenom');
        $rue = filter_input(INPUT_POST, 'rue');
        $cp = filter_input(INPUT_POST, 'cp');
        $ville = filter_input(INPUT_POST, 'ville');

        $user = M_Utilisateur::findUser($email, $mdp);
        if ($user > 0) {
            echo "Bienvenue $nom $prenom";
        } else {
            $inscription = M_Utilisateur::signUp($nom, $prenom, $adresse, $cp, $ville, $email, $mdp);
            echo "Vous êtes bien inscrit";
        }
        break;
}
