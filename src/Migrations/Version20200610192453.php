<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200610192453 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__task AS SELECT id, created_at, updated_at, title, description, status FROM task');
        $this->addSql('DROP TABLE task');
        $this->addSql('CREATE TABLE task (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, created_at DATETIME NOT NULL, title VARCHAR(150) NOT NULL COLLATE BINARY, description CLOB DEFAULT NULL COLLATE BINARY, status VARCHAR(50) NOT NULL COLLATE BINARY, updated_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO task (id, created_at, updated_at, title, description, status) SELECT id, created_at, updated_at, title, description, status FROM __temp__task');
        $this->addSql('DROP TABLE __temp__task');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__task AS SELECT id, created_at, updated_at, title, description, status FROM task');
        $this->addSql('DROP TABLE task');
        $this->addSql('CREATE TABLE task (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, created_at DATETIME NOT NULL, title VARCHAR(150) NOT NULL, description CLOB DEFAULT NULL, status VARCHAR(50) NOT NULL, updated_at DATETIME NOT NULL)');
        $this->addSql('INSERT INTO task (id, created_at, updated_at, title, description, status) SELECT id, created_at, updated_at, title, description, status FROM __temp__task');
        $this->addSql('DROP TABLE __temp__task');
    }
}
