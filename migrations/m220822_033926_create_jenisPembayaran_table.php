<?php

use yii\db\Migration;

/**
 * Handles the creation of table `master_jenisPembayaran`.
 */
class m220822_033926_create_jenisPembayaran_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('master_jenisPembayaran', [
            'id' => $this->primaryKey(),
            'nama_jenisPembayaran' => $this->string(200)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('master_jenisPembayaran');
    }
}
