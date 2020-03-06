<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200306112312 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image ADD listing_id INT NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FD4619D1A FOREIGN KEY (listing_id) REFERENCES listing (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FD4619D1A ON image (listing_id)');
        $this->addSql('ALTER TABLE listing ADD model_id INT NOT NULL, ADD fuel_type_id INT DEFAULT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE listing ADD CONSTRAINT FK_CB0048D47975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE listing ADD CONSTRAINT FK_CB0048D46A70FE35 FOREIGN KEY (fuel_type_id) REFERENCES fuel_type (id)');
        $this->addSql('ALTER TABLE listing ADD CONSTRAINT FK_CB0048D4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_CB0048D47975B7E7 ON listing (model_id)');
        $this->addSql('CREATE INDEX IDX_CB0048D46A70FE35 ON listing (fuel_type_id)');
        $this->addSql('CREATE INDEX IDX_CB0048D4A76ED395 ON listing (user_id)');
        $this->addSql('ALTER TABLE model ADD maker_id INT NOT NULL, ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D968DA5EC3 FOREIGN KEY (maker_id) REFERENCES maker (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D912469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_D79572D968DA5EC3 ON model (maker_id)');
        $this->addSql('CREATE INDEX IDX_D79572D912469DE2 ON model (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FD4619D1A');
        $this->addSql('DROP INDEX IDX_C53D045FD4619D1A ON image');
        $this->addSql('ALTER TABLE image DROP listing_id');
        $this->addSql('ALTER TABLE listing DROP FOREIGN KEY FK_CB0048D47975B7E7');
        $this->addSql('ALTER TABLE listing DROP FOREIGN KEY FK_CB0048D46A70FE35');
        $this->addSql('ALTER TABLE listing DROP FOREIGN KEY FK_CB0048D4A76ED395');
        $this->addSql('DROP INDEX IDX_CB0048D47975B7E7 ON listing');
        $this->addSql('DROP INDEX IDX_CB0048D46A70FE35 ON listing');
        $this->addSql('DROP INDEX IDX_CB0048D4A76ED395 ON listing');
        $this->addSql('ALTER TABLE listing DROP model_id, DROP fuel_type_id, DROP user_id');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D968DA5EC3');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D912469DE2');
        $this->addSql('DROP INDEX IDX_D79572D968DA5EC3 ON model');
        $this->addSql('DROP INDEX IDX_D79572D912469DE2 ON model');
        $this->addSql('ALTER TABLE model DROP maker_id, DROP category_id');
    }
}
