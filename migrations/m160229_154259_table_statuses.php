<?php

use yii\db\Migration;

class m160229_154259_table_statuses extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `D_STATUSES` (
                          `ID_STATUS` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код статуса',
                          `NAME_STATUS` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Статус',
                          `IS_FINAL` int(11) NOT NULL COMMENT 'Флаг конечного статуса',
                          PRIMARY KEY (`ID_STATUS`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Таблица статусов' AUTO_INCREMENT=1 ;");
    }

    public function down()
    {
        echo "m160229_154259_table_statuses cannot be reverted.\n";

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
