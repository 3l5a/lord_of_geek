<?php

include 'App/modele/M_Utilisateur.php';
include 'App/modele/M_Session.php';

/**
 * controleur pour l'accès au compte personnel de l'utilisateur
 */
switch ($action) {
    case 'signedUp':
        if(!$_SESSION['client'])
        {
            header('Location: index.php?uc=accueil&action=voirTousLesJeux');
        } else {
            $email = filter_input(INPUT_POST, 'email');
            $mdp = filter_input(INPUT_POST, 'mdp');
            M_Utilisateur::findUser($email, $mdp);
        };
    case 'signOut':
        M_Session::signOut();
        header('Location: index.php?uc=accueil&action=voirTousLesJeux');
        break;
}
