<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260212092754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE articles ADD categoty_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD31689D066842 FOREIGN KEY (categoty_id) REFERENCES article_category (id)');
        $this->addSql('CREATE INDEX IDX_BFDD31689D066842 ON articles (categoty_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article_category');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD31689D066842');
        $this->addSql('DROP INDEX IDX_BFDD31689D066842 ON articles');
        $this->addSql('ALTER TABLE articles DROP categoty_id');
    }
}
