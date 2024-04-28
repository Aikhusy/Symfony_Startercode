<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240428144156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE current_valuations ADD fk_stocks_id INT NOT NULL, DROP fk_stocks');
        $this->addSql('ALTER TABLE current_valuations ADD CONSTRAINT FK_4D47438F9B92B7B0 FOREIGN KEY (fk_stocks_id) REFERENCES stocks (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4D47438F9B92B7B0 ON current_valuations (fk_stocks_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE current_valuations DROP FOREIGN KEY FK_4D47438F9B92B7B0');
        $this->addSql('DROP INDEX UNIQ_4D47438F9B92B7B0 ON current_valuations');
        $this->addSql('ALTER TABLE current_valuations ADD fk_stocks BIGINT NOT NULL, DROP fk_stocks_id');
    }
}
