<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pasien`.
 */
class m220822_033842_create_pasien_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('master_pasien', [
            'id' => $this->primaryKey(),
            'nama_pasien' => $this->string(200)->notNull(),
            'jenis_kelamin_pasien' => "ENUM('P', 'L') NOT NULL",
            'tempat_lahir_pasien' => $this->string(200)->notNull(),
            'tanggal_lahir_pasien' => $this->date()->notNull(),
            'gambar_pasien' => $this->string(250)->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pasien');
    }
}
