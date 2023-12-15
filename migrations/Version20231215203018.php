<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231215203018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE correspondance (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, match_level INT NOT NULL, INDEX IDX_A562D1E7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer_skill (job_offer_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_BE7C82D73481D195 (job_offer_id), INDEX IDX_BE7C82D75585C142 (skill_id), PRIMARY KEY(job_offer_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer_user (job_offer_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_191C68433481D195 (job_offer_id), INDEX IDX_191C6843A76ED395 (user_id), PRIMARY KEY(job_offer_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_user (skill_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_CAD24AFB5585C142 (skill_id), INDEX IDX_CAD24AFBA76ED395 (user_id), PRIMARY KEY(skill_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE correspondance ADD CONSTRAINT FK_A562D1E7A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE job_offer_skill ADD CONSTRAINT FK_BE7C82D73481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_offer_skill ADD CONSTRAINT FK_BE7C82D75585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_offer_user ADD CONSTRAINT FK_191C68433481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_offer_user ADD CONSTRAINT FK_191C6843A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_user ADD CONSTRAINT FK_CAD24AFB5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_user ADD CONSTRAINT FK_CAD24AFBA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE correspondance DROP FOREIGN KEY FK_A562D1E7A76ED395');
        $this->addSql('ALTER TABLE job_offer_skill DROP FOREIGN KEY FK_BE7C82D73481D195');
        $this->addSql('ALTER TABLE job_offer_skill DROP FOREIGN KEY FK_BE7C82D75585C142');
        $this->addSql('ALTER TABLE job_offer_user DROP FOREIGN KEY FK_191C68433481D195');
        $this->addSql('ALTER TABLE job_offer_user DROP FOREIGN KEY FK_191C6843A76ED395');
        $this->addSql('ALTER TABLE skill_user DROP FOREIGN KEY FK_CAD24AFB5585C142');
        $this->addSql('ALTER TABLE skill_user DROP FOREIGN KEY FK_CAD24AFBA76ED395');
        $this->addSql('DROP TABLE correspondance');
        $this->addSql('DROP TABLE job_offer');
        $this->addSql('DROP TABLE job_offer_skill');
        $this->addSql('DROP TABLE job_offer_user');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE skill_user');
        $this->addSql('DROP TABLE `user`');
    }
}
