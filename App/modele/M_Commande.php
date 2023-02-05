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
    public static function creerCommande($nom, $prenom, $rue, $cp, $ville, $email, $listJeux) {
        $req = "insert into commandes(client_id, adresse, cp, ville, email) values (':nom', ':prenom', ':rue',':cp',':ville',':email')";


        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':rue', $rue, PDO::PARAM_STR);
        $stmt->bindParam(':cp', $cp, PDO::PARAM_INT);
        $stmt->bindParam(':ville', $ville, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $stmt->fetchAll(PDO::FETCH_ASSOC);

        $idCommande = AccesDonnees::getPdo()->lastInsertId();
        foreach ($listJeux as $jeu) {
            $req = "insert into lignes_commande(commande_id, exemplaire_id) values (':idCommande',':jeu')";
            $pdo = AccesDonnees::getPdo();
            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':idCommande', $idCommande, PDO::PARAM_INT).
            $stmt->bindParam(':jeu', $jeu, PDO::PARAM_INT);
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
