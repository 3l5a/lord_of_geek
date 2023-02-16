<?php

/**
 * Requetes sur les commandes
 *
 * @author Loic LOG
 */
class M_Commande {

    /**
     * Crée une commande
     *
     * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
     * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
     * tableau d'idProduit passé en paramètre
     * @param $nom
     * @param $prenom
     * @param $rue
     * @param $cp
     * @param $ville
     * @param $mail
     * @param $listJeux

     */
    public static function creerCommande($client_id, $mode_de_paiement, $listJeux) {
        $req = "INSERT INTO commandes (client_id, mode_de_paiement) 
                VALUES (':client_id', ':mode_de_paiement)";


        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':client_id', $client_id, PDO::PARAM_INT);
        $stmt->bindParam(':mode_de_paiement', $mode_de_paiement, PDO::PARAM_STR);
        $stmt->execute();

        $stmt->fetchAll(PDO::FETCH_ASSOC);

        $idCommande = AccesDonnees::getPdo()->lastInsertId();
        foreach ($listJeux as $jeu) {
            $req = "INSERT INTO lignes_commande(commande_id, exemplaire_id) VALUES (':idCommande',':idJeu')";
            $pdo = AccesDonnees::getPdo();
            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':idCommande', $idCommande, PDO::PARAM_INT).
            $stmt->bindParam(':idJeu', $jeu, PDO::PARAM_INT);
            $stmt->execute();

            $stmt->fetch();
        }
    }

    /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a
     *
     * @param $nom : chaîne
     * @param $rue : chaîne
     * @param $ville : chaîne
     * @param $cp : chaîne
     * @param $mail : chaîne
     * @return : array
     */
    public static function estValide($nom, $rue, $ville, $cp, $mail) {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($rue == "") {
            $erreurs[] = "Il faut saisir le champ rue";
        }
        if ($ville == "") {
            $erreurs[] = "Il faut saisir le champ ville";
        }
        if ($cp == "") {
            $erreurs[] = "Il faut saisir le champ Code postal";
        } else if (!estUnCp($cp)) {
            $erreurs[] = "Erreur de code postal";
        }
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } else if (!estUnMail($mail)) {
            $erreurs[] = "Erreur de mail";
        }
        return $erreurs;
    }

}
