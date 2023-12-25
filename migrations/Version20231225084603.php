<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231225084603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX cif_unique ON bodega');
        $this->addSql('CREATE UNIQUE INDEX cif ON bodega (cif)');
        $this->addSql('ALTER TABLE comida DROP dulce');
        $this->addSql('DROP INDEX nombre_unique ON comida');
        $this->addSql('CREATE UNIQUE INDEX nombre ON comida (nombre)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX cif ON Bodega');
        $this->addSql('CREATE UNIQUE INDEX cif_unique ON Bodega (cif)');
        $this->addSql('ALTER TABLE Comida ADD dulce VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX nombre ON Comida');
        $this->addSql('CREATE UNIQUE INDEX nombre_unique ON Comida (nombre)');
    }
}
