<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201220134400 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, debited_account_id INT NOT NULL, credited_account_id INT NOT NULL, amount DOUBLE PRECISION NOT NULL, INDEX IDX_723705D1A76ED395 (user_id), INDEX IDX_723705D1DE728DBB (debited_account_id), INDEX IDX_723705D1D8F51E75 (credited_account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1DE728DBB FOREIGN KEY (debited_account_id) REFERENCES bank_account (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1D8F51E75 FOREIGN KEY (credited_account_id) REFERENCES bank_account (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE transaction');
    }
}
