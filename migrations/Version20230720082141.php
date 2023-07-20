<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230720082141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE collector_user (collector_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_28A8D59E670BAFFE (collector_id), INDEX IDX_28A8D59EA76ED395 (user_id), PRIMARY KEY(collector_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE collector_user ADD CONSTRAINT FK_28A8D59E670BAFFE FOREIGN KEY (collector_id) REFERENCES collector (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE collector_user ADD CONSTRAINT FK_28A8D59EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user DROP image, DROP updated_at');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE collector_user DROP FOREIGN KEY FK_28A8D59E670BAFFE');
        $this->addSql('ALTER TABLE collector_user DROP FOREIGN KEY FK_28A8D59EA76ED395');
        $this->addSql('DROP TABLE collector_user');
        $this->addSql('ALTER TABLE user ADD image VARCHAR(255) DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
    }
}
