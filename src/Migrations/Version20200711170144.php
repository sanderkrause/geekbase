<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200711170144 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE board_game ADD user_id INT NOT NULL, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE max_players max_players SMALLINT DEFAULT NULL, CHANGE min_players min_players SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE board_game ADD CONSTRAINT FK_F9BD68AFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F9BD68AFA76ED395 ON board_game (user_id)');
        $this->addSql('ALTER TABLE book ADD user_id INT NOT NULL, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE genre_id genre_id INT DEFAULT NULL, CHANGE series series VARCHAR(255) DEFAULT NULL, CHANGE isbn isbn VARCHAR(13) DEFAULT NULL, CHANGE language language VARCHAR(2) DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331A76ED395 ON book (user_id)');
        $this->addSql('ALTER TABLE collectible ADD user_id INT NOT NULL, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE external_link external_link VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE collectible ADD CONSTRAINT FK_1D1F976EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1D1F976EA76ED395 ON collectible (user_id)');
        $this->addSql('ALTER TABLE console ADD user_id INT NOT NULL, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE barcode barcode VARCHAR(13) DEFAULT NULL');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3603CFB6A76ED395 ON console (user_id)');
        $this->addSql('ALTER TABLE game ADD user_id INT NOT NULL, CHANGE publisher_id publisher_id INT DEFAULT NULL, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE type_special_edition type_special_edition VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_232B318CA76ED395 ON game (user_id)');
        $this->addSql('ALTER TABLE manga ADD user_id INT NOT NULL, CHANGE publisher_id publisher_id INT DEFAULT NULL, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE genre_id genre_id INT DEFAULT NULL, CHANGE volume volume SMALLINT DEFAULT NULL, CHANGE barcode barcode VARCHAR(13) DEFAULT NULL, CHANGE serie_name serie_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE manga ADD CONSTRAINT FK_765A9E03A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_765A9E03A76ED395 ON manga (user_id)');
        $this->addSql('ALTER TABLE movie ADD user_id INT NOT NULL, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE imdb_link imdb_link VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1D5EF26FA76ED395 ON movie (user_id)');
        $this->addSql('ALTER TABLE publisher CHANGE country country VARCHAR(2) DEFAULT NULL');
        $this->addSql('ALTER TABLE serie ADD user_id INT NOT NULL, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE external_link external_link VARCHAR(255) DEFAULT NULL, CHANGE season season SMALLINT DEFAULT NULL, CHANGE episodes episodes SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_AA3A9334A76ED395 ON serie (user_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE board_game DROP FOREIGN KEY FK_F9BD68AFA76ED395');
        $this->addSql('DROP INDEX IDX_F9BD68AFA76ED395 ON board_game');
        $this->addSql('ALTER TABLE board_game DROP user_id, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE max_players max_players SMALLINT DEFAULT NULL, CHANGE min_players min_players SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331A76ED395');
        $this->addSql('DROP INDEX IDX_CBE5A331A76ED395 ON book');
        $this->addSql('ALTER TABLE book DROP user_id, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE genre_id genre_id INT DEFAULT NULL, CHANGE series series VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE isbn isbn VARCHAR(13) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE language language VARCHAR(2) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE collectible DROP FOREIGN KEY FK_1D1F976EA76ED395');
        $this->addSql('DROP INDEX IDX_1D1F976EA76ED395 ON collectible');
        $this->addSql('ALTER TABLE collectible DROP user_id, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE external_link external_link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB6A76ED395');
        $this->addSql('DROP INDEX IDX_3603CFB6A76ED395 ON console');
        $this->addSql('ALTER TABLE console DROP user_id, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE barcode barcode VARCHAR(13) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CA76ED395');
        $this->addSql('DROP INDEX IDX_232B318CA76ED395 ON game');
        $this->addSql('ALTER TABLE game DROP user_id, CHANGE publisher_id publisher_id INT DEFAULT NULL, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE type_special_edition type_special_edition VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE manga DROP FOREIGN KEY FK_765A9E03A76ED395');
        $this->addSql('DROP INDEX IDX_765A9E03A76ED395 ON manga');
        $this->addSql('ALTER TABLE manga DROP user_id, CHANGE publisher_id publisher_id INT DEFAULT NULL, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE genre_id genre_id INT DEFAULT NULL, CHANGE volume volume SMALLINT DEFAULT NULL, CHANGE barcode barcode VARCHAR(13) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE serie_name serie_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26FA76ED395');
        $this->addSql('DROP INDEX IDX_1D5EF26FA76ED395 ON movie');
        $this->addSql('ALTER TABLE movie DROP user_id, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE imdb_link imdb_link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE publisher CHANGE country country VARCHAR(2) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A9334A76ED395');
        $this->addSql('DROP INDEX IDX_AA3A9334A76ED395 ON serie');
        $this->addSql('ALTER TABLE serie DROP user_id, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE external_link external_link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE season season SMALLINT DEFAULT NULL, CHANGE episodes episodes SMALLINT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
