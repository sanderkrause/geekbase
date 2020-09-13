<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200912232739 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $table = $schema->createTable('rememberme_token');
        $table->addColumn('series', Types::STRING, ['length' => 88]);
        $table->addColumn('value', Types::STRING, ['length' => 88]);
        $table->addColumn('lastUsed', Types::DATETIME_IMMUTABLE);
        $table->addColumn('class', Types::STRING, ['length' => 100]);
        $table->addColumn('username', Types::STRING, ['length' => 200]);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('rememberme_token');
    }
}
