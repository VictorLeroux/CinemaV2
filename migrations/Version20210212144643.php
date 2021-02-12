<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210212144643 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actors (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE films (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE films_category (films_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_4921E1CC939610EE (films_id), INDEX IDX_4921E1CC12469DE2 (category_id), PRIMARY KEY(films_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE films_actors (films_id INT NOT NULL, actors_id INT NOT NULL, INDEX IDX_687F7B5C939610EE (films_id), INDEX IDX_687F7B5C7168CF59 (actors_id), PRIMARY KEY(films_id, actors_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE films_category ADD CONSTRAINT FK_4921E1CC939610EE FOREIGN KEY (films_id) REFERENCES films (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films_category ADD CONSTRAINT FK_4921E1CC12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films_actors ADD CONSTRAINT FK_687F7B5C939610EE FOREIGN KEY (films_id) REFERENCES films (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films_actors ADD CONSTRAINT FK_687F7B5C7168CF59 FOREIGN KEY (actors_id) REFERENCES actors (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE acteurs');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE film');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE films_actors DROP FOREIGN KEY FK_687F7B5C7168CF59');
        $this->addSql('ALTER TABLE films_category DROP FOREIGN KEY FK_4921E1CC12469DE2');
        $this->addSql('ALTER TABLE films_category DROP FOREIGN KEY FK_4921E1CC939610EE');
        $this->addSql('ALTER TABLE films_actors DROP FOREIGN KEY FK_687F7B5C939610EE');
        $this->addSql('CREATE TABLE acteurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE actors');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE films');
        $this->addSql('DROP TABLE films_category');
        $this->addSql('DROP TABLE films_actors');
    }
}
