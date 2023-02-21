<div id="authentification">
    <form action="index.php?uc=authentification&action=signIn" method="POST">
        <label for="email">E-mail :</label>
        <input type="text" name="email" id=""> <br>
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id=""> <br>
        <input type="submit" value="Se connecter" name="connection">
    </form>

    <form action="index.php?uc=profil&action=registration" method="POST">
        <label for="emailInscr">E-mail :</label>
        <input type="text" name="emailInscr" id=""> <br>

        <label for="mdpInscr">Mot de passe :</label>
        <input type="text" name="mdpInscr" id=""> <br>

        <label for="confirmMdp">Confirmer le mot de passe :</label>
        <input type="text" name="confirmMdp" id=""> <br>

        <label for="nom">Nom :</label>
        <input type="text" name="nom" id=""><br>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id=""><br>

        <label for="rue">Rue :</label>
        <input type="text" name="rue" id=""><br>

        <label for="cp">Code postal :</label>
        <input type="text" name="cp" id=""><br>

        <label for="ville">Ville :</label>
        <input type="text" name="ville" id=""><br><br>

        <input type="submit" value="S'inscrire" name="inscription">
    </form>
</div>
