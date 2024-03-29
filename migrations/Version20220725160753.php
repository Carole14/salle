<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220725160753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649EC37C9B4');
        $this->addSql('DROP INDEX IDX_8D93D649EC37C9B4 ON user');
        $this->addSql('ALTER TABLE user DROP part_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD part_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649EC37C9B4 FOREIGN KEY (part_id_id) REFERENCES partenaire (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649EC37C9B4 ON user (part_id_id)');
    }
}
