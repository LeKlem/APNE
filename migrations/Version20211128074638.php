<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211128074638 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact_ticket (id INT AUTO_INCREMENT NOT NULL, admin_id_id INT NOT NULL, author_id_id INT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, date DATE NOT NULL, INDEX IDX_7329A2269CCBE9A (author_id_id), INDEX IDX_7329A22DF6E65AD (admin_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, state_id INT NOT NULL, adress VARCHAR(255) NOT NULL, additionnal_adress VARCHAR(255) DEFAULT NULL, postal_code INT NOT NULL, city VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_E52FFDEEA76ED395 (user_id), INDEX IDX_E52FFDEE5D83CC1 (state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders_product (orders_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_223F76D6CFFE9AD6 (orders_id), INDEX IDX_223F76D64584665A (product_id), PRIMARY KEY(orders_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, updated_at DATETIME DEFAULT NULL, image VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, title VARCHAR(255) NOT NULL, date DATE NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_5A8A6C8DF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, updated_at DATETIME DEFAULT NULL, image VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, price NUMERIC(5, 2) NOT NULL, description LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, urlphoto LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE state_keys (id INT AUTO_INCREMENT NOT NULL, state_def VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, first_name VARCHAR(30) NOT NULL, name VARCHAR(30) NOT NULL, phone_number INT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contact_ticket ADD CONSTRAINT FK_7329A2269CCBE9A FOREIGN KEY (author_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE contact_ticket ADD CONSTRAINT FK_7329A22DF6E65AD FOREIGN KEY (admin_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE5D83CC1 FOREIGN KEY (state_id) REFERENCES state_keys (id)');
        $this->addSql('ALTER TABLE orders_product ADD CONSTRAINT FK_223F76D6CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE orders_product ADD CONSTRAINT FK_223F76D64584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders_product DROP FOREIGN KEY FK_223F76D6CFFE9AD6');
        $this->addSql('ALTER TABLE orders_product DROP FOREIGN KEY FK_223F76D64584665A');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE5D83CC1');
        $this->addSql('ALTER TABLE contact_ticket DROP FOREIGN KEY FK_7329A2269CCBE9A');
        $this->addSql('ALTER TABLE contact_ticket DROP FOREIGN KEY FK_7329A22DF6E65AD');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEA76ED395');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DF675F31B');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE contact_ticket');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE orders_product');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE state_keys');
        $this->addSql('DROP TABLE user');
    }
}
