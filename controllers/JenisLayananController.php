<?php

namespace app\controllers;

use app\models\JenisLayanan;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class JenisLayananController extends Controller
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
        $getData = JenisLayanan::find()->all();
        return $this->render('index', [
            'data' => $getData,
            'title' => 'Jenis layanan'
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionCreate()
    {
        $jenisLayanan = new JenisLayanan();
        $formData = Yii::$app->request->post();
        if ($jenisLayanan->load($formData)) {
            if ($jenisLayanan->save()) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil menambahkan data jenis layanan');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal menambahkan data jenis layanan');
            }
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'title' => 'Form tambah jenis layanan',
            'jenisLayanan' => $jenisLayanan
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionUpdate($id)
    {
        $jenisLayanan = JenisLayanan::findOne($id);
        if ($jenisLayanan->load(Yii::$app->request->post())) {
            if ($jenisLayanan->save()) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil mengubah data jenis layanan');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal mengubah data jenis layanan');
            }
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'title' => 'Form edit jenis layanan',
            'jenisLayanan' => $jenisLayanan
        ]);
    }

    public function actionDelete($id)
    {
        $jenisLayanan = JenisLayanan::findOne($id);
        $delete = $jenisLayanan->delete();
        if ($jenisLayanan) {
            Yii::$app->getSession()->setFlash('success', 'Berhasil menghapus data');
        } else {
            Yii::$app->getSession()->setFlash('error', 'Gagal menghapus data');
        }
        return $this->redirect(['index']);
    }
}
