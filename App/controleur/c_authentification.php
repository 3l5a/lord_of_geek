<?php
include 'App/modele/M_Session.php';
include 'App/modele/M_Utilisateur.php';
include 'App/modele/M_Commande.php';

/**
 * Controleur pour l'inscription ou la connexion de l'utilisateur
 */
switch ($action) {
    case 'signIn':
        $email = filter_input(INPUT_POST, 'email');
        $mdp = filter_input(INPUT_POST, 'mdp');
        $client = M_Utilisateur::findUser($email, $mdp);

        if ($client) {
            $_SESSION['client'] = $client;
            header('Location: index.php?uc=accueil');
        } else {
            afficheErreur("Identifiant et/ou mot de passe incorrects");
        }
        break;
    case 'registration':
        $emailInscr = filter_input(INPUT_POST, 'emailInscr');
        $mdpInscr = filter_input(INPUT_POST, 'mdpInscr');
        $nom = filter_input(INPUT_POST, 'nom');
        $prenom = filter_input(INPUT_POST, 'prenom');
        $rue = filter_input(INPUT_POST, 'rue');
        $cp = filter_input(INPUT_POST, 'cp');
        $ville = filter_input(INPUT_POST, 'ville');
        $compareMdp = filter_input(INPUT_POST, 'confirmMdp');

        $errors = M_Commande::estValide($nom, $prenom, $rue, $ville, $cp, $emailInscr);
        if (!$errors) {
                if ($mdpInscr === $compareMdp){
                    $user = M_Utilisateur::checkEmail($emailInscr);
                    if ($user == true) {
                        afficheErreur("Vous avez déjà un compte sur Lord of Geek, veuillez vous connecter");
                    } else {
                        $registered = M_Utilisateur::signUp($nom, $prenom, $rue, $cp, $ville, $emailInscr, $mdpInscr);
                        afficheMessage("Vous avez bien créé un compte, vous pouvez vous identifier désormais");
                    }
            } else {
                afficheErreur("Le mot de passe n'est pas identique");
            }
        } else {
            afficheErreurs($errors);
        }
        break;
    case 'mandatoryRegistration':
        afficheMessage("Pour commander vous devez d'abord vous connecter");
        break;
}
