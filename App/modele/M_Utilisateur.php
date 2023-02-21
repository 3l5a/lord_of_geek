<?php

class M_Utilisateur
{
    /**
     * add an user's informations to the database
     *
     * @param [type] $nom
     * @param [type] $prenom
     * @param [type] $adresse
     * @param [type] $cp
     * @param [type] $ville
     * @param [type] $email
     * @param [type] $mdp
     * @return bool
     */
    public static function signUp(string $nom, string $prenom, $adresse, int $cp, string $ville, $email, string $mdp)
    {
        $mdp = password_hash($mdp, PASSWORD_BCRYPT);
        $req = "INSERT INTO clients (nom, prenom, adresse, cp, ville, email, mot_de_passe) 
                VALUES (:nom, :prenom, :adresse, :cp, :ville, :email, :mdp)";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
        $stmt->bindParam(':cp', $cp, PDO::PARAM_INT);
        $stmt->bindParam(':ville', $ville, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $res = $stmt->execute();

        return $stmt;
    }


     /**
     * checck if user exists before logging in or logging up
     *
     * @param [type] $email
     * @param [type] $mdp
     * @return false if not found, array if found
     */
    public static function findUser(string $email, string $mdp):mixed
    {
        $req = "SELECT clients.* FROM clients WHERE email = :email";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $client = $stmt->fetch(PDO::FETCH_ASSOC);

        $mdpClient = $client['mot_de_passe'];
        $mdp = password_verify($mdp, $mdpClient);

        return $client;
    }

    /**
     * checks if user is in database
     *
     * @param string $email
     * @return bool
     */
    public static function checkEmail($email)
    {
        $req = "SELECT clients.* FROM clients WHERE email = :email";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * update a client's personnal informations
     *
     * @param [type] $idUser
     * @param [type] $nom
     * @param [type] $prenom
     * @param [type] $adresse
     * @param [type] $cp
     * @param [type] $ville
     * @return bool
     */
    public static function updateInfo(int $idUser, string $nom, string $prenom, string $adresse, int $cp, string $ville): bool
    {
        $req = "UPDATE clients 
                SET nom= :nom, prenom = :prenom, adresse = :adresse, cp = :cp, ville = :ville 
                WHERE id = :idUser";

        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
        $stmt->bindParam(':cp', $cp, PDO::PARAM_INT);
        $stmt->bindParam(':ville', $ville, PDO::PARAM_STR);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        return $stmt->execute();
    }


    /**
     * Retrieve all orders from one user
     *
     * @param integer $id
     * @return array
     */
    public static function userOrders($id): array
    {
        $req = "SELECT DISTINCT commandes.*, references_jeux.titre, consoles.nom_console FROM commandes
                JOIN lignes_commande ON commandes.id = lignes_commande.commande_id
                JOIN exemplaires ON exemplaires.reference_jeu_id = reference_jeu_id
                JOIN references_jeux ON references_jeux.id = exemplaire_id
                JOIN consoles ON consoles.id = exemplaires.consoles_id
                WHERE client_id = :id 
                GROUP BY created_at, references_jeux.titre
                ORDER BY created_at desc";

        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        $stmt->execute();
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }
}


