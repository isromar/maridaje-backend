<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231225085912 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Bodega (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(150) NOT NULL, direccion VARCHAR(255) DEFAULT NULL, telefono VARCHAR(15) DEFAULT NULL, cif VARCHAR(15) NOT NULL, UNIQUE INDEX cif (cif), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Comida (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(100) NOT NULL, UNIQUE INDEX nombre (nombre), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vino (id INT AUTO_INCREMENT NOT NULL, bodega_id INT DEFAULT NULL, nombre VARCHAR(150) NOT NULL, tipo VARCHAR(100) DEFAULT NULL, denominacion_origen VARCHAR(200) DEFAULT NULL, maduracion VARCHAR(150) DEFAULT NULL, ecologico TINYINT(1) DEFAULT NULL, variedad_uva VARCHAR(255) DEFAULT NULL, INDEX IDX_E65EA138B1FDE9D (bodega_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vino_comida (vino_id INT NOT NULL, comida_id INT NOT NULL, INDEX IDX_3879CAEDE16856A6 (vino_id), INDEX IDX_3879CAED399E35A6 (comida_id), PRIMARY KEY(vino_id, comida_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vino ADD CONSTRAINT FK_E65EA138B1FDE9D FOREIGN KEY (bodega_id) REFERENCES Bodega (id)');
        $this->addSql('ALTER TABLE vino_comida ADD CONSTRAINT FK_3879CAEDE16856A6 FOREIGN KEY (vino_id) REFERENCES vino (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vino_comida ADD CONSTRAINT FK_3879CAED399E35A6 FOREIGN KEY (comida_id) REFERENCES Comida (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vino DROP FOREIGN KEY FK_E65EA138B1FDE9D');
        $this->addSql('ALTER TABLE vino_comida DROP FOREIGN KEY FK_3879CAEDE16856A6');
        $this->addSql('ALTER TABLE vino_comida DROP FOREIGN KEY FK_3879CAED399E35A6');
        $this->addSql('DROP TABLE Bodega');
        $this->addSql('DROP TABLE Comida');
        $this->addSql('DROP TABLE vino');
        $this->addSql('DROP TABLE vino_comida');
    }
}
