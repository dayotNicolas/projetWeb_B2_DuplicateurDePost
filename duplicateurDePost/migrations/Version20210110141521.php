<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210110141521 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE facebook_ids');
        $this->addSql('DROP TABLE instagram_ids');
        $this->addSql('DROP TABLE linked_in_ids');
        $this->addSql('DROP TABLE twitter_ids');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facebook_ids (id INT AUTO_INCREMENT NOT NULL, facebook_login_id INT DEFAULT NULL, facebook_passwd VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_E5413C809B1373F5 (facebook_login_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE instagram_ids (id INT AUTO_INCREMENT NOT NULL, instagram_login_id INT DEFAULT NULL, instagram_passwd VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_8B2DCB08BB87D2D5 (instagram_login_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE linked_in_ids (id INT AUTO_INCREMENT NOT NULL, linked_in_login_id INT DEFAULT NULL, linked_in_passwd VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_87A73433F3648CE9 (linked_in_login_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE twitter_ids (id INT AUTO_INCREMENT NOT NULL, twitter_login_id INT DEFAULT NULL, twitter_passwd VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_36CA1EE9427F63C1 (twitter_login_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE facebook_ids ADD CONSTRAINT FK_E5413C809B1373F5 FOREIGN KEY (facebook_login_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE instagram_ids ADD CONSTRAINT FK_8B2DCB08BB87D2D5 FOREIGN KEY (instagram_login_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE linked_in_ids ADD CONSTRAINT FK_87A73433F3648CE9 FOREIGN KEY (linked_in_login_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE twitter_ids ADD CONSTRAINT FK_36CA1EE9427F63C1 FOREIGN KEY (twitter_login_id) REFERENCES users (id)');
    }
}
