<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trx_rekamMedisDetail`.
 */
class m220822_034008_create_rekamMedisDetail_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('trx_rekamMedisDetail', [
            'id' => $this->primaryKey(),
            'trx_rekamMedis_id' => $this->integer()->notNull(),
            'waktu_registrasi_detail' => $this->dateTime(),
            'no_registrasi_detail' => $this->string(50)->notNull(),
            'master_jenisRegistrasi_id' => $this->integer()->notNull(),
            'master_layanan_id' => $this->integer()->notNull(),
            'master_jenisPembayaran_id' => $this->integer()->notNull(),
            'master_statusRegistrasi_id' => $this->integer()->notNull(),
            'waktu_mulai_detail' => $this->dateTime()->notNull(),
            'waktu_selesai_detail' => $this->dateTime()->null(),
            'master_users_id' => $this->integer()->notNull()
        ]);

        $this->createIndex(
            'idx-trx_rekamMedisDetail-trx_rekamMedis_id',
            'trx_rekamMedisDetail',
            'trx_rekamMedis_id'
        );

        $this->addForeignKey(
            'fk-trx_rekamMedisDetail-trx_rekamMedis_id',
            'trx_rekamMedisDetail',
            'trx_rekamMedis_id',
            'trx_rekamMedis',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'idx-trx_rekamMedisDetail-master_jenisRegistrasi_id',
            'trx_rekamMedisDetail',
            'master_jenisRegistrasi_id'
        );

        $this->addForeignKey(
            'fk-trx_rekamMedisDetail-master_jenisRegistrasi_id',
            'trx_rekamMedisDetail',
            'master_jenisRegistrasi_id',
            'master_jenisRegistrasi',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'idx-trx_rekamMedisDetail-master_layanan_id',
            'trx_rekamMedisDetail',
            'master_layanan_id'
        );

        $this->addForeignKey(
            'fk-trx_rekamMedisDetail-master_layanan_id',
            'trx_rekamMedisDetail',
            'master_layanan_id',
            'master_layanan',
            'id',
            'CASCADE',
            'CASCADE'
        );


        $this->createIndex(
            'idx-trx_rekamMedisDetail-master_jenisPembayaran_id',
            'trx_rekamMedisDetail',
            'master_jenisPembayaran_id'
        );

        $this->addForeignKey(
            'fk-trx_rekamMedisDetail-master_jenisPembayaran_id',
            'trx_rekamMedisDetail',
            'master_jenisPembayaran_id',
            'master_jenisPembayaran',
            'id',
            'CASCADE',
            'CASCADE'
        );


        $this->createIndex(
            'idx-trx_rekamMedisDetail-master_statusRegistrasi_id',
            'trx_rekamMedisDetail',
            'master_statusRegistrasi_id'
        );

        $this->addForeignKey(
            'fk-trx_rekamMedisDetail-master_statusRegistrasi_id',
            'trx_rekamMedisDetail',
            'master_statusRegistrasi_id',
            'master_statusRegistrasi',
            'id',
            'CASCADE',
            'CASCADE'
        );


        $this->createIndex(
            'idx-trx_rekamMedisDetail-master_users_id',
            'trx_rekamMedisDetail',
            'master_users_id'
        );

        $this->addForeignKey(
            'fk-trx_rekamMedisDetail-master_users_id',
            'trx_rekamMedisDetail',
            'master_users_id',
            'master_users',
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
        $this->dropTable('trx_rekamMedisDetail');
    }
}
