<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240106105422 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vino_variedad_uva (vino_id INT NOT NULL, variedad_uva_id INT NOT NULL, INDEX IDX_2796718EE16856A6 (vino_id), INDEX IDX_2796718E89B8C561 (variedad_uva_id), PRIMARY KEY(vino_id, variedad_uva_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vino_variedad_uva ADD CONSTRAINT FK_2796718EE16856A6 FOREIGN KEY (vino_id) REFERENCES vino (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vino_variedad_uva ADD CONSTRAINT FK_2796718E89B8C561 FOREIGN KEY (variedad_uva_id) REFERENCES variedad_uva (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vino DROP variedad_uva');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vino_variedad_uva DROP FOREIGN KEY FK_2796718EE16856A6');
        $this->addSql('ALTER TABLE vino_variedad_uva DROP FOREIGN KEY FK_2796718E89B8C561');
        $this->addSql('DROP TABLE vino_variedad_uva');
        $this->addSql('ALTER TABLE vino ADD variedad_uva VARCHAR(255) DEFAULT NULL');
    }
}
