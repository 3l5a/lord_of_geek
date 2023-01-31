<?php

/**
 * Requetes sur les exemplaires  de jeux videos
 *
 * @author Loic LOG
 */
class M_Exemplaire {

    /**
     * Retourne sous forme d'un tableau associatif tous les jeux de la
     * catégorie passée en argument
     *
     * @param $idCategorie
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDeCategorie($idCategorie) {
        $req = "SELECT exemplaires.*, references_jeux.titre, etats.nom_etat FROM exemplaires
                JOIN references_jeux ON exemplaires.reference_jeu_id = references_jeux.id
                JOIN references_jeux_has_categories ON references_jeux.id = references_jeux_has_categories.reference_jeu_id
                JOIN categories ON references_jeux_has_categories.categorie_id = categories.id
                JOIN etats ON exemplaires.etat_id = etats.id
                WHERE categories.id = '$idCategorie'";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    /**
     * Retourne les jeux concernés par le tableau des idProduits passé en argument
     *
     * @param $desIdJeux tableau d'idProduits
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDuTableau($desIdJeux) {
        $nbProduits = count($desIdJeux);
        $lesProduits = array();
        if ($nbProduits != 0) {
            foreach ($desIdJeux as $unIdProduit) {
                $req = "SELECT exemplaires.*, references_jeux.titre, etats.nom_etat FROM exemplaires 
                        JOIN references_jeux ON exemplaires.reference_jeu_id = references_jeux.id
                        JOIN etats ON exemplaires.etat_id = etats.id
                        WHERE exemplaires.id = '$unIdProduit'";
                $res = AccesDonnees::query($req);
                $unProduit = $res->fetch();
                $lesProduits[] = $unProduit;
            }
        }
        return $lesProduits;
    }
    /**
     * Retourne tous les jeux en vente, dans le stock
     *
     * @param  $stock
     * @return tableau associatif
     */
    public static function trouveTousLesJeux() { 
        $reqJeux = "SELECT DISTINCT exemplaires.* , references_jeux.titre, etats.nom_etat, consoles.nom_console FROM exemplaires
                    JOIN references_jeux ON exemplaires.reference_jeu_id = references_jeux.id
                    JOIN references_jeux_has_categories ON references_jeux.id = references_jeux_has_categories.reference_jeu_id
                    JOIN categories ON references_jeux_has_categories.categorie_id = categories.id
                    JOIN etats ON exemplaires.etat_id = etats.id
                    JOIN consoles ON exemplaires.consoles_id=consoles.id"; 
                    // requete pour obtenir tous les jeux avec leurs titre + état + prix de vente + image + console du jeu
        $res2 = AccesDonnees::query($reqJeux);
        $tousLesJeux = $res2->fetchAll();

        return $tousLesJeux;
    }

}

