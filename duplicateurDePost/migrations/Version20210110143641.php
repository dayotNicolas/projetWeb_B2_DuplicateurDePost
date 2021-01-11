<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210110143641 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facebook (id INT AUTO_INCREMENT NOT NULL, usermail_id INT NOT NULL, facebook_login VARCHAR(255) NOT NULL, facebook_password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6B74C8E0541693BF (usermail_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE facebook ADD CONSTRAINT FK_6B74C8E0541693BF FOREIGN KEY (usermail_id) REFERENCES users (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE facebook');
    }
}
