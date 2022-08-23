<?php

use yii\db\Migration;

/**
 * Handles the creation of table `master_jenisRegistrasi`.
 */
class m220822_033913_create_jenisRegistrasi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('master_jenisRegistrasi', [
            'id' => $this->primaryKey(),
            'nama_jenisRegistrasi' => $this->string(200)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('master_jenisRegistrasi');
    }
}
