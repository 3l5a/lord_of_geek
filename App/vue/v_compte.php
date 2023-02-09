<?php
var_dump(M_Utilisateur::findUser($email, $mdp));
?>
<section class="profil">
    <h2>Bonjour <? $_SESSION['client']['prenom'].$_SESSION['client']['nom'] ?> vous êtes bien connecté-e sur Lord Of Geek</h2>
    <h3 style="color:orange">Vos informations :</h3>
    <p>Email : <? $_SESSION['client']['email'] ?></p>
    <p>Adresse :<? $_SESSION['client']['adresse'] ?></p>
    <p>Code postal :<? $_SESSION['client']['cp'] ?></p>
    <p>Ville :<? $_SESSION['client']['ville'] ?></p>
    <a href="index.php?uc=compte&action=updateInfo" style="background-color:orange; padding:4px">Modifier vos informations</a>
    <a href="index.php?uc=compte&action=signOut" style="background-color:orange; padding:4px">Vous déconnecter</a>
    <br> <br>
    <h3 style="color:orange">Vos dernières commandes :</h3>
    <div class="commandes">
        <div class="commande">
            <p>Date :</p>
            <p>Articles commandés :</p>
            <hr>
        </div>
        <div class="commande">
            <p>Date :</p>
            <p>Articles commandés :</p>
            <hr>
        </div>
    </div>

</section>