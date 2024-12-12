<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241211121950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pregunta ADD respuestas_id INT NOT NULL');
        $this->addSql('ALTER TABLE pregunta ADD CONSTRAINT FK_AEE0E1F7DF70C5B6 FOREIGN KEY (respuestas_id) REFERENCES respuesta (id)');
        $this->addSql('CREATE INDEX IDX_AEE0E1F7DF70C5B6 ON pregunta (respuestas_id)');
        $this->addSql('ALTER TABLE respuesta ADD preguntas2_id INT NOT NULL');
        $this->addSql('ALTER TABLE respuesta ADD CONSTRAINT FK_6C6EC5EEB6C3AADD FOREIGN KEY (preguntas2_id) REFERENCES pregunta (id)');
        $this->addSql('CREATE INDEX IDX_6C6EC5EEB6C3AADD ON respuesta (preguntas2_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pregunta DROP FOREIGN KEY FK_AEE0E1F7DF70C5B6');
        $this->addSql('DROP INDEX IDX_AEE0E1F7DF70C5B6 ON pregunta');
        $this->addSql('ALTER TABLE pregunta DROP respuestas_id');
        $this->addSql('ALTER TABLE respuesta DROP FOREIGN KEY FK_6C6EC5EEB6C3AADD');
        $this->addSql('DROP INDEX IDX_6C6EC5EEB6C3AADD ON respuesta');
        $this->addSql('ALTER TABLE respuesta DROP preguntas2_id');
    }
}
