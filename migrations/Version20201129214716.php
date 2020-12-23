<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201129214716 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bank_account ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE bank_account ADD CONSTRAINT FK_53A23E0AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_53A23E0AA76ED395 ON bank_account (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bank_account DROP FOREIGN KEY FK_53A23E0AA76ED395');
        $this->addSql('DROP INDEX UNIQ_53A23E0AA76ED395 ON bank_account');
        $this->addSql('ALTER TABLE bank_account DROP user_id');
    }
}
