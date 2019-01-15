<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181214111348 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE taches ADD etapes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT FK_3BF2CD984F5CEED2 FOREIGN KEY (etapes_id) REFERENCES etapes (id)');
        $this->addSql('CREATE INDEX IDX_3BF2CD984F5CEED2 ON taches (etapes_id)');
        $this->addSql('ALTER TABLE client CHANGE filiale_id filiale_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires ADD etapes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C44F5CEED2 FOREIGN KEY (etapes_id) REFERENCES etapes (id)');
        $this->addSql('CREATE INDEX IDX_D9BEC0C44F5CEED2 ON commentaires (etapes_id)');
        $this->addSql('ALTER TABLE utilisateur ADD role VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client CHANGE filiale_id filiale_id INT NOT NULL');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C44F5CEED2');
        $this->addSql('DROP INDEX IDX_D9BEC0C44F5CEED2 ON commentaires');
        $this->addSql('ALTER TABLE commentaires DROP etapes_id');
        $this->addSql('ALTER TABLE taches DROP FOREIGN KEY FK_3BF2CD984F5CEED2');
        $this->addSql('DROP INDEX IDX_3BF2CD984F5CEED2 ON taches');
        $this->addSql('ALTER TABLE taches DROP etapes_id');
        $this->addSql('ALTER TABLE utilisateur DROP role');
    }
}
