<?php
class M_Session 
{
    /**
     * if user is in database, session = client's informations
     *
     * @param [type] $email
     * @param [type] $mdp
     * @return void
     */
    public static function findUser(string $email, string $mdp)
    {
        $req = "SELECT clients.* FROM clients WHERE email = :email AND mot_de_passe = :mdp";
        $pdo = AccesDonnees::getPdo();
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $stmt->execute();

        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        //rajouter if $client exists && pasword verify : return client, sinon return false
        if ($client) {
        return $client;
        }
        else {
            return false;
        }
    }

    /**
     * unset session to log out of user's account
     *
     * @return void
     */
    public static function signOut()
    {
            unset($_SESSION['client']);
            header('Location: index.php');
            die();
    }
}
