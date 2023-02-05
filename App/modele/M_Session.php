<?php
class M_Session extends M_Utilisateur
{
    /**
     * if user is in database, session is client's info
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

        $client = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($res) {
            $_SESSION['client'] = $client;
            var_dump($_SESSION);
            echo "<br>";
            echo "<br>";
            var_dump($_SESSION['jeux']);
        }
        return $client;
    }

    /**
     * unset session to log out of user's account
     *
     * @return void
     */
    public static function signOut()
    {
        if ($_SESSION) {
            unset($_SESSION['client']);
            header('Location: index.php');
            die();
        }
    }
}
