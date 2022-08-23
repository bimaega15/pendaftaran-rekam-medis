<?php

use yii\db\Migration;

/**
 * Handles the creation of table `master_layanan`.
 */
class m220822_033900_create_layanan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('master_layanan', [
            'id' => $this->primaryKey(),
            'nama_layanan' => $this->string(200)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('master_layanan');
    }
}
