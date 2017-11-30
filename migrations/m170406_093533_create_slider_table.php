<?php

use yii\db\Migration;

/**
 * Handles the creation of table `slider`.
 */
class m170406_093533_create_slider_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('slider', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'pic' => $this->string()->notNull(),
            'url' => $this->text(),
            'create_datetime' => $this->datetime(),
            'update_datetime' => $this->datetime(),
            'is_public' => $this->boolean(),
        ],$tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('slider');
    }
}
