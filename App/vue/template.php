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
        <div>
            <img src="public/images/logo.svg" alt="Logo Lord Of Geek" />
        </div>
        <!--  Menu haut-->
        <nav id="menu">
            <ul>
                <a href="index.php?uc=accueil">
                    <li> Accueil </li>
                </a>
                <a href="index.php?uc=visite&action=voirCategories">
                    <li> Catalogue de jeux </li>
                </a>
                <a href="index.php?uc=panier&action=voirPanier">
                    <li> Mon panier </li>
                </a>
                <?php
                if (!empty($clientSession)) {
                ?><a href="index.php?uc=compte&action=signedUp">
                        <li> Mon compte </li>
                    </a>
                <?php } else { ?>
                    <a href="index.php?uc=authentification">
                        <li> Se connecter / S'inscrire </li>
                    </a>
                <?php } ?>


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
            case 'visite':
                include("App/vue/v_jeux.php");
                break;
            case 'produit':
                include 'App/vue/v_produit.php';
                break;
            case 'panier':
                include("App/vue/v_panier.php");
                break;
            case 'commander':
                include("App/vue/v_commande.php");
                break;
            case 'compte':
                include("App/vue/v_compte.php");
                break;
            case 'authentification':
                include 'App/vue/v_authentification.php';
                break;
            case 'profil':
                include("App/vue/v_authentification.php");
                break;
            case 'profileInfo': // not implemented
                include("App/vue/v_modification.php");
            default:
                break;
        }
        ?>
    </main>
</body>

</html>