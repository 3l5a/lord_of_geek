<?php

session_start();


// Pour afficher les erreurs PHP
error_reporting(E_ALL);
ini_set("display_errors", 1);
// Attention : A supprimer en production !!!

require("./util/fonctions.inc.php");
require('./util/validateurs.inc.php');
require("./App/modele/AccesDonnees.php");

$clientSession = [];

if (!empty($_SESSION['client'])) {
    $clientSession = $_SESSION['client'];
} // si $_SESSION existe, alors il définit $clientSession // $_SESSION['client'] est définit dans le controleur du compte client



$uc = filter_input(INPUT_GET, 'uc'); // Use Case
$action = filter_input(INPUT_GET, 'action'); // Action
$id = filter_input(INPUT_GET, 'id'); // Id d'un jeu
initPanier();

if (!$uc) {
    $uc = 'accueil';
}

// Controleur principal
switch ($uc) {
    case 'accueil':
        include 'App/controleur/c_consultation.php';
        $toutLeStock = M_Exemplaire::trouveTousLesJeux();
        break;
    case 'visite':
        include 'App/controleur/c_consultation.php';
        break;
    case 'produit':
        include 'App/controleur/c_consultation.php';
        break;
    case 'panier':
        include 'App/controleur/c_gestionPanier.php';
        break;
    case 'commander':
        include 'App/controleur/c_passerCommande.php';
        break;
    case 'sInscrire':
        include 'App/controleur/c_nouveauClient.php';
        break;
    case 'profil':
        include 'App/controleur/c_monCompte.php';
        break;
    case 'authentification':
        include 'App/controleur/c_authentification.php';
        break;
    case 'compte':
        include 'App/controleur/c_monCompte.php';
        break;
    default:
        break;
}


include("App/vue/template.php");
