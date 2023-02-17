<?php

include 'App/modele/M_Utilisateur.php';
include 'App/modele/M_Session.php';

/**
 * controleur pour l'accès au compte personnel de l'utilisateur
 */
switch ($action) {
    case 'signedUp':
        $orders = M_Utilisateur::userOrders($clientSession['id']);
        break;
    case 'signOut':
        M_Session::signOut();
        break;
}
