<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210913142209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_season (player_id INT NOT NULL, season_id INT NOT NULL, INDEX IDX_6FE4CD7799E6F5DF (player_id), INDEX IDX_6FE4CD774EC001D1 (season_id), PRIMARY KEY(player_id, season_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season_teams (season_id INT NOT NULL, teams_id INT NOT NULL, INDEX IDX_81F3D5874EC001D1 (season_id), INDEX IDX_81F3D587D6365F12 (teams_id), PRIMARY KEY(season_id, teams_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player_season ADD CONSTRAINT FK_6FE4CD7799E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_season ADD CONSTRAINT FK_6FE4CD774EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season_teams ADD CONSTRAINT FK_81F3D5874EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season_teams ADD CONSTRAINT FK_81F3D587D6365F12 FOREIGN KEY (teams_id) REFERENCES teams (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE season_player');
        $this->addSql('DROP TABLE teams_season');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE season_player (season_id INT NOT NULL, player_id INT NOT NULL, INDEX IDX_8E6284D74EC001D1 (season_id), INDEX IDX_8E6284D799E6F5DF (player_id), PRIMARY KEY(season_id, player_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE teams_season (teams_id INT NOT NULL, season_id INT NOT NULL, INDEX IDX_5877BA044EC001D1 (season_id), INDEX IDX_5877BA04D6365F12 (teams_id), PRIMARY KEY(teams_id, season_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE season_player ADD CONSTRAINT FK_8E6284D74EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season_player ADD CONSTRAINT FK_8E6284D799E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE teams_season ADD CONSTRAINT FK_5877BA044EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE teams_season ADD CONSTRAINT FK_5877BA04D6365F12 FOREIGN KEY (teams_id) REFERENCES teams (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE player_season');
        $this->addSql('DROP TABLE season_teams');
    }
}
