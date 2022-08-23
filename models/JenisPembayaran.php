<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class JenisPembayaran extends ActiveRecord
{
    private $nama_jenisPembayaran;

    public static function tableName()
    {
        return 'master_jenispembayaran';
    }
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['nama_jenisPembayaran'], 'required'],
        ];
    }
}
