<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200710211838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331339F7A5C');
        $this->addSql('DROP INDEX IDX_CBE5A331339F7A5C ON book');
        $this->addSql('ALTER TABLE book CHANGE condition_id_id condition_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331887793B6 FOREIGN KEY (condition_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331887793B6 ON book (condition_id)');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C339F7A5C');
        $this->addSql('DROP INDEX IDX_232B318C339F7A5C ON game');
        $this->addSql('ALTER TABLE game CHANGE condition_id_id condition_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C887793B6 FOREIGN KEY (condition_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_232B318C887793B6 ON game (condition_id)');
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F339F7A5C');
        $this->addSql('DROP INDEX IDX_1D5EF26F339F7A5C ON movie');
        $this->addSql('ALTER TABLE movie CHANGE condition_id_id condition_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F887793B6 FOREIGN KEY (condition_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_1D5EF26F887793B6 ON movie (condition_id)');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A9334339F7A5C');
        $this->addSql('DROP INDEX IDX_AA3A9334339F7A5C ON serie');
        $this->addSql('ALTER TABLE serie CHANGE condition_id_id condition_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334887793B6 FOREIGN KEY (condition_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_AA3A9334887793B6 ON serie (condition_id)');
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB6339F7A5C');
        $this->addSql('DROP INDEX IDX_3603CFB6339F7A5C ON console');
        $this->addSql('ALTER TABLE console CHANGE condition_id_id condition_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6887793B6 FOREIGN KEY (condition_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_3603CFB6887793B6 ON console (condition_id)');
        $this->addSql('ALTER TABLE board_game DROP FOREIGN KEY FK_F9BD68AF339F7A5C');
        $this->addSql('DROP INDEX IDX_F9BD68AF339F7A5C ON board_game');
        $this->addSql('ALTER TABLE board_game CHANGE condition_id_id condition_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE board_game ADD CONSTRAINT FK_F9BD68AF887793B6 FOREIGN KEY (condition_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_F9BD68AF887793B6 ON board_game (condition_id)');
        $this->addSql('ALTER TABLE manga DROP FOREIGN KEY FK_765A9E03339F7A5C');
        $this->addSql('DROP INDEX IDX_765A9E03339F7A5C ON manga');
        $this->addSql('ALTER TABLE manga CHANGE condition_id_id condition_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE manga ADD CONSTRAINT FK_765A9E03887793B6 FOREIGN KEY (condition_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_765A9E03887793B6 ON manga (condition_id)');
        $this->addSql('ALTER TABLE collectible DROP FOREIGN KEY FK_1D1F976E339F7A5C');
        $this->addSql('DROP INDEX IDX_1D1F976E339F7A5C ON collectible');
        $this->addSql('ALTER TABLE collectible CHANGE condition_id_id condition_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE collectible ADD CONSTRAINT FK_1D1F976E887793B6 FOREIGN KEY (condition_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_1D1F976E887793B6 ON collectible (condition_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE board_game DROP FOREIGN KEY FK_F9BD68AF887793B6');
        $this->addSql('DROP INDEX IDX_F9BD68AF887793B6 ON board_game');
        $this->addSql('ALTER TABLE board_game CHANGE condition_id condition_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE board_game ADD CONSTRAINT FK_F9BD68AF339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_F9BD68AF339F7A5C ON board_game (condition_id_id)');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331887793B6');
        $this->addSql('DROP INDEX IDX_CBE5A331887793B6 ON book');
        $this->addSql('ALTER TABLE book CHANGE condition_id condition_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331339F7A5C ON book (condition_id_id)');
        $this->addSql('ALTER TABLE collectible DROP FOREIGN KEY FK_1D1F976E887793B6');
        $this->addSql('DROP INDEX IDX_1D1F976E887793B6 ON collectible');
        $this->addSql('ALTER TABLE collectible CHANGE condition_id condition_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE collectible ADD CONSTRAINT FK_1D1F976E339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_1D1F976E339F7A5C ON collectible (condition_id_id)');
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB6887793B6');
        $this->addSql('DROP INDEX IDX_3603CFB6887793B6 ON console');
        $this->addSql('ALTER TABLE console CHANGE condition_id condition_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_3603CFB6339F7A5C ON console (condition_id_id)');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C887793B6');
        $this->addSql('DROP INDEX IDX_232B318C887793B6 ON game');
        $this->addSql('ALTER TABLE game CHANGE condition_id condition_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_232B318C339F7A5C ON game (condition_id_id)');
        $this->addSql('ALTER TABLE manga DROP FOREIGN KEY FK_765A9E03887793B6');
        $this->addSql('DROP INDEX IDX_765A9E03887793B6 ON manga');
        $this->addSql('ALTER TABLE manga CHANGE condition_id condition_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE manga ADD CONSTRAINT FK_765A9E03339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_765A9E03339F7A5C ON manga (condition_id_id)');
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F887793B6');
        $this->addSql('DROP INDEX IDX_1D5EF26F887793B6 ON movie');
        $this->addSql('ALTER TABLE movie CHANGE condition_id condition_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_1D5EF26F339F7A5C ON movie (condition_id_id)');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A9334887793B6');
        $this->addSql('DROP INDEX IDX_AA3A9334887793B6 ON serie');
        $this->addSql('ALTER TABLE serie CHANGE condition_id condition_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334339F7A5C FOREIGN KEY (condition_id_id) REFERENCES `condition` (id)');
        $this->addSql('CREATE INDEX IDX_AA3A9334339F7A5C ON serie (condition_id_id)');
    }
}
