<?php

use yii\db\Migration;

class m160229_154119_table_categories extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `D_CATEGORIES` (
                          `ID_CATEGORY` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код категории',
                          `NAME_CATEGORY` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Категория',
                          PRIMARY KEY (`ID_CATEGORY`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;");
    }

    public function down()
    {
        echo "m160229_154119_table_categories cannot be reverted.\n";

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
