<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class JenisLayanan extends ActiveRecord
{
    private $nama_layanan;

    public static function tableName()
    {
        return 'master_layanan';
    }
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['nama_layanan'], 'required'],
        ];
    }
}
