<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240428143746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stocks DROP FOREIGN KEY FK_56F79805E1A0FDEA');
        $this->addSql('DROP INDEX IDX_56F79805E1A0FDEA ON stocks');
        $this->addSql('ALTER TABLE stocks DROP fk_company, CHANGE fk_companys_id fk_company_id INT NOT NULL');
        $this->addSql('ALTER TABLE stocks ADD CONSTRAINT FK_56F7980567F5D045 FOREIGN KEY (fk_company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_56F7980567F5D045 ON stocks (fk_company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stocks DROP FOREIGN KEY FK_56F7980567F5D045');
        $this->addSql('DROP INDEX IDX_56F7980567F5D045 ON stocks');
        $this->addSql('ALTER TABLE stocks ADD fk_company BIGINT NOT NULL, CHANGE fk_company_id fk_companys_id INT NOT NULL');
        $this->addSql('ALTER TABLE stocks ADD CONSTRAINT FK_56F79805E1A0FDEA FOREIGN KEY (fk_companys_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_56F79805E1A0FDEA ON stocks (fk_companys_id)');
    }
}
