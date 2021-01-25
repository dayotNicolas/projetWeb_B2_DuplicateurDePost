<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210119080646 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE social_network (id INT AUTO_INCREMENT NOT NULL, network_id INT NOT NULL, network_name VARCHAR(255) NOT NULL, network_login VARCHAR(255) NOT NULL, network_password VARCHAR(255) NOT NULL, INDEX IDX_EFFF522134128B91 (network_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE social_network ADD CONSTRAINT FK_EFFF522134128B91 FOREIGN KEY (network_id) REFERENCES users (id)');
        $this->addSql('DROP TABLE facebook');
        $this->addSql('DROP TABLE instagram');
        $this->addSql('DROP TABLE linked_in');
        $this->addSql('DROP TABLE twitter');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facebook (id INT AUTO_INCREMENT NOT NULL, usermail_id INT NOT NULL, facebook_login VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, facebook_password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_6B74C8E0541693BF (usermail_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE instagram (id INT AUTO_INCREMENT NOT NULL, usermail_id INT NOT NULL, instagram_login VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, instagram_password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_84A87EC3541693BF (usermail_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE linked_in (id INT AUTO_INCREMENT NOT NULL, usermail_id INT NOT NULL, linked_in_login VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, linked_in_password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_B60378FA541693BF (usermail_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE twitter (id INT AUTO_INCREMENT NOT NULL, usermail_id INT NOT NULL, twitter_login VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, twitter_password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_166A7BB6541693BF (usermail_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE facebook ADD CONSTRAINT FK_6B74C8E0541693BF FOREIGN KEY (usermail_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE instagram ADD CONSTRAINT FK_84A87EC3541693BF FOREIGN KEY (usermail_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE linked_in ADD CONSTRAINT FK_B60378FA541693BF FOREIGN KEY (usermail_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE twitter ADD CONSTRAINT FK_166A7BB6541693BF FOREIGN KEY (usermail_id) REFERENCES users (id)');
        $this->addSql('DROP TABLE social_network');
    }
}
