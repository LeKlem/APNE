<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211127160733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE product_quantity DROP FOREIGN KEY FK_54437CA14584665A');
        $this->addSql('DROP INDEX IDX_54437CA14584665A ON product_quantity');
        $this->addSql('ALTER TABLE product_quantity ADD id INT AUTO_INCREMENT NOT NULL, ADD quantity_id INT NOT NULL, DROP product_id, DROP quantity, CHANGE orders_id orders_id INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE product_quantity ADD CONSTRAINT FK_54437CA17E8B4AFC FOREIGN KEY (quantity_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_54437CA17E8B4AFC ON product_quantity (quantity_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE product_quantity MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE product_quantity DROP FOREIGN KEY FK_54437CA17E8B4AFC');
        $this->addSql('DROP INDEX IDX_54437CA17E8B4AFC ON product_quantity');
        $this->addSql('ALTER TABLE product_quantity DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE product_quantity ADD quantity INT NOT NULL, DROP id, CHANGE orders_id orders_id INT NOT NULL, CHANGE quantity_id product_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_quantity ADD CONSTRAINT FK_54437CA14584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_54437CA14584665A ON product_quantity (product_id)');
        $this->addSql('ALTER TABLE product_quantity ADD PRIMARY KEY (orders_id, product_id)');
    }
}
