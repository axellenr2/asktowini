<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190208212420 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE imageprincipale');
        $this->addSql('ALTER TABLE post ADD filename VARCHAR(255) NOT NULL, ADD path VARCHAR(255) NOT NULL, ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE imageprincipale (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, filename VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, path VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_865D28E34B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE imageprincipale ADD CONSTRAINT FK_865D28E34B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE post DROP filename, DROP path, DROP updated_at');
    }
}
