<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210914075400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE teams_season (teams_id INT NOT NULL, season_id INT NOT NULL, INDEX IDX_5877BA04D6365F12 (teams_id), INDEX IDX_5877BA044EC001D1 (season_id), PRIMARY KEY(teams_id, season_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE teams_season ADD CONSTRAINT FK_5877BA04D6365F12 FOREIGN KEY (teams_id) REFERENCES teams (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE teams_season ADD CONSTRAINT FK_5877BA044EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE teams DROP FOREIGN KEY FK_96C2225816EB9F66');
        $this->addSql('DROP INDEX IDX_96C2225816EB9F66 ON teams');
        $this->addSql('ALTER TABLE teams DROP seasons_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE teams_season');
        $this->addSql('ALTER TABLE teams ADD seasons_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE teams ADD CONSTRAINT FK_96C2225816EB9F66 FOREIGN KEY (seasons_id) REFERENCES season (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_96C2225816EB9F66 ON teams (seasons_id)');
    }
}
