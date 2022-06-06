<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220523191722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scan_alert ADD description VARCHAR(1000) NOT NULL, ADD confidence VARCHAR(255) NOT NULL, ADD solution VARCHAR(1000) NOT NULL, ADD method VARCHAR(10) NOT NULL, ADD sourceid VARCHAR(255) NOT NULL, ADD plugin_id INT NOT NULL, ADD cweid INT NOT NULL, ADD wascid INT NOT NULL, ADD messege_id INT NOT NULL, ADD url VARCHAR(255) NOT NULL, ADD alert_ref INT NOT NULL, ADD scan_id INT NOT NULL, ADD reference VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scan_alert DROP description, DROP confidence, DROP solution, DROP method, DROP sourceid, DROP plugin_id, DROP cweid, DROP wascid, DROP messege_id, DROP url, DROP alert_ref, DROP scan_id, DROP reference');
    }
}
