<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class StatusRegistrasi extends ActiveRecord
{
    private $nama_statusRegistrasi;

    public static function tableName()
    {
        return 'master_statusregistrasi';
    }
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['nama_statusRegistrasi'], 'required'],
        ];
    }
}
