use lord_of_geek_db;

# retourne les jeux appartenant à telle catégorie + console + nom du jeu
SELECT exemplaires.*, references_jeux.titre, consoles.nom_console, etats.nom_etat FROM exemplaires
JOIN references_jeux ON exemplaires.reference_jeu_id = references_jeux.id
JOIN references_jeux_has_categories ON references_jeux.id = references_jeux_has_categories.reference_jeu_id
JOIN categories ON references_jeux_has_categories.categorie_id = categories.id
JOIN etats ON exemplaires.etat_id = etats.id
JOIN consoles ON exemplaires.consoles_id = consoles.id
WHERE categories.nom = 'aventure';

SELECT exemplaires.*, references_jeux.titre FROM exemplaires 
JOIN references_jeux ON exemplaires.reference_jeu_id = references_jeux.id
WHERE exemplaires.id = 2;

#retourne image + titre + état + prix_vente de chaque jeu sans la catégorie
SELECT exemplaires.*, etats.nom_etat, references_jeux.titre FROM exemplaires
JOIN references_jeux ON exemplaires.reference_jeu_id = references_jeux.id
JOIN etats ON exemplaires.etat_id = etats.id;

#retourne tous les exemplaires en stock : IMAGE, DESCR, CONSOLE, ETAT
SELECT DISTINCT exemplaires.* , references_jeux.titre, etats.nom_etat, consoles.nom_console FROM exemplaires
JOIN references_jeux ON exemplaires.reference_jeu_id = references_jeux.id
JOIN references_jeux_has_categories ON references_jeux.id = references_jeux_has_categories.reference_jeu_id
JOIN categories ON references_jeux_has_categories.categorie_id = categories.id
JOIN etats ON exemplaires.etat_id = etats.id
JOIN consoles ON exemplaires.consoles_id=consoles.id;

#ajouter un utilisateur
INSERT INTO clients (nom, prenom, adresse, cp, ville, email, mot_de_passe) VALUES ('hor', 'soriya', '10, rue des séquoias', 34830, 'clapiers', 'hor.soriya@gmail.com', 'soriya');

# retrouver un client à partir de son email et de son mot de passe
SELECT clients.* FROM clients WHERE email = 'elsa.thievet@hotmail.fr'AND mot_de_passe = 'prout';
