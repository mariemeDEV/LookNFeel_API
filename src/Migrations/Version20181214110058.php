<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181214110058 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE taches (id INT AUTO_INCREMENT NOT NULL, etapes_id INT DEFAULT NULL, libellet VARCHAR(30) NOT NULL, INDEX IDX_3BF2CD984F5CEED2 (etapes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, filiale_id INT DEFAULT NULL, nom_entreprise VARCHAR(30) NOT NULL, télèphone VARCHAR(20) NOT NULL, email VARCHAR(30) NOT NULL, userName VARCHAR(30) NOT NULL, pasword VARCHAR(30) NOT NULL, INDEX IDX_C74404555C4BCADC (filiale_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etapes (id INT AUTO_INCREMENT NOT NULL, projet_id INT DEFAULT NULL, nom VARCHAR(30) NOT NULL, duree INT NOT NULL, etat VARCHAR(255) NOT NULL, INDEX IDX_E3443E17C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_prestation (id INT AUTO_INCREMENT NOT NULL, libelleType VARCHAR(255) NOT NULL, montant INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaires (id INT AUTO_INCREMENT NOT NULL, etapes_id INT DEFAULT NULL, comment VARCHAR(300) NOT NULL, INDEX IDX_D9BEC0C44F5CEED2 (etapes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiale (id INT AUTO_INCREMENT NOT NULL, pays VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, equipe_id INT DEFAULT NULL, prenom VARCHAR(30) NOT NULL, nom VARCHAR(30) NOT NULL, telephone VARCHAR(30) NOT NULL, e_mail VARCHAR(30) NOT NULL, profil VARCHAR(255) NOT NULL, role VARCHAR(255) DEFAULT NULL, userName VARCHAR(30) NOT NULL, password VARCHAR(30) NOT NULL, photo VARCHAR(60) NOT NULL, INDEX IDX_1D1C63B36D861B89 (equipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet_filiale (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, type_prestation_id INT DEFAULT NULL, nom VARCHAR(30) NOT NULL, datePrestation DATE NOT NULL, billings DOUBLE PRECISION NOT NULL, charges DOUBLE PRECISION NOT NULL, marges DOUBLE PRECISION NOT NULL, INDEX IDX_7FB297EC19EB6921 (client_id), INDEX IDX_7FB297ECEEA87261 (type_prestation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponses (id INT AUTO_INCREMENT NOT NULL, commentaires_id INT DEFAULT NULL, response VARCHAR(500) NOT NULL, INDEX IDX_1E512EC617C4B2B0 (commentaires_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fichiers (id INT AUTO_INCREMENT NOT NULL, etapes_id INT DEFAULT NULL, nom VARCHAR(30) NOT NULL, INDEX IDX_969DB4AB4F5CEED2 (etapes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, type_prestation_id INT DEFAULT NULL, equipe_id INT DEFAULT NULL, nom VARCHAR(30) NOT NULL, statut VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, brief VARCHAR(400) NOT NULL, datePrestation DATE NOT NULL, billings DOUBLE PRECISION NOT NULL, charges DOUBLE PRECISION NOT NULL, marges DOUBLE PRECISION NOT NULL, INDEX IDX_50159CA919EB6921 (client_id), INDEX IDX_50159CA9EEA87261 (type_prestation_id), INDEX IDX_50159CA96D861B89 (equipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT FK_3BF2CD984F5CEED2 FOREIGN KEY (etapes_id) REFERENCES etapes (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404555C4BCADC FOREIGN KEY (filiale_id) REFERENCES filiale (id)');
        $this->addSql('ALTER TABLE etapes ADD CONSTRAINT FK_E3443E17C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C44F5CEED2 FOREIGN KEY (etapes_id) REFERENCES etapes (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B36D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE projet_filiale ADD CONSTRAINT FK_7FB297EC19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE projet_filiale ADD CONSTRAINT FK_7FB297ECEEA87261 FOREIGN KEY (type_prestation_id) REFERENCES type_prestation (id)');
        $this->addSql('ALTER TABLE reponses ADD CONSTRAINT FK_1E512EC617C4B2B0 FOREIGN KEY (commentaires_id) REFERENCES commentaires (id)');
        $this->addSql('ALTER TABLE fichiers ADD CONSTRAINT FK_969DB4AB4F5CEED2 FOREIGN KEY (etapes_id) REFERENCES etapes (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9EEA87261 FOREIGN KEY (type_prestation_id) REFERENCES type_prestation (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA96D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projet_filiale DROP FOREIGN KEY FK_7FB297EC19EB6921');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA919EB6921');
        $this->addSql('ALTER TABLE taches DROP FOREIGN KEY FK_3BF2CD984F5CEED2');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C44F5CEED2');
        $this->addSql('ALTER TABLE fichiers DROP FOREIGN KEY FK_969DB4AB4F5CEED2');
        $this->addSql('ALTER TABLE projet_filiale DROP FOREIGN KEY FK_7FB297ECEEA87261');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9EEA87261');
        $this->addSql('ALTER TABLE reponses DROP FOREIGN KEY FK_1E512EC617C4B2B0');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404555C4BCADC');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B36D861B89');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA96D861B89');
        $this->addSql('ALTER TABLE etapes DROP FOREIGN KEY FK_E3443E17C18272');
        $this->addSql('DROP TABLE taches');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE etapes');
        $this->addSql('DROP TABLE type_prestation');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('DROP TABLE filiale');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE projet_filiale');
        $this->addSql('DROP TABLE reponses');
        $this->addSql('DROP TABLE fichiers');
        $this->addSql('DROP TABLE projet');
    }
}
