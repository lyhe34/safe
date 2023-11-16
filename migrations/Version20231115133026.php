<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231115133026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE directory (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, directory_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, INDEX IDX_467844DA7E3C61F9 (owner_id), INDEX IDX_467844DA2C94069F (directory_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, directory_id INT NOT NULL, name VARCHAR(255) NOT NULL, extension VARCHAR(8) NOT NULL, path VARCHAR(255) NOT NULL, INDEX IDX_8C9F36107E3C61F9 (owner_id), INDEX IDX_8C9F36102C94069F (directory_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE directory ADD CONSTRAINT FK_467844DA7E3C61F9 FOREIGN KEY (owner_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE directory ADD CONSTRAINT FK_467844DA2C94069F FOREIGN KEY (directory_id) REFERENCES directory (id)');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F36107E3C61F9 FOREIGN KEY (owner_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F36102C94069F FOREIGN KEY (directory_id) REFERENCES directory (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE directory DROP FOREIGN KEY FK_467844DA7E3C61F9');
        $this->addSql('ALTER TABLE directory DROP FOREIGN KEY FK_467844DA2C94069F');
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F36107E3C61F9');
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F36102C94069F');
        $this->addSql('DROP TABLE directory');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
