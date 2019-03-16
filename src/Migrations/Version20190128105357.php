<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190128105357 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contenucommande DROP FOREIGN KEY FK_D2D18AF082EA2E54');
        $this->addSql('ALTER TABLE ligne_panier DROP FOREIGN KEY FK_21691B4304E57C5');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F77D927C');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE contenucommande');
        $this->addSql('DROP TABLE ligne_panier');
        $this->addSql('DROP TABLE panier');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6612469DE2');
        $this->addSql('DROP INDEX IDX_23A0E6612469DE2 ON article');
        $this->addSql('ALTER TABLE article DROP category_id, CHANGE prix category DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE comment DROP note');
        $this->addSql('DROP INDEX UNIQ_8D93D649F77D927C ON user');
        $this->addSql('ALTER TABLE user DROP panier_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, prixtotal DOUBLE PRECISION NOT NULL, INDEX IDX_6EEAA67D19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenucommande (id INT AUTO_INCREMENT NOT NULL, commande_id INT NOT NULL, article_id INT NOT NULL, UNIQUE INDEX UNIQ_D2D18AF07294869C (article_id), INDEX IDX_D2D18AF082EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_panier (id INT AUTO_INCREMENT NOT NULL, n_panier_id INT NOT NULL, lignes_panier_id INT DEFAULT NULL, quantitearticle DOUBLE PRECISION NOT NULL, INDEX IDX_21691B4304E57C5 (n_panier_id), INDEX IDX_21691B4D5CBC06C (lignes_panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, nom_client_id INT NOT NULL, info VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, UNIQUE INDEX UNIQ_24CC0DF28D1A1860 (nom_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE contenucommande ADD CONSTRAINT FK_D2D18AF07294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE contenucommande ADD CONSTRAINT FK_D2D18AF082EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ligne_panier ADD CONSTRAINT FK_21691B4304E57C5 FOREIGN KEY (n_panier_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE ligne_panier ADD CONSTRAINT FK_21691B4D5CBC06C FOREIGN KEY (lignes_panier_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF28D1A1860 FOREIGN KEY (nom_client_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article ADD category_id INT NOT NULL, CHANGE category prix DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_23A0E6612469DE2 ON article (category_id)');
        $this->addSql('ALTER TABLE comment ADD note DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE user ADD panier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F77D927C ON user (panier_id)');
    }
}
