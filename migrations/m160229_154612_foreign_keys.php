<?php

use yii\db\Migration;

class m160229_154612_foreign_keys extends Migration
{
    /*public function up()
    {

    }

    public function down()
    {
        echo "m160229_154612_foreign_keys cannot be reverted.\n";

        return false;
    }
*/

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->execute("ALTER TABLE `EVENTS`
                          ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`FID_USER`) REFERENCES `USERS` (`ID_USER`),
                          ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`FID_TICKET`) REFERENCES `TICKETS` (`ID_TICKET`);

                        --
                        -- Ограничения внешнего ключа таблицы `FILES`
                        --
                        ALTER TABLE `FILES`
                          ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`FID_USER`) REFERENCES `USERS` (`ID_USER`),
                          ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`FID_TICKET`) REFERENCES `TICKETS` (`ID_TICKET`);

                        --
                        -- Ограничения внешнего ключа таблицы `TICKETS`
                        --
                        ALTER TABLE `TICKETS`
                          ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`FID_STATUS`) REFERENCES `D_STATUSES` (`ID_STATUS`),
                          ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`FID_CATEGORY`) REFERENCES `D_CATEGORIES` (`ID_CATEGORY`),
                          ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`FID_CREATOR`) REFERENCES `USERS` (`ID_USER`),
                          ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`FID_PERFORMER`) REFERENCES `USERS` (`ID_USER`);
                        SET FOREIGN_KEY_CHECKS=1;");
    }

    public function safeDown()
    {
        echo "m160229_154612_foreign_keys cannot be reverted.\n";

        return false;
    }

}
