<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240113111702 extends AbstractMigration
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
        $this->addSql('CREATE TABLE denominacion_origen (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_vino (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE variedad_uva (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vino (id INT AUTO_INCREMENT NOT NULL, bodega_id INT DEFAULT NULL, denominacion_origen_id INT DEFAULT NULL, tipo_vino_id INT NOT NULL, nombre VARCHAR(150) NOT NULL, maduracion VARCHAR(150) DEFAULT NULL, ecologico TINYINT(1) DEFAULT NULL, INDEX IDX_E65EA138B1FDE9D (bodega_id), INDEX IDX_E65EA13BE73998A (denominacion_origen_id), INDEX IDX_E65EA13F2917706 (tipo_vino_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vino_comida (vino_id INT NOT NULL, comida_id INT NOT NULL, INDEX IDX_3879CAEDE16856A6 (vino_id), INDEX IDX_3879CAED399E35A6 (comida_id), PRIMARY KEY(vino_id, comida_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vino_variedad_uva (vino_id INT NOT NULL, variedad_uva_id INT NOT NULL, INDEX IDX_2796718EE16856A6 (vino_id), INDEX IDX_2796718E89B8C561 (variedad_uva_id), PRIMARY KEY(vino_id, variedad_uva_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vino ADD CONSTRAINT FK_E65EA138B1FDE9D FOREIGN KEY (bodega_id) REFERENCES Bodega (id)');
        $this->addSql('ALTER TABLE vino ADD CONSTRAINT FK_E65EA13BE73998A FOREIGN KEY (denominacion_origen_id) REFERENCES denominacion_origen (id)');
        $this->addSql('ALTER TABLE vino ADD CONSTRAINT FK_E65EA13F2917706 FOREIGN KEY (tipo_vino_id) REFERENCES tipo_vino (id)');
        $this->addSql('ALTER TABLE vino_comida ADD CONSTRAINT FK_3879CAEDE16856A6 FOREIGN KEY (vino_id) REFERENCES vino (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vino_comida ADD CONSTRAINT FK_3879CAED399E35A6 FOREIGN KEY (comida_id) REFERENCES Comida (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vino_variedad_uva ADD CONSTRAINT FK_2796718EE16856A6 FOREIGN KEY (vino_id) REFERENCES vino (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vino_variedad_uva ADD CONSTRAINT FK_2796718E89B8C561 FOREIGN KEY (variedad_uva_id) REFERENCES variedad_uva (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vino DROP FOREIGN KEY FK_E65EA138B1FDE9D');
        $this->addSql('ALTER TABLE vino DROP FOREIGN KEY FK_E65EA13BE73998A');
        $this->addSql('ALTER TABLE vino DROP FOREIGN KEY FK_E65EA13F2917706');
        $this->addSql('ALTER TABLE vino_comida DROP FOREIGN KEY FK_3879CAEDE16856A6');
        $this->addSql('ALTER TABLE vino_comida DROP FOREIGN KEY FK_3879CAED399E35A6');
        $this->addSql('ALTER TABLE vino_variedad_uva DROP FOREIGN KEY FK_2796718EE16856A6');
        $this->addSql('ALTER TABLE vino_variedad_uva DROP FOREIGN KEY FK_2796718E89B8C561');
        $this->addSql('DROP TABLE Bodega');
        $this->addSql('DROP TABLE Comida');
        $this->addSql('DROP TABLE denominacion_origen');
        $this->addSql('DROP TABLE tipo_vino');
        $this->addSql('DROP TABLE variedad_uva');
        $this->addSql('DROP TABLE vino');
        $this->addSql('DROP TABLE vino_comida');
        $this->addSql('DROP TABLE vino_variedad_uva');
    }
}
