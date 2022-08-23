<?php

use yii\db\Migration;

/**
 * Handles the creation of table `master_statusRegistrasi`.
 */
class m220822_033940_create_statusRegistrasi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('master_statusRegistrasi', [
            'id' => $this->primaryKey(),
            'nama_statusRegistrasi' => $this->string(200)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('master_statusRegistrasi');
    }
}
