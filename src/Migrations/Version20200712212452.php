<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200712212452 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE privacy_setting (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, share_board_game TINYINT(1) NOT NULL, share_book TINYINT(1) NOT NULL, share_collectible TINYINT(1) NOT NULL, share_console TINYINT(1) NOT NULL, share_game TINYINT(1) NOT NULL, share_manga TINYINT(1) NOT NULL, share_movie TINYINT(1) NOT NULL, share_serie TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_E10B5F88A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE privacy_setting ADD CONSTRAINT FK_E10B5F88A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE privacy_setting');
    }
}
