<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Pasien extends ActiveRecord
{
    private $nama_pasien;
    private $jenis_kelamin_pasien;
    private $tempat_lahir_pasien;
    private $tanggal_lahir_pasien;
    private $gambar_pasien;

    public static function tableName()
    {
        return 'master_pasien';
    }
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                ['nama_pasien', 'jenis_kelamin_pasien', 'tempat_lahir_pasien', 'tanggal_lahir_pasien'], 'required'
            ],
            [['gambar_pasien'], 'file', 'extensions' => ['png', 'jpg', 'gif', 'jpeg'], 'maxSize' => 1024 * 1024 * 2],
        ];
    }
}
