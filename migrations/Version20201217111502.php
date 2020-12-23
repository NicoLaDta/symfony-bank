<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201217111502 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bank_account DROP FOREIGN KEY FK_53A23E0A887EB59A');
        $this->addSql('DROP TABLE userbankaccount');
        $this->addSql('DROP INDEX IDX_53A23E0A887EB59A ON bank_account');
        $this->addSql('ALTER TABLE bank_account DROP bankaccountowner_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE userbankaccount (id INT AUTO_INCREMENT NOT NULL, person_id INT DEFAULT NULL, bankaccount_id INT DEFAULT NULL, INDEX IDX_604CA8CEA51AA83E (bankaccount_id), INDEX IDX_604CA8CE217BBB47 (person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE userbankaccount ADD CONSTRAINT FK_604CA8CE217BBB47 FOREIGN KEY (person_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE userbankaccount ADD CONSTRAINT FK_604CA8CEA51AA83E FOREIGN KEY (bankaccount_id) REFERENCES bank_account (id)');
        $this->addSql('ALTER TABLE bank_account ADD bankaccountowner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bank_account ADD CONSTRAINT FK_53A23E0A887EB59A FOREIGN KEY (bankaccountowner_id) REFERENCES userbankaccount (id)');
        $this->addSql('CREATE INDEX IDX_53A23E0A887EB59A ON bank_account (bankaccountowner_id)');
    }
}
