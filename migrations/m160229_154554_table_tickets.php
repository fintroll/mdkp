<?php

use yii\db\Migration;

class m160229_154554_table_tickets extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `TICKETS` (
                              `ID_TICKET` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код заявки',
                              `SUBJECT` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Тема',
                              `DESCRIPTION` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Текст заявки',
                              `FID_CATEGORY` int(11) NOT NULL COMMENT 'Код категории',
                              `FID_CREATOR` int(11) NOT NULL COMMENT 'Код заявителя',
                              `FID_PERFORMER` int(11) NOT NULL COMMENT 'Код исполнителя',
                              `FID_STATUS` int(11) NOT NULL COMMENT 'Статус',
                              `TIME_CREATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата создания',
                              `TIME_UPDATE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Дата изменения',
                              PRIMARY KEY (`ID_TICKET`),
                              KEY `FID_CREATOR` (`FID_CREATOR`),
                              KEY `FID_CATEGORY` (`FID_CATEGORY`),
                              KEY `FID_PERFORMER` (`FID_PERFORMER`),
                              KEY `FID_STATUS` (`FID_STATUS`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Заявки' AUTO_INCREMENT=1 ;");
    }

    public function down()
    {
        echo "m160229_154554_table_tickets cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
