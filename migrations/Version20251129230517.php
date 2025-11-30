<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251129230517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE unit ADD condominium_id INT NOT NULL');
        $this->addSql('ALTER TABLE unit ADD CONSTRAINT FK_DCBB0C53FE823105 FOREIGN KEY (condominium_id) REFERENCES condominium (id)');
        $this->addSql('CREATE INDEX IDX_DCBB0C53FE823105 ON unit (condominium_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE unit DROP FOREIGN KEY FK_DCBB0C53FE823105');
        $this->addSql('DROP INDEX IDX_DCBB0C53FE823105 ON unit');
        $this->addSql('ALTER TABLE unit DROP condominium_id');
    }
}
