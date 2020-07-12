<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200710184228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `condition` (`id` INT AUTO_INCREMENT NOT NULL, `name` VARCHAR(255), PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, publisher_id INT NOT NULL, condition_id_id INT DEFAULT NULL, genre_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, series VARCHAR(255) DEFAULT NULL, isbn VARCHAR(13) DEFAULT NULL, language VARCHAR(2) DEFAULT NULL, INDEX IDX_CBE5A33140C86FCE (publisher_id), INDEX IDX_CBE5A331339F7A5C (condition_id_id), INDEX IDX_CBE5A3314296D31F (genre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, publisher_id INT DEFAULT NULL, condition_id_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, publishing_date DATE NOT NULL, special_edition TINYINT(1) NOT NULL, type_special_edition VARCHAR(255) DEFAULT NULL, INDEX IDX_232B318C40C86FCE (publisher_id), INDEX IDX_232B318C339F7A5C (condition_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_genre (game_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_B1634A77E48FD905 (game_id), INDEX IDX_B1634A774296D31F (genre_id), PRIMARY KEY(game_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_platform (game_id INT NOT NULL, platform_id INT NOT NULL, INDEX IDX_92162FEDE48FD905 (game_id), INDEX IDX_92162FEDFFE6496F (platform_id), PRIMARY KEY(game_id, platform_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, condition_id_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, release_year SMALLINT NOT NULL, imdb_link VARCHAR(255) DEFAULT NULL, INDEX IDX_1D5EF26F339F7A5C (condition_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_genre (movie_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_FD1229648F93B6FC (movie_id), INDEX IDX_FD1229644296D31F (genre_id), PRIMARY KEY(movie_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT AUTO_INCREMENT NOT NULL, condition_id_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, external_link VARCHAR(255) DEFAULT NULL, season SMALLINT DEFAULT NULL, episodes SMALLINT DEFAULT NULL, INDEX IDX_AA3A9334339F7A5C (condition_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie_genre (serie_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_4B5C076CD94388BD (serie_id), INDEX IDX_4B5C076C4296D31F (genre_id), PRIMARY KEY(serie_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE collectible_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platform (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publisher (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, country VARCHAR(2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE console (id INT AUTO_INCREMENT NOT NULL, condition_id_id INT DEFAULT NULL, brand VARCHAR(255) NOT NULL, ports VARCHAR(255) NOT NULL, rooted TINYINT(1) NOT NULL, working TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, barcode VARCHAR(13) DEFAULT NULL, INDEX IDX_3603CFB6339F7A5C (condition_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE board_game (id INT AUTO_INCREMENT NOT NULL, condition_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, max_players SMALLINT DEFAULT NULL, min_players SMALLINT DEFAULT NULL, INDEX IDX_F9BD68AF339F7A5C (condition_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manga (id INT AUTO_INCREMENT NOT NULL, publisher_id INT DEFAULT NULL, condition_id_id INT DEFAULT NULL, genre_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, volume SMALLINT DEFAULT NULL, barcode VARCHAR(13) DEFAULT NULL, serie_name VARCHAR(255) DEFAULT NULL, INDEX IDX_765A9E0340C86FCE (publisher_id), INDEX IDX_765A9E03339F7A5C (condition_id_id), INDEX IDX_765A9E034296D31F (genre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE collectible (id INT AUTO_INCREMENT NOT NULL, condition_id_id INT DEFAULT NULL, external_link VARCHAR(255) DEFAULT NULL, boxed TINYINT(1) NOT NULL, INDEX IDX_1D1F976E339F7A5C (condition_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE collectible_collectible_type (collectible_id INT NOT NULL, collectible_type_id INT NOT NULL, INDEX IDX_22F95E849700322F (collectible_id), INDEX IDX_22F95E8434FA74A8 (collectible_type_id), PRIMARY KEY(collectible_id, collectible_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33140C86FCE FOREIGN KEY (publisher_id) REFERENCES publisher (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3314296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C40C86FCE FOREIGN KEY (publisher_id) REFERENCES publisher (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('ALTER TABLE game_genre ADD CONSTRAINT FK_B1634A77E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_genre ADD CONSTRAINT FK_B1634A774296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_platform ADD CONSTRAINT FK_92162FEDE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_platform ADD CONSTRAINT FK_92162FEDFFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('ALTER TABLE movie_genre ADD CONSTRAINT FK_FD1229648F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_genre ADD CONSTRAINT FK_FD1229644296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('ALTER TABLE serie_genre ADD CONSTRAINT FK_4B5C076CD94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie_genre ADD CONSTRAINT FK_4B5C076C4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('ALTER TABLE board_game ADD CONSTRAINT FK_F9BD68AF339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('ALTER TABLE manga ADD CONSTRAINT FK_765A9E0340C86FCE FOREIGN KEY (publisher_id) REFERENCES publisher (id)');
        $this->addSql('ALTER TABLE manga ADD CONSTRAINT FK_765A9E03339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('ALTER TABLE manga ADD CONSTRAINT FK_765A9E034296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE collectible ADD CONSTRAINT FK_1D1F976E339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('ALTER TABLE collectible_collectible_type ADD CONSTRAINT FK_22F95E849700322F FOREIGN KEY (collectible_id) REFERENCES collectible (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE collectible_collectible_type ADD CONSTRAINT FK_22F95E8434FA74A8 FOREIGN KEY (collectible_type_id) REFERENCES collectible_type (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE game_genre DROP FOREIGN KEY FK_B1634A77E48FD905');
        $this->addSql('ALTER TABLE game_platform DROP FOREIGN KEY FK_92162FEDE48FD905');
        $this->addSql('ALTER TABLE movie_genre DROP FOREIGN KEY FK_FD1229648F93B6FC');
        $this->addSql('ALTER TABLE serie_genre DROP FOREIGN KEY FK_4B5C076CD94388BD');
        $this->addSql('ALTER TABLE collectible_collectible_type DROP FOREIGN KEY FK_22F95E8434FA74A8');
        $this->addSql('ALTER TABLE game_platform DROP FOREIGN KEY FK_92162FEDFFE6496F');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A33140C86FCE');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C40C86FCE');
        $this->addSql('ALTER TABLE manga DROP FOREIGN KEY FK_765A9E0340C86FCE');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3314296D31F');
        $this->addSql('ALTER TABLE game_genre DROP FOREIGN KEY FK_B1634A774296D31F');
        $this->addSql('ALTER TABLE movie_genre DROP FOREIGN KEY FK_FD1229644296D31F');
        $this->addSql('ALTER TABLE serie_genre DROP FOREIGN KEY FK_4B5C076C4296D31F');
        $this->addSql('ALTER TABLE manga DROP FOREIGN KEY FK_765A9E034296D31F');
        $this->addSql('ALTER TABLE collectible_collectible_type DROP FOREIGN KEY FK_22F95E849700322F');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE game_genre');
        $this->addSql('DROP TABLE game_platform');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE movie_genre');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP TABLE serie_genre');
        $this->addSql('DROP TABLE collectible_type');
        $this->addSql('DROP TABLE platform');
        $this->addSql('DROP TABLE publisher');
        $this->addSql('DROP TABLE console');
        $this->addSql('DROP TABLE board_game');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE manga');
        $this->addSql('DROP TABLE collectible');
        $this->addSql('DROP TABLE collectible_collectible_type');
    }
}
