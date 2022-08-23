<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\mssql\PDO;
use yii\db\Query;

/**
 * ContactForm is the model behind the contact form.
 */
class RekamMedis extends ActiveRecord
{
    private $pasien_id;
    private $no_rekamMedis;

    public static function tableName()
    {
        return 'trx_rekammedis';
    }
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                ['pasien_id', 'no_rekamMedis'], 'required'
            ],
            [
                'no_rekamMedis', 'unique'
            ]
        ];
    }

    public function joinData()
    {
        $query = new Query();
        $query->select(
            [
                'trx_rekammedis.*',
                'master_pasien.nama_pasien',
                'master_pasien.jenis_kelamin_pasien',
                'master_pasien.tempat_lahir_pasien',
                'master_pasien.tanggal_lahir_pasien',
                'master_pasien.gambar_pasien',
            ]
        )
            ->from('trx_rekammedis')
            ->join(
                'LEFT OUTER JOIN',
                'master_pasien',
                'trx_rekammedis.pasien_id =master_pasien.id'
            );

        $command = $query->createCommand();
        $data =  $command->queryAll(PDO::FETCH_OBJ);
        return $data;
    }
}
