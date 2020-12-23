<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201217113202 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_bank_account (id INT AUTO_INCREMENT NOT NULL, person_id INT DEFAULT NULL, bankaccount_id INT DEFAULT NULL, INDEX IDX_D36E4208217BBB47 (person_id), INDEX IDX_D36E4208A51AA83E (bankaccount_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_bank_account ADD CONSTRAINT FK_D36E4208217BBB47 FOREIGN KEY (person_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_bank_account ADD CONSTRAINT FK_D36E4208A51AA83E FOREIGN KEY (bankaccount_id) REFERENCES bank_account (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_bank_account');
    }
}
