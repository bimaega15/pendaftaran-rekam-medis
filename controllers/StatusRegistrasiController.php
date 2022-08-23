<?php

namespace app\controllers;

use app\models\StatusRegistrasi;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class StatusRegistrasiController extends Controller
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
        $getData = StatusRegistrasi::find()->all();
        return $this->render('index', [
            'data' => $getData,
            'title' => 'Status Registrasi'
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionCreate()
    {
        $statusRegistrasi = new StatusRegistrasi();
        $formData = Yii::$app->request->post();
        if ($statusRegistrasi->load($formData)) {
            if ($statusRegistrasi->save()) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil menambahkan data Status Registrasi');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal menambahkan data Status Registrasi');
            }
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'title' => 'Form tambah Status Registrasi',
            'statusRegistrasi' => $statusRegistrasi
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionUpdate($id)
    {
        $statusRegistrasi = StatusRegistrasi::findOne($id);
        if ($statusRegistrasi->load(Yii::$app->request->post())) {
            if ($statusRegistrasi->save()) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil mengubah data Status Registrasi');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal mengubah data Status Registrasi');
            }
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'title' => 'Form edit Status Registrasi',
            'statusRegistrasi' => $statusRegistrasi
        ]);
    }

    public function actionDelete($id)
    {
        $statusRegistrasi = StatusRegistrasi::findOne($id);
        $delete = $statusRegistrasi->delete();
        if ($statusRegistrasi) {
            Yii::$app->getSession()->setFlash('success', 'Berhasil menghapus data');
        } else {
            Yii::$app->getSession()->setFlash('error', 'Gagal menghapus data');
        }
        return $this->redirect(['index']);
    }
}
