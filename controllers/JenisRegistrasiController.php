<?php

namespace app\controllers;

use app\models\JenisRegistrasi;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class JenisRegistrasiController extends Controller
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
        $getData = JenisRegistrasi::find()->all();
        return $this->render('index', [
            'data' => $getData,
            'title' => 'Jenis registrasi'
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionCreate()
    {
        $jenisRegistrasi = new JenisRegistrasi();
        $formData = Yii::$app->request->post();
        if ($jenisRegistrasi->load($formData)) {
            if ($jenisRegistrasi->save()) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil menambahkan data Jenis registrasi');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal menambahkan data Jenis registrasi');
            }
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'title' => 'Form tambah Jenis registrasi',
            'jenisRegistrasi' => $jenisRegistrasi
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionUpdate($id)
    {
        $jenisRegistrasi = JenisRegistrasi::findOne($id);
        if ($jenisRegistrasi->load(Yii::$app->request->post())) {
            if ($jenisRegistrasi->save()) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil mengubah data Jenis registrasi');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal mengubah data Jenis registrasi');
            }
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'title' => 'Form edit Jenis registrasi',
            'jenisRegistrasi' => $jenisRegistrasi
        ]);
    }

    public function actionDelete($id)
    {
        $jenisRegistrasi = JenisRegistrasi::findOne($id);
        $delete = $jenisRegistrasi->delete();
        if ($jenisRegistrasi) {
            Yii::$app->getSession()->setFlash('success', 'Berhasil menghapus data');
        } else {
            Yii::$app->getSession()->setFlash('error', 'Gagal menghapus data');
        }
        return $this->redirect(['index']);
    }
}
