<section class="profil" style="padding-bottom: 50px">
    <h2>Bonjour <span style="color: orange"><?= $_SESSION['client']['prenom'] . $_SESSION['client']['nom'] ?></span> vous êtes bien connecté-e sur Lord Of Geek</h2>
    <h3 style="color:orange">Vos informations :</h3>
    <p>Email : <?= $_SESSION['client']['email'] ?></p>
    <p>Adresse : <?= $_SESSION['client']['adresse'] ?></p>
    <p>Code postal : <?= $_SESSION['client']['cp'] ?></p>
    <p>Ville : <?= $_SESSION['client']['ville'] ?></p>
    <!-- <a href="index.php?uc=compte&action=updateInfo" style="background-color:orange; padding:4px">Modifier vos informations</a> -->
    <a href="index.php?uc=compte&action=signOut" style="background-color:orange; padding:4px; margin-top: 10px">Vous déconnecter</a>
    <br> <br>
    <h3 style="color:orange">Vos dernières commandes :</h3>

    <?php
echo "<hr>";
if (count($orders)>0){
    // display 1st order w/ 1st game of 1st order
    echo "<h3>Commande n°". $orders[0]['id']." du ".$orders[0]['created_at']. "</h3> <br>"; 
    echo "Contenu de la commande : <br><br>".$orders[0]['titre'] . " sur ".$orders[0]['nom_console'] ."<br>";
        for ($i = 1; $i<count($orders); $i++){ // $i = 1 because counting from 2nd game 
            if ($orders[$i]['created_at'] === $orders[$i-1]['created_at']){ // was game ordered at the same timestamp as the previous one ? if yes then only display name of game / if not, go to else to create new order div
                echo $orders[$i]['titre']. " sur ".$orders[$i]['nom_console'] . "<br>";
            } else {
                echo "<hr>";
                echo " <h3>Commande n°".$orders[$i]['id']." du ".$orders[$i]['created_at'] . "</h3><br>";
                echo "Contenu de la commande : <br><br>".$orders[$i]['titre'] . " sur ".$orders[$i]['nom_console']. "<br>";
            }
}
} else {
    echo "Vous n'avez pas encore de commandes à afficher";
}
    ?>
</section>

<!-- $orders = -->
<!-- [0]=> array(6) { 
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
    ["titre"]=> string(14) "Rayman Origins" } -->