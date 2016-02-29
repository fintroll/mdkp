<?php

use yii\db\Migration;

class m160229_153915_table_comments extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `COMMENTS` (
                  `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код комментария',
                  `TEXT` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Содержание',
                  `FID_TICKET` int(11) NOT NULL COMMENT 'Код заявки',
                  `FID_USER` int(11) NOT NULL COMMENT 'Код пользователя',
                  `TIME_CREATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата создания',
                  PRIMARY KEY (`ID_COMMENT`),
                  KEY `FID_TICKET` (`FID_TICKET`),
                  KEY `FID_USER` (`FID_USER`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Комментарии' AUTO_INCREMENT=1;");
    }

    public function down()
    {
        echo "m160229_153915_table_comments cannot be reverted.\n";

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
