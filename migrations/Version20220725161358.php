<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220725161358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partenaire ADD partuser_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partenaire ADD CONSTRAINT FK_32FFA37367CDF483 FOREIGN KEY (partuser_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_32FFA37367CDF483 ON partenaire (partuser_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partenaire DROP FOREIGN KEY FK_32FFA37367CDF483');
        $this->addSql('DROP INDEX IDX_32FFA37367CDF483 ON partenaire');
        $this->addSql('ALTER TABLE partenaire DROP partuser_id');
    }
}
