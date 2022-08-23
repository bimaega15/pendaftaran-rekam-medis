<?php

namespace app\controllers;

use app\models\Pasien;
use app\models\RekamMedis;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class RekamMedisController extends Controller
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

        $rekamMedis = new RekamMedis();
        $getData = $rekamMedis->joinData();

        return $this->render('index', [
            'data' => $getData,
            'title' => 'Rekam Medis'
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionCreate()
    {
        $rekamMedis = new RekamMedis();
        $formData = Yii::$app->request->post();
        if ($rekamMedis->load($formData)) {
            if ($rekamMedis->save()) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil menambahkan data Rekam Medis');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal menambahkan data Rekam Medis');
            }
            return $this->redirect(['index']);
        }
        $pasien = Pasien::find()->all();
        $dataPasien = [];
        foreach ($pasien as $key => $r_pasien) {
            $dataPasien[$r_pasien->id] = $r_pasien->nama_pasien . ' ' . $r_pasien->tempat_lahir_pasien . ' ' . date('d-M-Y', strtotime($r_pasien->tanggal_lahir_pasien));
        }

        return $this->render('create', [
            'title' => 'Form tambah Rekam Medis',
            'rekamMedis' => $rekamMedis,
            'pasien' => $dataPasien
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionUpdate($id)
    {
        $rekamMedis = RekamMedis::findOne($id);
        if ($rekamMedis->load(Yii::$app->request->post())) {
            if ($rekamMedis->save()) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil mengubah data Rekam Medis');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal mengubah data Rekam Medis');
            }
            return $this->redirect(['index']);
        }
        $pasien = Pasien::find()->all();
        $dataPasien = [];
        foreach ($pasien as $key => $r_pasien) {
            $dataPasien[$r_pasien->id] = $r_pasien->nama_pasien . ' ' . $r_pasien->tempat_lahir_pasien . ' ' . date('d-M-Y', strtotime($r_pasien->tanggal_lahir_pasien));
        }
        return $this->render('update', [
            'title' => 'Form edit Rekam Medis',
            'rekamMedis' => $rekamMedis,
            'pasien' => $dataPasien
        ]);
    }

    public function actionDelete($id)
    {
        $rekamMedis = RekamMedis::findOne($id);
        $delete = $rekamMedis->delete();
        if ($rekamMedis) {
            Yii::$app->getSession()->setFlash('success', 'Berhasil menghapus data');
        } else {
            Yii::$app->getSession()->setFlash('error', 'Gagal menghapus data');
        }
        return $this->redirect(['index']);
    }
}
