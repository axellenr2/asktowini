<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190208211138 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE imageprincipale DROP INDEX IDX_865D28E34B89032C, ADD UNIQUE INDEX UNIQ_865D28E34B89032C (post_id)');
        $this->addSql('ALTER TABLE imageprincipale ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE imageprincipale DROP INDEX UNIQ_865D28E34B89032C, ADD INDEX IDX_865D28E34B89032C (post_id)');
        $this->addSql('ALTER TABLE imageprincipale DROP updated_at');
    }
}
