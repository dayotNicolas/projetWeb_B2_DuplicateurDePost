<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210106083338 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facebook_ids (id INT AUTO_INCREMENT NOT NULL, facebook_login_id INT DEFAULT NULL, facebook_passwd VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E5413C809B1373F5 (facebook_login_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instagram_ids (id INT AUTO_INCREMENT NOT NULL, instagram_login_id INT DEFAULT NULL, instagram_passwd VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8B2DCB08BB87D2D5 (instagram_login_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE linked_in_ids (id INT AUTO_INCREMENT NOT NULL, linked_in_login_id INT DEFAULT NULL, linked_in_passwd VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_87A73433F3648CE9 (linked_in_login_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, titre VARCHAR(255) NOT NULL, message LONGTEXT DEFAULT NULL, url_photo_post VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_5A8A6C8DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE twitter_ids (id INT AUTO_INCREMENT NOT NULL, twitter_login_id INT DEFAULT NULL, twitter_passwd VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_36CA1EE9427F63C1 (twitter_login_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, photo_url VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, birth_date DATETIME DEFAULT NULL, city VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, instagram_login VARCHAR(255) DEFAULT NULL, facebook_login VARCHAR(255) DEFAULT NULL, twitter_login VARCHAR(255) DEFAULT NULL, linked_in_login VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE facebook_ids ADD CONSTRAINT FK_E5413C809B1373F5 FOREIGN KEY (facebook_login_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE instagram_ids ADD CONSTRAINT FK_8B2DCB08BB87D2D5 FOREIGN KEY (instagram_login_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE linked_in_ids ADD CONSTRAINT FK_87A73433F3648CE9 FOREIGN KEY (linked_in_login_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE twitter_ids ADD CONSTRAINT FK_36CA1EE9427F63C1 FOREIGN KEY (twitter_login_id) REFERENCES users (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facebook_ids DROP FOREIGN KEY FK_E5413C809B1373F5');
        $this->addSql('ALTER TABLE instagram_ids DROP FOREIGN KEY FK_8B2DCB08BB87D2D5');
        $this->addSql('ALTER TABLE linked_in_ids DROP FOREIGN KEY FK_87A73433F3648CE9');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DA76ED395');
        $this->addSql('ALTER TABLE twitter_ids DROP FOREIGN KEY FK_36CA1EE9427F63C1');
        $this->addSql('DROP TABLE facebook_ids');
        $this->addSql('DROP TABLE instagram_ids');
        $this->addSql('DROP TABLE linked_in_ids');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE twitter_ids');
        $this->addSql('DROP TABLE users');
    }
}
