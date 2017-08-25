<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170825101836 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, url VARCHAR(191) DEFAULT NULL, content LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_23A0E66F47645AE (url), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articleAuthor (articleId INT NOT NULL, authorId INT NOT NULL, INDEX IDX_478C4373FEA2A0EE (articleId), INDEX IDX_478C4373A196F9FD (authorId), PRIMARY KEY(articleId, authorId)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_hr (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articleAuthor ADD CONSTRAINT FK_478C4373FEA2A0EE FOREIGN KEY (articleId) REFERENCES article (id)');
        $this->addSql('ALTER TABLE articleAuthor ADD CONSTRAINT FK_478C4373A196F9FD FOREIGN KEY (authorId) REFERENCES author (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE articleAuthor DROP FOREIGN KEY FK_478C4373A196F9FD');
        $this->addSql('ALTER TABLE articleAuthor DROP FOREIGN KEY FK_478C4373FEA2A0EE');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE articleAuthor');
        $this->addSql('DROP TABLE user_hr');
    }
}
