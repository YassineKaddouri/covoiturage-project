<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210415120331 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte ADD voyageur_id INT NOT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526062915402 FOREIGN KEY (voyageur_id) REFERENCES voyageur (id)');
        $this->addSql('CREATE INDEX IDX_CFF6526062915402 ON compte (voyageur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526062915402');
        $this->addSql('DROP INDEX IDX_CFF6526062915402 ON compte');
        $this->addSql('ALTER TABLE compte DROP voyageur_id');
    }
}
