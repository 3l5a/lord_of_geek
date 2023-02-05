<?php

session_start();


// Pour afficher les erreurs PHP
error_reporting(E_ALL);
ini_set("display_errors", 1);
// Attention : A supprimer en production !!!

require("./util/fonctions.inc.php");
require('./util/validateurs.inc.php');
require("./App/modele/AccesDonnees.php");


$uc = filter_input(INPUT_GET, 'uc'); // Use Case
$action = filter_input(INPUT_GET, 'action'); // Action
initPanier();

if (!$uc) {
    $uc = 'accueil';
}

// Controleur principal
switch ($uc) {
    case 'accueil':
        include 'App/controleur/c_consultation.php';
        break;
    case 'visite' :
        include 'App/controleur/c_consultation.php';
        break;
    case 'panier' :
        include 'App/controleur/c_gestionPanier.php';
        break;
    case 'commander':
        include 'App/controleur/c_passerCommande.php';
        break;
    case 'administrer' :
        include 'App/controleur/c_monCompte.php';
        break;
    default:
        break;
}


  function findUser($email, $mdp)
    {
        $req = "SELECT clients.* FROM clients WHERE email = :email AND mot_de_passe = :mdp";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $res = $stmt->execute();

        $client = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($res)
        {
        $_SESSION = $client;
        var_dump($_SESSION);
        }
    }

    findUser('zaza_t@hotmail.com', 'reprout');



include("App/vue/template.php");

