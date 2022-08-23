<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\mssql\PDO;
use yii\db\Query;

/**
 * ContactForm is the model behind the contact form.
 */
class RekamMedisDetail extends ActiveRecord
{
    private $trx_rekamMedis_id;
    private $waktu_registrasi_detail;
    private $no_registrasi_detail;
    private $master_jenisRegistrasi_id;
    private $master_layanan_id;
    private $master_jenisPembayaran_id;
    private $master_statusRegistrasi_id;
    private $waktu_mulai_detail;
    private $waktu_selesai_detail;
    private $master_users_id;

    public static function tableName()
    {
        return 'trx_rekammedisdetail';
    }
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                ['trx_rekamMedis_id', 'waktu_registrasi_detail', 'no_registrasi_detail', 'master_jenisRegistrasi_id', 'master_layanan_id', 'master_jenisPembayaran_id', 'master_statusRegistrasi_id', 'master_users_id'], 'required'
            ],
        ];
    }

    public function joinData($id = null, $trx_rekammedis_id = null)
    {
        $query = new Query();
        $query->select(
            [
                'trx_rekammedisdetail.id',
                'trx_rekammedis.id as id_trx_rekammedis',
                'trx_rekammedis.no_rekamMedis',
                'trx_rekammedisdetail.waktu_registrasi_detail',
                'trx_rekammedisdetail.no_registrasi_detail',
                'master_jenisregistrasi.nama_jenisRegistrasi',
                'master_layanan.nama_layanan',
                'master_jenispembayaran.nama_jenisPembayaran',
                'master_statusregistrasi.nama_statusRegistrasi',
                'trx_rekammedisdetail.waktu_mulai_detail',
                'trx_rekammedisdetail.waktu_selesai_detail',
                'master_users.nama_users',
                'master_pasien.nama_pasien',
                'master_pasien.jenis_kelamin_pasien',
                'master_pasien.tempat_lahir_pasien',
                'master_pasien.tanggal_lahir_pasien',
                'master_pasien.gambar_pasien',
            ]
        )
            ->from('trx_rekammedisdetail')
            ->join(
                'LEFT OUTER JOIN',
                'trx_rekammedis',
                'trx_rekammedis.id = trx_rekammedisdetail.trx_rekamMedis_id'
            )
            ->join(
                'LEFT OUTER JOIN',
                'master_jenisregistrasi',
                'master_jenisregistrasi.id = trx_rekammedisdetail.master_jenisRegistrasi_id'
            )
            ->join(
                'LEFT OUTER JOIN',
                'master_layanan',
                'master_layanan.id = trx_rekammedisdetail.master_layanan_id'
            )
            ->join(
                'LEFT OUTER JOIN',
                'master_jenispembayaran',
                'master_jenispembayaran.id = trx_rekammedisdetail.master_jenisPembayaran_id'
            )
            ->join(
                'LEFT OUTER JOIN',
                'master_statusregistrasi',
                'master_statusregistrasi.id = trx_rekammedisdetail.master_statusRegistrasi_id'
            )
            ->join(
                'LEFT OUTER JOIN',
                'master_users',
                'master_users.id = trx_rekammedisdetail.master_users_id'
            )
            ->join(
                'LEFT OUTER JOIN',
                'master_pasien',
                'master_pasien.id = trx_rekammedis.pasien_id'
            );
        if ($id != null) {
            $query->where('trx_rekammedisdetail.id = :id', [':id' => $id]);
        }
        if ($trx_rekammedis_id != null) {
            $query->where('trx_rekammedisdetail.trx_rekamMedis_id = :trx_rekamMedis_id', [':trx_rekamMedis_id' => $trx_rekammedis_id]);
        }

        $command = $query->createCommand();
        $data =  $command->queryAll(PDO::FETCH_OBJ);
        return $data;
    }
}
