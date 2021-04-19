<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210419013030 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, conducteur_id INT NOT NULL, voyageur_id INT NOT NULL, admin_id INT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, mail VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, INDEX IDX_CFF65260F16F4AC6 (conducteur_id), INDEX IDX_CFF6526062915402 (voyageur_id), INDEX IDX_CFF65260642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conducteur (id INT AUTO_INCREMENT NOT NULL, cin VARCHAR(12) NOT NULL, tel INT NOT NULL, photo LONGBLOB DEFAULT NULL, sexe VARCHAR(10) NOT NULL, condition_condu VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, trajet_id INT NOT NULL, voyageur_id INT NOT NULL, etat VARCHAR(20) NOT NULL, INDEX IDX_42C84955D12A823 (trajet_id), INDEX IDX_42C8495562915402 (voyageur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trajet (id INT AUTO_INCREMENT NOT NULL, conducteur_id INT NOT NULL, villedepart VARCHAR(20) NOT NULL, villedestination VARCHAR(20) NOT NULL, date_j_sem DATE DEFAULT NULL, datedpart DATE NOT NULL, datearrive DATE NOT NULL, heuredepart TIME DEFAULT NULL, heurearrive TIME NOT NULL, typetrajet VARCHAR(20) NOT NULL, statut VARCHAR(20) NOT NULL, INDEX IDX_2B5BA98CF16F4AC6 (conducteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, conducteur_id INT NOT NULL, matricule VARCHAR(255) NOT NULL, marque VARCHAR(255) NOT NULL, modele VARCHAR(255) NOT NULL, couleur VARCHAR(255) NOT NULL, nbr_place INT NOT NULL, INDEX IDX_292FFF1DF16F4AC6 (conducteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyageur (id INT AUTO_INCREMENT NOT NULL, cin VARCHAR(20) NOT NULL, tel INT NOT NULL, photo LONGBLOB DEFAULT NULL, sexe VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260F16F4AC6 FOREIGN KEY (conducteur_id) REFERENCES conducteur (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526062915402 FOREIGN KEY (voyageur_id) REFERENCES voyageur (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955D12A823 FOREIGN KEY (trajet_id) REFERENCES trajet (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495562915402 FOREIGN KEY (voyageur_id) REFERENCES voyageur (id)');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98CF16F4AC6 FOREIGN KEY (conducteur_id) REFERENCES conducteur (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DF16F4AC6 FOREIGN KEY (conducteur_id) REFERENCES conducteur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260642B8210');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260F16F4AC6');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98CF16F4AC6');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DF16F4AC6');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955D12A823');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526062915402');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495562915402');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE conducteur');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE trajet');
        $this->addSql('DROP TABLE vehicule');
        $this->addSql('DROP TABLE voyageur');
    }
}
