<?php

use yii\db\Migration;

/**
 * Handles the creation of table `master_users`.
 */
class m220822_033950_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('master_users', [
            'id' => $this->primaryKey(),
            'username_users' => $this->string(250)->notNull(),
            'password_users' => $this->string(250)->notNull(),
            'nama_users' => $this->string(200)->notNull(),
            'jenis_kelamin_users' => "ENUM('P', 'L') NOT NULL",
            'tempat_lahir_users' => $this->string(200)->notNull(),
            'tanggal_lahir_users' => $this->date()->notNull(),
            'alamat_users' => $this->text()->notNull(),
            'gambar_users' => $this->string(250)->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('master_users');
    }
}
