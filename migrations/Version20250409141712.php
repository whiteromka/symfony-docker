<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250409141712 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            CREATE SEQUENCE question_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        SQL);

        $this->addSql(<<<'SQL'
            CREATE SEQUENCE question_history_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        SQL);

        $this->addSql(<<<'SQL'
            CREATE TABLE question (
            id INT NOT NULL, title VARCHAR(255) NOT NULL,
            text TEXT DEFAULT NULL,
            difficulty INT DEFAULT 5 NOT NULL,
            category TEXT DEFAULT 'common',
            status INT DEFAULT 1 NOT NULL,
            created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL,
            PRIMARY KEY(id))
        SQL);

        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN question.created_at IS '(DC2Type:datetime_immutable)'
        SQL);

        $this->addSql(<<<'SQL'
            CREATE TABLE question_history (
            id INT NOT NULL,
            question_id INT NOT NULL,
            last_time_showed TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
            PRIMARY KEY(id))
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            DROP SEQUENCE question_id_seq CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP SEQUENCE question_history_id_seq CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE question
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE question_history
        SQL);
    }
}
