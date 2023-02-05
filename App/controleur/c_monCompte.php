<?php

include 'App/modele/M_Utilisateur.php';
include 'App/modele/M_Session.php';

/**
 * controleur pour l'accès au compte personnel de l'utilisateur
 */
switch ($action) {
    case 'profil':
        if(!$_SESSION['client'])
        {
            header('Location: index.php');
        };
    case 'signOut':
        M_Session::signOut();
        header('Location: index.php');
        break;
}
