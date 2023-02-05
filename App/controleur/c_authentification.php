<?php

include 'App/modele/M_Exemplaire.php';
include 'App/modele/M_Utilisateur.php';


/**
 * Controleur pour l'inscription ou la connexion de l'utilisateur
 */
switch($action)
{
    case 'signIn':
        $email = filter_input(INPUT_POST, 'email');
        $mdp = filter_input(INPUT_POST, 'mdp');
        $user = M_Utilisateur::findUser($email, $mdp);

        if ($user === true) {
            $_SESSION['client'] = $client;
        } else {
            afficheMessage("Vous devez entrer les bon identifiants ou vous créer un compte");
        }
    case 'signUp':
        $email = filter_input(INPUT_POST, 'emailInscr');
        $mdp = filter_input(INPUT_POST, 'mdpInscr');
        $nom = filter_input(INPUT_POST, 'nom');
        $prenom = filter_input(INPUT_POST, 'prenom');
        $rue = filter_input(INPUT_POST, 'rue');
        $cp = filter_input(INPUT_POST, 'cp');
        $ville = filter_input(INPUT_POST, 'ville');

        $user = M_Utilisateur::findUser($email, $mdp);
        if ($user) {
            echo "Bienvenue chez nous $nom $prenom";
        } else {
            $inscription = M_Utilisateur::signUp($nom, $prenom, $adresse, $cp, $ville, $email, $mdp);
            header('Location: index.php?uc=compte&action=sInscrire');
        }
        break;
}