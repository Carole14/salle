<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220719171908 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE partenaire_perms (partenaire_id INT NOT NULL, perms_id INT NOT NULL, INDEX IDX_B4C1D80B98DE13AC (partenaire_id), INDEX IDX_B4C1D80BD73E21DD (perms_id), PRIMARY KEY(partenaire_id, perms_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE partenaire_perms ADD CONSTRAINT FK_B4C1D80B98DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partenaire_perms ADD CONSTRAINT FK_B4C1D80BD73E21DD FOREIGN KEY (perms_id) REFERENCES perms (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE partenaire_perms');
    }
}
