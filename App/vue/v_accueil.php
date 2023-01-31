
<section>
    <h1>
        Bienvenue sur Lord Of Geek
    </h1>
    <h2>
        Le prince des jeux sur internet
    </h2>


<?php
// var_dump(M_Exemplaire::trouveTousLesJeux());
var_dump(AccesDonnees::getPdo()->errorInfo());


print_r(M_Exemplaire::trouveTousLesJeux())
    //affichage tous les jeux, suite fonction trouve tous les jeux
// foreach($tousLesJeux as $jeu) {
//     var_dump($jeu);
// }

?>

</section>

