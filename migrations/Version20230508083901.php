<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230508083901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produto (id INT AUTO_INCREMENT NOT NULL, proveedor_id INT NOT NULL, nome VARCHAR(32) NOT NULL, precio NUMERIC(7, 2) NOT NULL, cantidade INT NOT NULL, INDEX IDX_5CAC49D7CB305D73 (proveedor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proveedor (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(64) NOT NULL, tlf VARCHAR(9) NOT NULL, gmail VARCHAR(64) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produto ADD CONSTRAINT FK_5CAC49D7CB305D73 FOREIGN KEY (proveedor_id) REFERENCES proveedor (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produto DROP FOREIGN KEY FK_5CAC49D7CB305D73');
        $this->addSql('DROP TABLE produto');
        $this->addSql('DROP TABLE proveedor');
    }
}
