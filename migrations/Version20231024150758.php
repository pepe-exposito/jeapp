<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231024150758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE maquinas_clientes (maquinas_id INT NOT NULL, clientes_id INT NOT NULL, INDEX IDX_B2E08B01A582674E (maquinas_id), INDEX IDX_B2E08B01FBC3AF09 (clientes_id), PRIMARY KEY(maquinas_id, clientes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE maquinas_clientes ADD CONSTRAINT FK_B2E08B01A582674E FOREIGN KEY (maquinas_id) REFERENCES maquinas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE maquinas_clientes ADD CONSTRAINT FK_B2E08B01FBC3AF09 FOREIGN KEY (clientes_id) REFERENCES clientes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE maquinas_clientes DROP FOREIGN KEY FK_B2E08B01A582674E');
        $this->addSql('ALTER TABLE maquinas_clientes DROP FOREIGN KEY FK_B2E08B01FBC3AF09');
        $this->addSql('DROP TABLE maquinas_clientes');
    }
}
