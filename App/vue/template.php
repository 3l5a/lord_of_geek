<!DOCTYPE html>
<!--
Prototype de Lord Of Geek (LOG)
-->
<html>
    <head>
        <title>Lord Of Geek 2023</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/cssGeneral.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">

    </head>
    <body>
        <header>
            <!-- Images En-tête -->
            <img src="public/images/logo.svg" alt="Logo Lord Of Geek" />
            <!--  Menu haut-->
            <nav  id="menu">
                <ul>
                    <a href="index.php?uc=accueil&action=voirTousLesJeux"><li> Accueil </li></a>
                    <a href="index.php?uc=visite&action=voirCategories"><li> Catalogue de jeux </li></a>
                    <a href="index.php?uc=panier&action=voirPanier"><li> Voir son panier </li></a>
                    <a href="index.php?uc=compte"><li> Mon compte </li></a>
                </ul>
            </nav>

        </header>
        <main>
            <?php
            // Controleur de vues
            // Selon le cas d'utilisation, j'inclus un controleur ou simplement une vue
            switch ($uc) {
                case 'accueil':
                    include 'App/vue/v_accueil.php';
                    break;
                case 'visite' :
                    include("App/vue/v_jeux.php");
                    break;
                case 'panier' :
                    include("App/vue/v_panier.php");
                    break;
                case 'commander':
                    include ("App/vue/v_commande.php");
                    break;
                case 'compte' :
                    include ("App/vue/v_compte.php");
                    break;
                default:
                    break;
            }
            ?>
        </main>
    </body>
</html>