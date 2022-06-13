<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220612170754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, restaurant_id INT NOT NULL, price DOUBLE PRECISION NOT NULL, start_hour TIME NOT NULL, end_time TIME NOT NULL, INDEX IDX_42C84955B1E7706E (restaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE `table` ADD reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `table` ADD CONSTRAINT FK_F6298F46B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_F6298F46B83297E7 ON `table` (reservation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `table` DROP FOREIGN KEY FK_F6298F46B83297E7');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP INDEX IDX_F6298F46B83297E7 ON `table`');
        $this->addSql('ALTER TABLE `table` DROP reservation_id');
    }
}
