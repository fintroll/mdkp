<?php

use yii\db\Migration;

class m160229_154600_table_users extends Migration
{
    public function up()
    {
        $this->execute("CREATE TABLE IF NOT EXISTS `USERS` (
                      `ID_USER` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Код пользователя',
                      `USERNAME` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Имя пользователя',
                      `PASSWORD` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Пароль',
                      `EMAIL` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Адрес электронной почты',
                      `ROLE` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Роль пользователя',
                      PRIMARY KEY (`ID_USER`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;");
    }

    public function down()
    {
        echo "m160229_154600_table_users cannot be reverted.\n";

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
