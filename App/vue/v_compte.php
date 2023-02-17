<section class="profil">
    <h2>Bonjour <span style="color: orange"><?= $_SESSION['client']['prenom'] . $_SESSION['client']['nom'] ?></span> vous êtes bien connecté-e sur Lord Of Geek</h2>
    <h3 style="color:orange">Vos informations :</h3>
    <p>Email : <?= $_SESSION['client']['email'] ?></p>
    <p>Adresse : <?= $_SESSION['client']['adresse'] ?></p>
    <p>Code postal : <?= $_SESSION['client']['cp'] ?></p>
    <p>Ville : <?= $_SESSION['client']['ville'] ?></p>
    <a href="index.php?uc=compte&action=updateInfo" style="background-color:orange; padding:4px">Modifier vos informations</a>
    <a href="index.php?uc=compte&action=signOut" style="background-color:orange; padding:4px">Vous déconnecter</a>
    <br> <br>
    <h3 style="color:orange">Vos dernières commandes :</h3>

    <?php
var_dump($orders);

if ($orders->num_rows>0){
    foreach ($orders as $order) {
        echo "Date : ".$order['created_at']. "<br>";
        echo " Jeu : ".$order['titre'] . "<br> <br>";
        echo "<hr>";
    }
} else {
    echo "Vous n'avez pas encore de commandes à afficher";
}
    ?>
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


[0]=> array(6) { 
    ["id"]=> int(2) 
    ["client_id"]=> int(1) 
    ["mode_paiement"]=> string(6) "PayPal" 
    ["created_at"]=> string(19) "2023-02-16 10:26:38" 
    ["updated_at"]=> NULL 
    ["titre"]=> string(10) "Diablo III" } 
[1]=> array(6) { ["id"]=> int(2) 
    ["client_id"]=> int(1) 
    ["mode_paiement"]=> string(6) "PayPal" 
    ["created_at"]=> string(19) "2023-02-16 10:26:38" 
    ["updated_at"]=> NULL 
    ["titre"]=> string(21) "The Last of Us Part 1" } 
[2]=> array(6) { 
    ["id"]=> int(1) 
    "client_id"]=> int(1) 
    ["mode_paiement"]=> string(2) "CB" 
    ["created_at"]=> string(19) "2023-02-01 00:00:00" 
    ["updated_at"]=> NULL 
    ["titre"]=> string(9) "Bayonetta" } 
[3]=> array(6) { 
    ["id"]=> int(1) 
    ["client_id"]=> int(1) 
    ["mode_paiement"]=> string(2) "CB" 
    ["created_at"]=> string(19) "2023-02-01 00:00:00" 
    ["updated_at"]=> NULL 
    ["titre"]=> string(11) "Bayonetta 2" } 
[4]=> array(6) { 
    ["id"]=> int(1) 
    ["client_id"]=> int(1) 
    ["mode_paiement"]=> string(2) "CB" 
    ["created_at"]=> string(19) "2023-02-01 00:00:00" 
    ["updated_at"]=> NULL 
    ["titre"]=> string(14) "Rayman Origins" }