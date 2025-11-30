<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251129224913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE condominium (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, address VARCHAR(255) NOT NULL, postal_code VARCHAR(12) NOT NULL, number_of_main_units INT NOT NULL, number_of_secondary_units INT NOT NULL, year_of_construction INT DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE unit (id INT AUTO_INCREMENT NOT NULL, unit_identifier INT NOT NULL, type VARCHAR(255) NOT NULL, is_main_unit TINYINT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE condominium');
        $this->addSql('DROP TABLE unit');
        $this->addSql('DROP TABLE `user`');
    }
}
