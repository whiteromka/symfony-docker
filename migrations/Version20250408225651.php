<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250408225651 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $sql = <<<'SQL'
            insert into "user" (id ,name, last_name, email, phone, password, roles, status)
            values (nextval('user_id_seq'),
                    'Rom',
                    'Belov',
                    'rom@rom.ru',
                    '89998887766',
                    'abc',
                    '["admin", "user"]'::jsonb,
                    1);
        SQL;
        $this->addSql($sql);
    }

    public function down(Schema $schema): void
    {
    }
}
