<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231030210606 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clientes (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, apellido VARCHAR(255) NOT NULL, dni VARCHAR(9) NOT NULL, email VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clientes_maquinas (clientes_id INT NOT NULL, maquinas_id INT NOT NULL, INDEX IDX_2F6091B0FBC3AF09 (clientes_id), INDEX IDX_2F6091B0A582674E (maquinas_id), PRIMARY KEY(clientes_id, maquinas_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maquinas (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, tipo INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recaudaciones (id INT AUTO_INCREMENT NOT NULL, maquina_id INT NOT NULL, fecha DATE NOT NULL, cantidad INT NOT NULL, UNIQUE INDEX UNIQ_BBA2B27B41420729 (maquina_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE videos (id INT AUTO_INCREMENT NOT NULL, maquina_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, duracion TIME NOT NULL, INDEX IDX_29AA643241420729 (maquina_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clientes_maquinas ADD CONSTRAINT FK_2F6091B0FBC3AF09 FOREIGN KEY (clientes_id) REFERENCES clientes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE clientes_maquinas ADD CONSTRAINT FK_2F6091B0A582674E FOREIGN KEY (maquinas_id) REFERENCES maquinas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recaudaciones ADD CONSTRAINT FK_BBA2B27B41420729 FOREIGN KEY (maquina_id) REFERENCES maquinas (id)');
        $this->addSql('ALTER TABLE videos ADD CONSTRAINT FK_29AA643241420729 FOREIGN KEY (maquina_id) REFERENCES maquinas (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clientes_maquinas DROP FOREIGN KEY FK_2F6091B0FBC3AF09');
        $this->addSql('ALTER TABLE clientes_maquinas DROP FOREIGN KEY FK_2F6091B0A582674E');
        $this->addSql('ALTER TABLE recaudaciones DROP FOREIGN KEY FK_BBA2B27B41420729');
        $this->addSql('ALTER TABLE videos DROP FOREIGN KEY FK_29AA643241420729');
        $this->addSql('DROP TABLE clientes');
        $this->addSql('DROP TABLE clientes_maquinas');
        $this->addSql('DROP TABLE maquinas');
        $this->addSql('DROP TABLE recaudaciones');
        $this->addSql('DROP TABLE videos');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
