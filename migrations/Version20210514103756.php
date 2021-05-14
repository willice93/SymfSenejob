<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210514103756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE developers_categorie');
        $this->addSql('DROP TABLE tasks_admins');
        $this->addSql('ALTER TABLE admin ADD task_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D768DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('CREATE INDEX IDX_880E0D768DB60186 ON admin (task_id)');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD6346641C530 FOREIGN KEY (_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404558DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE delivred_task ADD CONSTRAINT FK_E8AD988864DD9267 FOREIGN KEY (developer_id) REFERENCES developer (id)');
        $this->addSql('ALTER TABLE developer ADD CONSTRAINT FK_65FB8B9A8DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE developers_categorie (developer_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_42D932FF64DD9267 (developer_id), INDEX IDX_42D932FFBCF5E72D (categorie_id), PRIMARY KEY(developer_id, categorie_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tasks_admins (task_id INT NOT NULL, admin_id INT NOT NULL, INDEX IDX_EAEBAF7F8DB60186 (task_id), INDEX IDX_EAEBAF7F642B8210 (admin_id), PRIMARY KEY(task_id, admin_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D768DB60186');
        $this->addSql('DROP INDEX IDX_880E0D768DB60186 ON admin');
        $this->addSql('ALTER TABLE admin DROP task_id');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD6346641C530');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404558DB60186');
        $this->addSql('ALTER TABLE delivred_task DROP FOREIGN KEY FK_E8AD988864DD9267');
        $this->addSql('ALTER TABLE developer DROP FOREIGN KEY FK_65FB8B9A8DB60186');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
