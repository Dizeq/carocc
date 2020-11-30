<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201128170258 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cars (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(255) NOT NULL, modele VARCHAR(255) NOT NULL, kilometre VARCHAR(255) NOT NULL, prix VARCHAR(255) NOT NULL, proprietaire VARCHAR(255) NOT NULL, cylindree VARCHAR(255) NOT NULL, puissance VARCHAR(255) NOT NULL, carburant VARCHAR(255) NOT NULL, mecirculation VARCHAR(255) NOT NULL, transmission VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, options LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, cover_image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cars');
    }
}
