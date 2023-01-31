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
    <section  id="jeux">
        <?php
        foreach ($lesJeux as $unJeu) {
            $id = $unJeu['id'];
            $titre = $unJeu['titre'];
            $description = $unJeu['description'];
            $prix = $unJeu['prix_vente'];
            $image = $unJeu['image'];
            $etat = $unJeu['nom_etat'];
            ?>
            <article><a href="index.php?produit=<?= $id?>" title="Voir le jeu">
                
                    <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $titre; ?>"/>
                    <h3><?= $titre ?></h3>
                    <p>En savoir plus : <br><?= $description?></p>
                    <p><?= $etat?></p>
                    <p><?= "Prix : " . $prix . " Euros" ?>
                        <a href="index.php?uc=visite&categorie=<?= $categorie ?>&jeu=<?= $id ?>&action=ajouterAuPanier">
                            <img src="public/images/mettrepanier.png" title="Ajouter au panier" class="add panier"/>
                        </a>
                    </p>
            </a>
            </article>
            <?php
        }
        ?>
    </section>
</section>
