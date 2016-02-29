<?php

use yii\db\Migration;

class m160229_154449_table_files extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `FILES` (
                        `ID_FILE` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код файла',
                      `FILENAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Имя файла',
                      `FILEPATH` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Относительный путь файла',
                      `EXTENSION` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Расширение файла',
                      `UPLOAD_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата загрузки',
                      `FID_TICKET` int(11) NOT NULL COMMENT 'Код заявки',
                      `FID_USER` int(11) NOT NULL COMMENT 'Код пользователя',
                      PRIMARY KEY (`ID_FILE`),
                      KEY `FID_TICKET` (`FID_TICKET`),
                      KEY `FID_USER` (`FID_USER`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Файлы' AUTO_INCREMENT=1;") ;
    }

    public function down()
    {
        echo "m160229_154449_table_files cannot be reverted.\n";

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
