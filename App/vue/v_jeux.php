<section id="visite">
    <aside id="categories">
        <ul >
            <li class="first"></li>
            <?php
            foreach ($lesCategories as $uneCategorie) {
                $idCategorie = $uneCategorie['id'];
                $libCategorie = $uneCategorie['nom'];
                ?>
                    <a href=index.php?uc=visite&categorie=<?php echo $idCategorie ?>&action=voirJeux><li class="cat"><?php echo $libCategorie ?></li></a>
                <?php
            }
            ?>
            <li class="last"></li>
        </ul>
    </aside>
    <section  id="jeux" class="articles">
        <?php
        foreach ($lesJeux as $unJeu) {
            $id = $unJeu['id'];
            $titre = $unJeu['titre'];
            $description = $unJeu['description'];
            $prix = $unJeu['prix_vente'];
            $image = $unJeu['image'];
            $etat = $unJeu['nom_etat'];
            $console = $unJeu['nom_console'];

            ?>
            <a href="index.php?action=produit&id=<?= $id ?>" title="Voir le jeu">
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
</section>
