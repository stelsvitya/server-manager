<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150923181132 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE login ADD proxy_host_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE login ADD CONSTRAINT FK_AA08CB1099118E0 FOREIGN KEY (proxy_host_id) REFERENCES login (id) ON DELETE CASCADE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AA08CB1099118E0 ON login (proxy_host_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE login DROP FOREIGN KEY FK_AA08CB1099118E0');
        $this->addSql('DROP INDEX UNIQ_AA08CB1099118E0 ON login');
        $this->addSql('ALTER TABLE login DROP proxy_host_id');
    }
}
