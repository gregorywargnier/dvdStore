<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220201125127 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dvd (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(180) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price NUMERIC(10, 0) NOT NULL, stock INT DEFAULT NULL, INDEX IDX_8325C1DF12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE format (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE format_dvd (format_id INT NOT NULL, dvd_id INT NOT NULL, INDEX IDX_984D7435D629F605 (format_id), INDEX IDX_984D7435797185F6 (dvd_id), PRIMARY KEY(format_id, dvd_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(80) NOT NULL, last_name VARCHAR(80) NOT NULL, adress VARCHAR(90) NOT NULL, additional_address VARCHAR(80) DEFAULT NULL, city VARCHAR(80) NOT NULL, postal_code VARCHAR(10) NOT NULL, phone VARCHAR(10) NOT NULL, token VARCHAR(255) DEFAULT NULL, token_expire DATETIME DEFAULT NULL, enabled TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dvd ADD CONSTRAINT FK_8325C1DF12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE format_dvd ADD CONSTRAINT FK_984D7435D629F605 FOREIGN KEY (format_id) REFERENCES format (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE format_dvd ADD CONSTRAINT FK_984D7435797185F6 FOREIGN KEY (dvd_id) REFERENCES dvd (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dvd DROP FOREIGN KEY FK_8325C1DF12469DE2');
        $this->addSql('ALTER TABLE format_dvd DROP FOREIGN KEY FK_984D7435797185F6');
        $this->addSql('ALTER TABLE format_dvd DROP FOREIGN KEY FK_984D7435D629F605');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE dvd');
        $this->addSql('DROP TABLE format');
        $this->addSql('DROP TABLE format_dvd');
        $this->addSql('DROP TABLE user');
    }
}
