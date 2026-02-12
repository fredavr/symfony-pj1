<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260212093305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_tag (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE articles ADD tag_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168BAD26311 FOREIGN KEY (tag_id) REFERENCES article_tag (id)');
        $this->addSql('CREATE INDEX IDX_BFDD3168BAD26311 ON articles (tag_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article_tag');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD3168BAD26311');
        $this->addSql('DROP INDEX IDX_BFDD3168BAD26311 ON articles');
        $this->addSql('ALTER TABLE articles DROP tag_id');
    }
}
