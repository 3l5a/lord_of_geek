<section>
    <img src="public/images/jeux/<?= $unJeu['image'] ?>" alt="Image du jeu en vente" style="max-width: 300px">
    <h3>Toutes les infos sur <?= $unJeu['titre'] ?> :</h3>
    <p>Console : <?= $unJeu['nom_console'] ?></p>
    <p>Description : <?= $unJeu['description'] ?></p>
    <p>Licence : <?= $unJeu['nom_serie'] ?></p>
    <p>Prix <?= $unJeu['prix_vente'] ?>€</p>
</section>