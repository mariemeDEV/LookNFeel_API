<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181004082821 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE taches DROP FOREIGN KEY fk_etapes');
        $this->addSql('ALTER TABLE taches CHANGE id_etape id_etape INT DEFAULT NULL');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT FK_3BF2CD98C6DA34ED FOREIGN KEY (id_etape) REFERENCES etapes (id)');
        $this->addSql('ALTER TABLE etapes CHANGE id_projet id_projet INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires CHANGE id_etape id_etape INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE e_mail e_mail INT NOT NULL');
        $this->addSql('ALTER TABLE reponses DROP FOREIGN KEY fk_comments');
        $this->addSql('ALTER TABLE reponses CHANGE id_commentaire id_commentaire INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponses ADD CONSTRAINT FK_1E512EC67FE2A54B FOREIGN KEY (id_commentaire) REFERENCES commentaires (id)');
        $this->addSql('ALTER TABLE fichiers CHANGE id_etape id_etape INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet CHANGE id_equipe id_equipe INT DEFAULT NULL, CHANGE id_utilisateur id_utilisateur INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commentaires CHANGE id_etape id_etape INT NOT NULL');
        $this->addSql('ALTER TABLE etapes CHANGE id_projet id_projet INT NOT NULL');
        $this->addSql('ALTER TABLE fichiers CHANGE id_etape id_etape INT NOT NULL');
        $this->addSql('ALTER TABLE projet CHANGE id_equipe id_equipe INT NOT NULL, CHANGE id_utilisateur id_utilisateur INT NOT NULL');
        $this->addSql('ALTER TABLE reponses DROP FOREIGN KEY FK_1E512EC67FE2A54B');
        $this->addSql('ALTER TABLE reponses CHANGE id_commentaire id_commentaire INT NOT NULL');
        $this->addSql('ALTER TABLE reponses ADD CONSTRAINT fk_comments FOREIGN KEY (id_commentaire) REFERENCES commentaires (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE taches DROP FOREIGN KEY FK_3BF2CD98C6DA34ED');
        $this->addSql('ALTER TABLE taches CHANGE id_etape id_etape INT NOT NULL');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT fk_etapes FOREIGN KEY (id_etape) REFERENCES etapes (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur CHANGE e_mail e_mail VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci');
    }
}
