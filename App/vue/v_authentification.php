<div id="authentification">
    <form action="index.php?uc=authentification&action=signIn" method="POST">
        <label for="email">E-mail :</label>
        <input type="text" name="email" id=""> <br>
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id=""> <br>
        <input type="submit" value="Se connecter" name="connection">
    </form>

    <form action="index.php?uc=profil&action=signedUp" method="POST">
        <label for="emailInscr">E-mail :</label>
        <input type="text" name="emailInscr" id=""> <br>
        <label for="mdpInscr">Mot de passe :</label>
        <input type="password" name="mdpInscr" id=""> <br>
        
        <input type="submit" value="S'inscrire" name="inscription">
    </form>
</div>