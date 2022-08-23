<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trx_rekamMedis`.
 */
class m220822_034001_create_rekamMedis_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('trx_rekamMedis', [
            'id' => $this->primaryKey(),
            'pasien_id' => $this->integer()->notNull(),
            'no_rekamMedis' => $this->string(50)->notNull(),
        ]);

        // creates index for column `pasien_id`
        $this->createIndex(
            'idx-trx_rekamMedis-pasien_id',
            'trx_rekamMedis',
            'pasien_id'
        );

        // add foreign key for table `pasien`
        $this->addForeignKey(
            'fk-trx_rekamMedis-pasien_id',
            'trx_rekamMedis',
            'pasien_id',
            'master_pasien',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('trx_rekamMedis');
    }
}
