<?php

use yii\db\Migration;

/**
 * Handles adding sort_order to table `slider`.
 */
class m170409_045150_add_sort_order_column_to_slider_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('slider',
            'sort_order',
        $this->smallInteger()->unsigned()->notNull()
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('slider', 'sort_order');
    }
}
