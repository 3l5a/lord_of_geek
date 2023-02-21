<?php

/**
 * Requetes sur les commandes
 *
 * @author Loic LOG
 */
class M_Commande {

/**
 * insert new order in commandes and lignes_commandes in DB
 *
 * @param [type] $client_id
 * @param [type] $mode_paiement
 * @param [type] $listJeux
 * @return void
 */
    public static function createOrder(int $client_id, string $mode_paiement, array $listJeux) 
    {
        $req = "INSERT INTO commandes (client_id, mode_paiement) 
                VALUES (:client_id, :mode_paiement)";

        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':client_id', $client_id, PDO::PARAM_INT);
        $stmt->bindParam(':mode_paiement', $mode_paiement, PDO::PARAM_STR);
        $stmt->execute();

        // $stmt->fetchAll(PDO::FETCH_ASSOC);
        $idCommande = AccesDonnees::getPdo()->lastInsertId();
        var_dump($listJeux);

        foreach ($listJeux as $jeu) {
            $req = "INSERT INTO lignes_commande(commande_id, exemplaire_id) VALUES (:idCommande,:idJeu)";
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
    public static function estValide($nom, $prenom, $rue, $ville, $cp, $mail): array 
    {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($prenom == "") {
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
