<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190429143400 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE music (id INT AUTO_INCREMENT NOT NULL, artist_id INT NOT NULL, title VARCHAR(255) NOT NULL, treble NUMERIC(2, 1) NOT NULL, bass NUMERIC(2, 1) NOT NULL, middle NUMERIC(2, 1) NOT NULL, gain NUMERIC(2, 1) NOT NULL, reverb NUMERIC(2, 1) NOT NULL, INDEX IDX_CD52224AB7970CF8 (artist_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_music (user_id INT NOT NULL, music_id INT NOT NULL, INDEX IDX_2F90D912A76ED395 (user_id), INDEX IDX_2F90D912399BBB13 (music_id), PRIMARY KEY(user_id, music_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ampli (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_2EB133944F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rank (id INT AUTO_INCREMENT NOT NULL, music_id INT NOT NULL, user_id INT NOT NULL, value SMALLINT NOT NULL, INDEX IDX_8879E8E5399BBB13 (music_id), INDEX IDX_8879E8E5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, music_id INT NOT NULL, user_id INT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_9474526C399BBB13 (music_id), INDEX IDX_9474526CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE setting (id INT AUTO_INCREMENT NOT NULL, music_id INT NOT NULL, ampli_id INT NOT NULL, property VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_9F74B898399BBB13 (music_id), INDEX IDX_9F74B8981BCC614F (ampli_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE music ADD CONSTRAINT FK_CD52224AB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('ALTER TABLE user_music ADD CONSTRAINT FK_2F90D912A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_music ADD CONSTRAINT FK_2F90D912399BBB13 FOREIGN KEY (music_id) REFERENCES music (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ampli ADD CONSTRAINT FK_2EB133944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE rank ADD CONSTRAINT FK_8879E8E5399BBB13 FOREIGN KEY (music_id) REFERENCES music (id)');
        $this->addSql('ALTER TABLE rank ADD CONSTRAINT FK_8879E8E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C399BBB13 FOREIGN KEY (music_id) REFERENCES music (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE setting ADD CONSTRAINT FK_9F74B898399BBB13 FOREIGN KEY (music_id) REFERENCES music (id)');
        $this->addSql('ALTER TABLE setting ADD CONSTRAINT FK_9F74B8981BCC614F FOREIGN KEY (ampli_id) REFERENCES ampli (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_music DROP FOREIGN KEY FK_2F90D912399BBB13');
        $this->addSql('ALTER TABLE rank DROP FOREIGN KEY FK_8879E8E5399BBB13');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C399BBB13');
        $this->addSql('ALTER TABLE setting DROP FOREIGN KEY FK_9F74B898399BBB13');
        $this->addSql('ALTER TABLE user_music DROP FOREIGN KEY FK_2F90D912A76ED395');
        $this->addSql('ALTER TABLE rank DROP FOREIGN KEY FK_8879E8E5A76ED395');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE setting DROP FOREIGN KEY FK_9F74B8981BCC614F');
        $this->addSql('ALTER TABLE music DROP FOREIGN KEY FK_CD52224AB7970CF8');
        $this->addSql('ALTER TABLE ampli DROP FOREIGN KEY FK_2EB133944F5D008');
        $this->addSql('DROP TABLE music');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_music');
        $this->addSql('DROP TABLE ampli');
        $this->addSql('DROP TABLE rank');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE setting');
        $this->addSql('DROP TABLE brand');
    }
}
