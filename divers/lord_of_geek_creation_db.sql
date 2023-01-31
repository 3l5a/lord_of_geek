-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema lord_of_geek_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lord_of_geek_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lord_of_geek_db` DEFAULT CHARACTER SET latin1 ;
USE `lord_of_geek_db` ;

-- -----------------------------------------------------
-- Table `lord_of_geek_db`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lord_of_geek_db`.`categories` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nom_UNIQUE` (`nom` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `lord_of_geek_db`.`clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lord_of_geek_db`.`clients` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `adresse` VARCHAR(200) NULL,
  `cp` VARCHAR(5) NOT NULL,
  `ville` VARCHAR(55) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `mot_de_passe` VARCHAR(45) NOT NULL,
  `mode_paiement` VARCHAR(30) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lord_of_geek_db`.`commandes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lord_of_geek_db`.`commandes` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` INT NOT NULL,
  `mode_paiement` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_commandes_clients1_idx` (`client_id` ASC) VISIBLE,
  CONSTRAINT `fk_commandes_clients1`
    FOREIGN KEY (`client_id`)
    REFERENCES `lord_of_geek_db`.`clients` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `lord_of_geek_db`.`consoles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lord_of_geek_db`.`consoles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom_console` VARCHAR(45) NOT NULL,
  `constructeur` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nom_console_UNIQUE` (`nom_console` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lord_of_geek_db`.`series`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lord_of_geek_db`.`series` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom_serie` VARCHAR(90) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nom_serie_UNIQUE` (`nom_serie` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lord_of_geek_db`.`references_jeux`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lord_of_geek_db`.`references_jeux` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(100) NOT NULL,
  `console_id` INT NOT NULL,
  `no_serie` INT NULL,
  `series_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_references_jeux_noms_consoles1_idx` (`console_id` ASC) VISIBLE,
  INDEX `fk_references_jeux_series1_idx` (`series_id` ASC) VISIBLE,
  CONSTRAINT `fk_references_jeux_noms_consoles1`
    FOREIGN KEY (`console_id`)
    REFERENCES `lord_of_geek_db`.`consoles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_references_jeux_series1`
    FOREIGN KEY (`series_id`)
    REFERENCES `lord_of_geek_db`.`series` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lord_of_geek_db`.`etats`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lord_of_geek_db`.`etats` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom_etat` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nom_etat_UNIQUE` (`nom_etat` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lord_of_geek_db`.`exemplaires`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lord_of_geek_db`.`exemplaires` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reference_jeu_id` INT NOT NULL,
  `etat_id` INT NOT NULL,
  `image` VARCHAR(32) NULL,
  `description` VARCHAR(200) NULL,
  `prix_vente` DECIMAL NOT NULL,
  `prix_achat` DECIMAL NULL,
  `annee_achat` YEAR NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_exemplaires_references_jeux1_idx` (`reference_jeu_id` ASC) VISIBLE,
  INDEX `fk_exemplaires_etat1_idx` (`etat_id` ASC) VISIBLE,
  CONSTRAINT `fk_exemplaires_references_jeux1`
    FOREIGN KEY (`reference_jeu_id`)
    REFERENCES `lord_of_geek_db`.`references_jeux` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_exemplaires_etat1`
    FOREIGN KEY (`etat_id`)
    REFERENCES `lord_of_geek_db`.`etats` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `lord_of_geek_db`.`lignes_commande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lord_of_geek_db`.`lignes_commande` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `commande_id` BIGINT(20) UNSIGNED NOT NULL,
  `exemplaire_id` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `lignes_commande_commande_id_foreign` (`commande_id` ASC) VISIBLE,
  INDEX `lignes_commande_exemplaire_id_foreign` (`exemplaire_id` ASC) VISIBLE,
  CONSTRAINT `lignes_commande_commande_id_foreign`
    FOREIGN KEY (`commande_id`)
    REFERENCES `lord_of_geek_db`.`commandes` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `lignes_commande_exemplaire_id_foreign`
    FOREIGN KEY (`exemplaire_id`)
    REFERENCES `lord_of_geek_db`.`exemplaires` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `lord_of_geek_db`.`references_jeux_has_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lord_of_geek_db`.`references_jeux_has_categories` (
  `reference_jeu_id` INT NOT NULL,
  `categorie_id` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`reference_jeu_id`, `categorie_id`),
  INDEX `fk_references_jeux_has_categories_categories1_idx` (`categorie_id` ASC) VISIBLE,
  INDEX `fk_references_jeux_has_categories_references_jeux1_idx` (`reference_jeu_id` ASC) VISIBLE,
  CONSTRAINT `fk_references_jeux_has_categories_references_jeux1`
    FOREIGN KEY (`reference_jeu_id`)
    REFERENCES `lord_of_geek_db`.`references_jeux` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_references_jeux_has_categories_categories1`
    FOREIGN KEY (`categorie_id`)
    REFERENCES `lord_of_geek_db`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
