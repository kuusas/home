<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130328083248 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, map_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE event ADD place_id INT DEFAULT NULL, ADD afterparty_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7DA6A219 FOREIGN KEY (place_id) REFERENCES place (id)");
        $this->addSql("ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7F8004697 FOREIGN KEY (afterparty_id) REFERENCES place (id)");
        $this->addSql("CREATE INDEX IDX_3BAE0AA7DA6A219 ON event (place_id)");
        $this->addSql("CREATE INDEX IDX_3BAE0AA7F8004697 ON event (afterparty_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7DA6A219");
        $this->addSql("ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7F8004697");
        $this->addSql("DROP TABLE place");
        $this->addSql("DROP INDEX IDX_3BAE0AA7DA6A219 ON event");
        $this->addSql("DROP INDEX IDX_3BAE0AA7F8004697 ON event");
        $this->addSql("ALTER TABLE event DROP place_id, DROP afterparty_id");
    }
}
