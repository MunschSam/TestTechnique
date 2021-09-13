<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210913152255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE season_player');
        $this->addSql('DROP TABLE season_teams');
        $this->addSql('ALTER TABLE player ADD season_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A654EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('CREATE INDEX IDX_98197A654EC001D1 ON player (season_id)');
        $this->addSql('ALTER TABLE teams ADD seasons_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE teams ADD CONSTRAINT FK_96C2225816EB9F66 FOREIGN KEY (seasons_id) REFERENCES season (id)');
        $this->addSql('CREATE INDEX IDX_96C2225816EB9F66 ON teams (seasons_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE season_player (season_id INT NOT NULL, player_id INT NOT NULL, INDEX IDX_8E6284D74EC001D1 (season_id), INDEX IDX_8E6284D799E6F5DF (player_id), PRIMARY KEY(season_id, player_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE season_teams (season_id INT NOT NULL, teams_id INT NOT NULL, INDEX IDX_81F3D5874EC001D1 (season_id), INDEX IDX_81F3D587D6365F12 (teams_id), PRIMARY KEY(season_id, teams_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE season_player ADD CONSTRAINT FK_8E6284D74EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season_player ADD CONSTRAINT FK_8E6284D799E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season_teams ADD CONSTRAINT FK_81F3D5874EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season_teams ADD CONSTRAINT FK_81F3D587D6365F12 FOREIGN KEY (teams_id) REFERENCES teams (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A654EC001D1');
        $this->addSql('DROP INDEX IDX_98197A654EC001D1 ON player');
        $this->addSql('ALTER TABLE player DROP season_id');
        $this->addSql('ALTER TABLE teams DROP FOREIGN KEY FK_96C2225816EB9F66');
        $this->addSql('DROP INDEX IDX_96C2225816EB9F66 ON teams');
        $this->addSql('ALTER TABLE teams DROP seasons_id');
    }
}
