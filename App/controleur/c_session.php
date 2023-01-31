<?php
session_start();

//session = objet


$_SESSION['role'] = 'administrateur';
unset($_SESSION['role']); // déconnecte

$_SESSION['user'] = [
    'username' => 'John',
    'password' => '0000',
];


// dans SESSION JE PEUX : Écrire dedans
$phrase = 'Je ne copie pas le code de valentin.';
$_SESSION['phrase'] = $phrase;
?>

<!-- Ou la lire, par exemple -->
<input type='text' value='<?= $_SESSION["phrase"]; ?>' name='phrase'>

<!-- Ou plus simplement -->
<input type='text' value='<?= $_SESSION["phrase"]; ?>' name='phrase'>


<?php
// Ou la lire, autre exemple
echo $_SESSION["phrase"];

// Ou faire des opérations algorithmiques, par exemple
if(isset($_SESSION['phrase'])){
    echo "Il y a une session";
} else {
    echo "Il n'y a pas de valeur en session";
}
