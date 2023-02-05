<?php

class M_Utilisateur
{
    /**
     * la fonction ajoute un utilisateur dans la BDD
     *
     * @param [type] $nom
     * @param [type] $prenom
     * @param [type] $adresse
     * @param [type] $cp
     * @param [type] $ville
     * @param [type] $email
     * @param [type] $mdp
     * @return void
     */
    public static function signUp($nom, $prenom, $adresse, $cp, $ville, $email, $mdp): bool
    {

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

        return $res;
    }


    //trouver client par email + mdp
    /**
     * vérifier que l'utilisateur soit ou pas dans la BDD avant de l'ajouter ou 
     *
     * @param [type] $email
     * @param [type] $mdp
     * @return void
     */
    public static function findUser($email, $mdp)
    {
        $req = "SELECT clients.* FROM clients WHERE email = :email AND mot_de_passe = :mdp";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $res = $stmt->execute();

        $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * to update a client's personnal informations
     *
     * @param [type] $idUser
     * @param [type] $nom
     * @param [type] $prenom
     * @param [type] $adresse
     * @param [type] $cp
     * @param [type] $ville
     * @return void
     */
    public static function updateInfo($idUser, $nom, $prenom, $adresse, $cp, $ville): bool
    {
        $req = "UPDATE clients SET nom= :nom, prenom = :prenom, adresse = :adresse, cp = :cp, ville = :ville WHERE id = :idUser";

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
}
