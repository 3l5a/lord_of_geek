<section class="profil">
    <h2>Bonjour /NOM PRÉNOM/ vous êtes bien connecté-e sur Lord Of Geek</h2>
    <h3 style="color:orange">Vos informations :</h3>
    <p>Email : <? $_SESSION['client']['email'] ?></p>
    <p>Adresse :</p>
    <p>Code postal :</p>
    <p>Ville :</p>
    <a href="/lord_of_geek/index.php?uc=compte&action=updateInfo" style="background-color:orange; padding:4px">Modifier vos informations</a href="http://localhost/www/lord_of_geek/index.php?uc=compte">
    <a href="/lord_of_geek/index.php?uc=compte&action=signOut" style="background-color:orange; padding:4px">Vous déconnecter</a href="http://localhost/www/lord_of_geek/index.php?uc=compte">
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