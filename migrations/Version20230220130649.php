<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230220130649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie CHANGE description description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE evennement ADD date_debut DATE NOT NULL, ADD date_fin DATE NOT NULL');
        $this->addSql('ALTER TABLE produit CHANGE description description LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE evennement DROP date_debut, DROP date_fin');
        $this->addSql('ALTER TABLE produit CHANGE description description VARCHAR(255) NOT NULL');
    }
}
