<section>
    <h1>
        Bienvenue sur Lord Of Geek
    </h1>
    <h2>
        Retrouvez ici tous nos jeux
    </h2>
</section>

<section class="articles">
    <?php

    //affichage tous les jeux, suite fonction trouveTousLesJeux
    foreach ($toutLeStock as $jeu) {

        $id = $jeu['id'];
        $titre = $jeu['titre'];
        $description = $jeu['description'];
        $prix = $jeu['prix_vente'];
        $image = $jeu['image'];
        $etat = $jeu['nom_etat'];
        $console = $jeu['nom_console'];
    ?>
            <a href="index.php?uc=produit&action=consulterJeu&id=<?= $id ?>" title="Voir le jeu">
            <article>
                <div class="image">
                    <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $titre; ?>" />
                </div>
                <div class="descr">
                    <h3><?= $titre ?></h3>
                    <p><?= $console ?></p>
                    <p><?= $etat ?></p>
                    <p><?= $prix . "€" ?>
                        <a href="index.php?uc=visite&categorie=<?= $categorie ?>&jeu=<?= $id ?>&action=ajouterAuPanier">
                            <img src="public/images/mettrepanier.png" title="Ajouter au panier" class="add panier" />
                        </a>
                    </p>
                </div>
            </article>
        </a>
    <?php
    }

    ?>

</section>