<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240625020029 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE assureur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE categorie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE consultation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE domain_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE horaire_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE medcin_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mode_reglement_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE nationalite_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE rdv_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE reglement_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE specialite_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE assureur (id INT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE categorie (id INT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE consultation (id INT NOT NULL, patient_id INT NOT NULL, date_consultation DATE NOT NULL, observation VARCHAR(255) NOT NULL, montant DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_964685A66B899279 ON consultation (patient_id)');
        $this->addSql('CREATE TABLE domain (id INT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE horaire (id INT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE medcin (id INT NOT NULL, specialite_id INT NOT NULL, categorie_id INT NOT NULL, nationalite_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE DEFAULT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) NOT NULL, gsm VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, fax VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B49ACC862195E0F0 ON medcin (specialite_id)');
        $this->addSql('CREATE INDEX IDX_B49ACC86BCF5E72D ON medcin (categorie_id)');
        $this->addSql('CREATE INDEX IDX_B49ACC861B063272 ON medcin (nationalite_id)');
        $this->addSql('CREATE TABLE mode_reglement (id INT NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE nationalite (id INT NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE rdv (id INT NOT NULL, horaire_id INT DEFAULT NULL, patient_id INT NOT NULL, numero INT NOT NULL, annee INT NOT NULL, date DATE NOT NULL, observation VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_10C31F8658C54515 ON rdv (horaire_id)');
        $this->addSql('CREATE INDEX IDX_10C31F866B899279 ON rdv (patient_id)');
        $this->addSql('CREATE TABLE reglement (id INT NOT NULL, patient_id INT NOT NULL, modereglement_id INT NOT NULL, integer VARCHAR(255) NOT NULL, date DATE NOT NULL, mode_reglement VARCHAR(255) NOT NULL, num_piece VARCHAR(255) DEFAULT NULL, montant DOUBLE PRECISION NOT NULL, observation VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EBE4C14C6B899279 ON reglement (patient_id)');
        $this->addSql('CREATE INDEX IDX_EBE4C14C5D39DCF4 ON reglement (modereglement_id)');
        $this->addSql('CREATE TABLE specialite (id INT NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A66B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE medcin ADD CONSTRAINT FK_B49ACC862195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE medcin ADD CONSTRAINT FK_B49ACC86BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE medcin ADD CONSTRAINT FK_B49ACC861B063272 FOREIGN KEY (nationalite_id) REFERENCES nationalite (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8658C54515 FOREIGN KEY (horaire_id) REFERENCES horaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F866B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reglement ADD CONSTRAINT FK_EBE4C14C6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reglement ADD CONSTRAINT FK_EBE4C14C5D39DCF4 FOREIGN KEY (modereglement_id) REFERENCES mode_reglement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE patient ADD nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ADD domaine_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ADD assureur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient DROP assureur');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB1B063272 FOREIGN KEY (nationalite_id) REFERENCES nationalite (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB4272FC9F FOREIGN KEY (domaine_id) REFERENCES domain (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB80F7E20A FOREIGN KEY (assureur_id) REFERENCES assureur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_1ADAD7EB1B063272 ON patient (nationalite_id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EB4272FC9F ON patient (domaine_id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EB80F7E20A ON patient (assureur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE patient DROP CONSTRAINT FK_1ADAD7EB80F7E20A');
        $this->addSql('ALTER TABLE patient DROP CONSTRAINT FK_1ADAD7EB4272FC9F');
        $this->addSql('ALTER TABLE patient DROP CONSTRAINT FK_1ADAD7EB1B063272');
        $this->addSql('DROP SEQUENCE assureur_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE categorie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE consultation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE domain_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE horaire_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE medcin_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mode_reglement_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE nationalite_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE rdv_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE reglement_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE specialite_id_seq CASCADE');
        $this->addSql('ALTER TABLE consultation DROP CONSTRAINT FK_964685A66B899279');
        $this->addSql('ALTER TABLE medcin DROP CONSTRAINT FK_B49ACC862195E0F0');
        $this->addSql('ALTER TABLE medcin DROP CONSTRAINT FK_B49ACC86BCF5E72D');
        $this->addSql('ALTER TABLE medcin DROP CONSTRAINT FK_B49ACC861B063272');
        $this->addSql('ALTER TABLE rdv DROP CONSTRAINT FK_10C31F8658C54515');
        $this->addSql('ALTER TABLE rdv DROP CONSTRAINT FK_10C31F866B899279');
        $this->addSql('ALTER TABLE reglement DROP CONSTRAINT FK_EBE4C14C6B899279');
        $this->addSql('ALTER TABLE reglement DROP CONSTRAINT FK_EBE4C14C5D39DCF4');
        $this->addSql('DROP TABLE assureur');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE domain');
        $this->addSql('DROP TABLE horaire');
        $this->addSql('DROP TABLE medcin');
        $this->addSql('DROP TABLE mode_reglement');
        $this->addSql('DROP TABLE nationalite');
        $this->addSql('DROP TABLE rdv');
        $this->addSql('DROP TABLE reglement');
        $this->addSql('DROP TABLE specialite');
        $this->addSql('DROP INDEX IDX_1ADAD7EB1B063272');
        $this->addSql('DROP INDEX IDX_1ADAD7EB4272FC9F');
        $this->addSql('DROP INDEX IDX_1ADAD7EB80F7E20A');
        $this->addSql('ALTER TABLE patient ADD assureur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE patient DROP nationalite_id');
        $this->addSql('ALTER TABLE patient DROP domaine_id');
        $this->addSql('ALTER TABLE patient DROP assureur_id');
    }
}
