<?php

use yii\db\Migration;

class m160229_154345_table_events extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `EVENTS` (
                          `ID_EVENT` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код события',
                          `FID_TICKET` int(11) NOT NULL COMMENT 'Код заявки',
                          `FID_USER` int(11) NOT NULL COMMENT 'Код пользователя',
                          `TIME_EVENT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата события',
                          `DESCRIPTION` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Событие',
                          `IS_SENT` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Флаг отправки',
                          PRIMARY KEY (`ID_EVENT`),
                          KEY `FID_USER` (`FID_USER`),
                          KEY `FID_TICKET` (`FID_TICKET`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='События' AUTO_INCREMENT=1 ;");
    }

    public function down()
    {
        echo "m160229_154345_table_events cannot be reverted.\n";

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
