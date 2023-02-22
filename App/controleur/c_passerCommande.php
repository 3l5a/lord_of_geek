<?php

include 'App/modele/M_Commande.php';

/**
 * Controleur pour les commandes
 * @author Loic LOG
 */
switch ($action) {
    case 'passerCommande' :
        $n = nbJeuxDuPanier();
        if (isset($clientSession) && !empty($clientSession)) {
            $jeux = getLesIdJeuxDuPanier();
            if ($jeux > 0) {
                $cb = "CB";
                $commande = M_Commande::createOrder($clientSession['id'], $cb, $jeux);
                supprimerPanier();
                afficheMessage("Votre commande est bien enregistrée.");
            } else {
                afficheMessage("Votre panier est vide.");
                $uc = '';
        } 
        } else {
            header('Location: index.php?uc=authentification&action=mandatoryRegistration');
        }
        break;
    // case 'confirmerCommande' :
    //     $nom = filter_input(INPUT_POST, 'nom');
    //     $prenom = filter_input(INPUT_POST, 'prenom');
    //     $rue = filter_input(INPUT_POST, 'rue');
    //     $ville = filter_input(INPUT_POST, 'ville');
    //     $cp = filter_input(INPUT_POST, 'cp');
    //     $mail = filter_input(INPUT_POST, 'mail');

    //     $errors = M_Commande::estValide($nom, $prenom, $rue, $ville, $cp, $mail);
    //     if (count($errors) > 0) {
    //         // Si une erreur, on recommence
    //         afficheErreurs($errors);
    //     } else {
    //         $lesIdJeu = getLesIdJeuxDuPanier();
    //         M_Commande::createOrder($nom, $prenom, $rue, $cp, $ville, $mail, $lesIdJeu);
    //         supprimerPanier();
    //         afficheMessage("Commande enregistrée");
    //         $uc = '';
    //     }
    //     break;
}



