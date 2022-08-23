<?php

namespace app\controllers;

use app\models\jenisPembayaran;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class JenisPembayaranController extends Controller
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
        $getData = JenisPembayaran::find()->all();
        return $this->render('index', [
            'data' => $getData,
            'title' => 'Jenis Pembayaran'
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionCreate()
    {
        $jenisPembayaran = new JenisPembayaran();
        $formData = Yii::$app->request->post();
        if ($jenisPembayaran->load($formData)) {
            if ($jenisPembayaran->save()) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil menambahkan data Jenis Pembayaran');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal menambahkan data Jenis Pembayaran');
            }
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'title' => 'Form tambah Jenis Pembayaran',
            'jenisPembayaran' => $jenisPembayaran
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionUpdate($id)
    {
        $jenisPembayaran = JenisPembayaran::findOne($id);
        if ($jenisPembayaran->load(Yii::$app->request->post())) {
            if ($jenisPembayaran->save()) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil mengubah data Jenis Pembayaran');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal mengubah data Jenis Pembayaran');
            }
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'title' => 'Form edit Jenis Pembayaran',
            'jenisPembayaran' => $jenisPembayaran
        ]);
    }

    public function actionDelete($id)
    {
        $jenisPembayaran = JenisPembayaran::findOne($id);
        $delete = $jenisPembayaran->delete();
        if ($jenisPembayaran) {
            Yii::$app->getSession()->setFlash('success', 'Berhasil menghapus data');
        } else {
            Yii::$app->getSession()->setFlash('error', 'Gagal menghapus data');
        }
        return $this->redirect(['index']);
    }
}
