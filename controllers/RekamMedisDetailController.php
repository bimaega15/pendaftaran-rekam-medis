<?php

namespace app\controllers;

use app\models\JenisLayanan;
use app\models\JenisPembayaran;
use app\models\JenisRegistrasi;
use app\models\Pasien;
use app\models\RekamMedisDetail;
use app\models\StatusRegistrasi;
use app\models\Users;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class RekamMedisDetailController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $rekamMedisDetail = new RekamMedisDetail();
        $trx_rekammedis_id = Yii::$app->request->get()['rekamMedis_id'];
        $getData = $rekamMedisDetail->joinData(null, $trx_rekammedis_id);

        return $this->render('index', [
            'data' => $getData,
            'title' => 'Rekam Medis detail',
            'trx_rekammedis_id' => $trx_rekammedis_id
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionCreate()
    {
        $trx_rekammedis_id = Yii::$app->request->get()['rekamMedis_id'];
        $rekamMedisDetail = new RekamMedisDetail();
        $formData = Yii::$app->request->post();
        if ($rekamMedisDetail->load($formData)) {
            $waktu_registrasi_detail = strtotime($formData['RekamMedisDetail']['waktu_registrasi_detail']);
            $waktu_registrasi_detail = date('Y-m-d H:i', $waktu_registrasi_detail);

            $rekamMedisDetail->waktu_registrasi_detail = $waktu_registrasi_detail;
            $rekamMedisDetail->waktu_mulai_detail = $waktu_registrasi_detail;

            if ($rekamMedisDetail->save()) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil menambahkan data Rekam Medis detail');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal menambahkan data Rekam Medis detail');
            }
            return $this->redirect(['index?rekamMedis_id=' . $trx_rekammedis_id]);
        }

        // jenisRegistrasi
        $jenisRegistrasi = JenisRegistrasi::find()->all();
        $dataJenisRegistrasi = [];
        foreach ($jenisRegistrasi as $key => $r_jenisRegistrasi) {
            $dataJenisRegistrasi[$r_jenisRegistrasi->id] = $r_jenisRegistrasi->nama_jenisRegistrasi;
        }

        // layanan
        $layanan = JenisLayanan::find()->all();
        $dataLayanan = [];
        foreach ($layanan as $key => $r_layanan) {
            $dataLayanan[$r_layanan->id] = $r_layanan->nama_layanan;
        }

        // jenisPembayaran
        $jenisPembayaran = JenisPembayaran::find()->all();
        $dataJenisPembayaran = [];
        foreach ($jenisPembayaran as $key => $r_jenisPembayaran) {
            $dataJenisPembayaran[$r_jenisPembayaran->id] = $r_jenisPembayaran->nama_jenisPembayaran;
        }

        // statusRegistrasi
        $statusRegistrasi = StatusRegistrasi::find()->all();
        $dataStatusRegistrasi = [];
        foreach ($statusRegistrasi as $key => $r_statusRegistrasi) {
            $dataStatusRegistrasi[$r_statusRegistrasi->id] = $r_statusRegistrasi->nama_statusRegistrasi;
        }

        // users
        $users = Users::find()->all();
        $dataUsers = [];
        foreach ($users as $key => $r_users) {
            $dataUsers[$r_users->id] = $r_users->nama_users;
        }

        return $this->render('create', [
            'title' => 'Form tambah Rekam Medis detail',
            'rekamMedisDetail' => $rekamMedisDetail,
            'jenisRegistrasi' => $dataJenisRegistrasi,
            'layanan' => $dataLayanan,
            'jenisPembayaran' => $dataJenisPembayaran,
            'statusRegistrasi' => $dataStatusRegistrasi,
            'users' => $dataUsers,
            'trx_rekammedis_id' => $trx_rekammedis_id
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionUpdate($id)
    {
        $trx_rekammedis_id = Yii::$app->request->get()['rekamMedis_id'];
        $rekamMedisDetail = RekamMedisDetail::findOne($id);
        if ($rekamMedisDetail->load(Yii::$app->request->post())) {
            $formData = Yii::$app->request->post();
            $waktu_registrasi_detail = strtotime($formData['RekamMedisDetail']['waktu_registrasi_detail']);
            $waktu_registrasi_detail = date('Y-m-d H:i', $waktu_registrasi_detail);

            $rekamMedisDetail->waktu_registrasi_detail = $waktu_registrasi_detail;
            $rekamMedisDetail->waktu_mulai_detail = $waktu_registrasi_detail;
            if ($rekamMedisDetail->save()) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil mengubah data Rekam Medis detail');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal mengubah data Rekam Medis detail');
            }
            return $this->redirect(['index?rekamMedis_id=' . $trx_rekammedis_id]);
        }

        // jenisRegistrasi
        $jenisRegistrasi = JenisRegistrasi::find()->all();
        $dataJenisRegistrasi = [];
        foreach ($jenisRegistrasi as $key => $r_jenisRegistrasi) {
            $dataJenisRegistrasi[$r_jenisRegistrasi->id] = $r_jenisRegistrasi->nama_jenisRegistrasi;
        }

        // layanan
        $layanan = JenisLayanan::find()->all();
        $dataLayanan = [];
        foreach ($layanan as $key => $r_layanan) {
            $dataLayanan[$r_layanan->id] = $r_layanan->nama_layanan;
        }

        // jenisPembayaran
        $jenisPembayaran = JenisPembayaran::find()->all();
        $dataJenisPembayaran = [];
        foreach ($jenisPembayaran as $key => $r_jenisPembayaran) {
            $dataJenisPembayaran[$r_jenisPembayaran->id] = $r_jenisPembayaran->nama_jenisPembayaran;
        }

        // statusRegistrasi
        $statusRegistrasi = StatusRegistrasi::find()->all();
        $dataStatusRegistrasi = [];
        foreach ($statusRegistrasi as $key => $r_statusRegistrasi) {
            $dataStatusRegistrasi[$r_statusRegistrasi->id] = $r_statusRegistrasi->nama_statusRegistrasi;
        }

        // users
        $users = Users::find()->all();
        $dataUsers = [];
        foreach ($users as $key => $r_users) {
            $dataUsers[$r_users->id] = $r_users->nama_users;
        }

        return $this->render('update', [
            'title' => 'Form edit Rekam Medis detail',
            'rekamMedisDetail' => $rekamMedisDetail,
            'jenisRegistrasi' => $dataJenisRegistrasi,
            'layanan' => $dataLayanan,
            'jenisPembayaran' => $dataJenisPembayaran,
            'statusRegistrasi' => $dataStatusRegistrasi,
            'users' => $dataUsers,
            'trx_rekammedis_id' => $trx_rekammedis_id
        ]);
    }

    public function actionTutupKunjungan($id)
    {
        $trx_rekammedis_id = Yii::$app->request->get()['rekamMedis_id'];
        $getData = RekamMedisDetail::findOne($id);
        $getData->waktu_selesai_detail = date('Y-m-d H:i');
        if ($getData->save()) {
            Yii::$app->getSession()->setFlash('success', 'Berhasil tutup kunjugan pasien');
        } else {
            Yii::$app->getSession()->setFlash('error', 'Gagal tutup kunjugan pasien');
        }
        return $this->redirect(['index?rekamMedis_id=' . $trx_rekammedis_id]);
    }

    public function actionDelete($id)
    {
        $rekamMedisDetail = RekamMedisDetail::findOne($id);
        $delete = $rekamMedisDetail->delete();
        if ($rekamMedisDetail) {
            Yii::$app->getSession()->setFlash('success', 'Berhasil menghapus data');
        } else {
            Yii::$app->getSession()->setFlash('error', 'Gagal menghapus data');
        }
        return $this->redirect(['index']);
    }
}
