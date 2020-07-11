<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200711025546 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE board_game CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE max_players max_players SMALLINT DEFAULT NULL, CHANGE min_players min_players SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE book CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE genre_id genre_id INT DEFAULT NULL, CHANGE series series VARCHAR(255) DEFAULT NULL, CHANGE isbn isbn VARCHAR(13) DEFAULT NULL, CHANGE language language VARCHAR(2) DEFAULT NULL');
        $this->addSql('ALTER TABLE collectible CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE external_link external_link VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE console CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE barcode barcode VARCHAR(13) DEFAULT NULL');
        $this->addSql('ALTER TABLE game CHANGE publisher_id publisher_id INT DEFAULT NULL, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE type_special_edition type_special_edition VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE manga CHANGE publisher_id publisher_id INT DEFAULT NULL, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE genre_id genre_id INT DEFAULT NULL, CHANGE volume volume SMALLINT DEFAULT NULL, CHANGE barcode barcode VARCHAR(13) DEFAULT NULL, CHANGE serie_name serie_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE movie CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE imdb_link imdb_link VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE publisher CHANGE country country VARCHAR(2) DEFAULT NULL');
        $this->addSql('ALTER TABLE serie CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE external_link external_link VARCHAR(255) DEFAULT NULL, CHANGE season season SMALLINT DEFAULT NULL, CHANGE episodes episodes SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD email VARCHAR(255) NOT NULL, ADD is_verified TINYINT(1) NOT NULL, CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE board_game CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE max_players max_players SMALLINT DEFAULT NULL, CHANGE min_players min_players SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE book CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE genre_id genre_id INT DEFAULT NULL, CHANGE series series VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE isbn isbn VARCHAR(13) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE language language VARCHAR(2) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE collectible CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE external_link external_link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE console CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE barcode barcode VARCHAR(13) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE game CHANGE publisher_id publisher_id INT DEFAULT NULL, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE type_special_edition type_special_edition VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE manga CHANGE publisher_id publisher_id INT DEFAULT NULL, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE genre_id genre_id INT DEFAULT NULL, CHANGE volume volume SMALLINT DEFAULT NULL, CHANGE barcode barcode VARCHAR(13) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE serie_name serie_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE movie CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE imdb_link imdb_link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE publisher CHANGE country country VARCHAR(2) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE serie CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE external_link external_link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE season season SMALLINT DEFAULT NULL, CHANGE episodes episodes SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP email, DROP is_verified, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
