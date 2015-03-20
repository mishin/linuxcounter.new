<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150320085115 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DELETE FROM `fos_user`');
        $this->addSql('INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `locale`) VALUES (1, \'admin\', \'admin\', \'alex.loehner@linux.com\', \'alex.loehner@linux.com\', 1, \'83wk6pk6mdwcws84ss04gwsosogwgss\', \'4zYTW2352nT1R01NtYyVyKdtWURyv5K17lza+XaAvq2Gp1mZkBb65dB4SreIMHN6BhAq+M1Db3aqD6rVBIBajg==\', \'2015-03-20 08:16:25\', 0, 0, NULL, \'_NlR55E0JyBy4y02AUdOtREJ3MZ1Uz2AOaDjPyhlE6g\', NULL, \'a:1:{i:0;s:10:"ROLE_ADMIN";}\', 0, NULL, \'en\')');
        $this->addSql('INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `locale`) VALUES (2, \'tester@linuxcounter.net\', \'tester@linuxcounter.net\', \'tester@linuxcounter.net\', \'tester@linuxcounter.net\', 1, \'iab5rpz8ef40gssosgw80s4wkooko4w\', \'k4OUilVprUmF4SNoz1dTh2rU/qnOUDJGc6BL+C9XTEZIMwcCPumKE8S8Z/V34eMo6VpLhowJEtbFonX7TZs1Sw==\', NULL, 0, 0, NULL, \'ddKOiGak7KSkHEID4WTciCQQ3c0FQdxJ9Me_pMN0UiE\', NULL, \'a:0:{}\', 0, NULL, \'en\')');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('TRUNCATE TABLE `fos_user`');
    }
}
