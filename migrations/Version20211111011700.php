<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211111011700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE commande_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE structure_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE test_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE commande (id INT NOT NULL, type VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, statut VARCHAR(255) NOT NULL, price INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN commande.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN commande.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, description VARCHAR(255) NOT NULL, images TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN product.images IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE product_commande (product_id INT NOT NULL, commande_id INT NOT NULL, PRIMARY KEY(product_id, commande_id))');
        $this->addSql('CREATE INDEX IDX_A55ACCEA4584665A ON product_commande (product_id)');
        $this->addSql('CREATE INDEX IDX_A55ACCEA82EA2E54 ON product_commande (commande_id)');
        $this->addSql('CREATE TABLE structure (id INT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE test (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, structure_id INT DEFAULT NULL, commandes_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, role SMALLINT DEFAULT 0 NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, is_activate BOOLEAN NOT NULL, is_verified BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8D93D6492534008B ON "user" (structure_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6498BF5C2E6 ON "user" (commandes_id)');
        $this->addSql('COMMENT ON COLUMN "user".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "user".updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE product_commande ADD CONSTRAINT FK_A55ACCEA4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_commande ADD CONSTRAINT FK_A55ACCEA82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D6492534008B FOREIGN KEY (structure_id) REFERENCES structure (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D6498BF5C2E6 FOREIGN KEY (commandes_id) REFERENCES commande (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE product_commande DROP CONSTRAINT FK_A55ACCEA82EA2E54');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D6498BF5C2E6');
        $this->addSql('ALTER TABLE product_commande DROP CONSTRAINT FK_A55ACCEA4584665A');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D6492534008B');
        $this->addSql('DROP SEQUENCE commande_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE structure_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE test_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_commande');
        $this->addSql('DROP TABLE structure');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE "user"');
    }
}
