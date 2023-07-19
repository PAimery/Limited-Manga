<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230716114358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE collector (id INT AUTO_INCREMENT NOT NULL, universe_id INT NOT NULL, title VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, number INT DEFAULT NULL, description LONGTEXT NOT NULL, accessory LONGTEXT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, link_amazon VARCHAR(255) DEFAULT NULL, link_fnac VARCHAR(255) DEFAULT NULL, INDEX IDX_CEDBF54C5CD9AF2 (universe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE collector ADD CONSTRAINT FK_CEDBF54C5CD9AF2 FOREIGN KEY (universe_id) REFERENCES universe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE collector DROP FOREIGN KEY FK_CEDBF54C5CD9AF2');
        $this->addSql('DROP TABLE collector');
    }
}
