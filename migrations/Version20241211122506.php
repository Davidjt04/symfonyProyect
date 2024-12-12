<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241211122506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE respuesta ADD id_pregunta_id INT NOT NULL');
        $this->addSql('ALTER TABLE respuesta ADD CONSTRAINT FK_6C6EC5EE29B74DE9 FOREIGN KEY (id_pregunta_id) REFERENCES pregunta (id)');
        $this->addSql('CREATE INDEX IDX_6C6EC5EE29B74DE9 ON respuesta (id_pregunta_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE respuesta DROP FOREIGN KEY FK_6C6EC5EE29B74DE9');
        $this->addSql('DROP INDEX IDX_6C6EC5EE29B74DE9 ON respuesta');
        $this->addSql('ALTER TABLE respuesta DROP id_pregunta_id');
    }
}
