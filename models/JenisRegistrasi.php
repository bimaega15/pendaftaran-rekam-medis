<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class JenisRegistrasi extends ActiveRecord
{
    private $nama_jenisRegistrasi;

    public static function tableName()
    {
        return 'master_jenisregistrasi';
    }
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['nama_jenisRegistrasi'], 'required'],
        ];
    }
}
