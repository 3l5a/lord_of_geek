<?php
include 'App/modele/M_Categorie.php';
include 'App/modele/M_Exemplaire.php';

/**
 * Controleur pour la consultation des exemplaires
 * @author Loic LOG
 */
switch ($action) {
    case 'voirTousLesJeux':
        $toutLeStock = M_Exemplaire::trouveTousLesJeux();
        break;
    case 'voirJeux':
        $categorie = filter_input(INPUT_GET, 'categorie');
        $lesJeux = M_Exemplaire::trouveLesJeuxDeCategorie($categorie);
        $toutLeStock = M_Exemplaire::trouveTousLesJeux();
        break;
    case 'ajouterAuPanier':
        $idJeu = filter_input(INPUT_GET, 'jeu');
        $categorie = filter_input(INPUT_GET, 'categorie');
        if (!ajouterAuPanier($idJeu)) {
            afficheErreurs(["Ce jeu est déjà dans le panier"]);
        } else {
            afficheMessage("Ce jeu a été ajouté");
        }
        $lesJeux = M_Exemplaire::trouveLesJeuxDeCategorie($categorie);
        break;
    case 'consulterJeu':
        $idJeu = filter_input(INPUT_GET, 'id');
        $unJeu = M_Exemplaire::trouveUnJeu($idJeu);
        break;
    default:
        $toutLeStock = M_Exemplaire::trouveTousLesJeux();
        $lesJeux = [];
        break;
}

$lesCategories = M_Categorie::trouveLesCategories();
