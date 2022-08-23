<?php

namespace app\controllers;

use app\models\Pasien;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class PasienController extends Controller
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
        $getData = Pasien::find()->all();
        return $this->render('index', [
            'data' => $getData,
            'title' => 'pasien'
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionCreate()
    {
        $pasien = new Pasien();
        $formData = Yii::$app->request->post();
        if ($pasien->load($formData)) {
            $tanggal_lahir_pasien = strtotime($formData['Pasien']['tanggal_lahir_pasien']);
            $tanggal_lahir_pasien = date('Y-m-d', $tanggal_lahir_pasien);

            $upload = $this->uploadImage();
            $pasien->gambar_pasien = $upload;
            $pasien->tanggal_lahir_pasien = $tanggal_lahir_pasien;

            if ($pasien->save()) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil menambahkan data pasien');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal menambahkan data pasien');
            }
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'title' => 'Form tambah pasien',
            'pasien' => $pasien
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionUpdate($id)
    {
        $pasien = Pasien::findOne($id);
        if ($pasien->load(Yii::$app->request->post())) {
            $formData = Yii::$app->request->post();

            $tanggal_lahir_pasien = strtotime($formData['Pasien']['tanggal_lahir_pasien']);
            $tanggal_lahir_pasien = date('Y-m-d', $tanggal_lahir_pasien);

            $upload = $this->uploadImage($id);
            $pasien->gambar_pasien = $upload;
            $pasien->tanggal_lahir_pasien = $tanggal_lahir_pasien;
            if ($pasien->save()) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil mengubah data pasien');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal mengubah data pasien');
            }
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'title' => 'Form edit pasien',
            'pasien' => $pasien
        ]);
    }

    public function actionDelete($id)
    {
        $pasien = Pasien::findOne($id);
        $this->deleteImage($id);
        $delete = $pasien->delete();
        if ($pasien) {
            Yii::$app->getSession()->setFlash('success', 'Berhasil menghapus data');
        } else {
            Yii::$app->getSession()->setFlash('error', 'Gagal menghapus data');
        }
        return $this->redirect(['index']);
    }

    private function uploadImage($id = null)
    {

        $uploadPath = Yii::getAlias('uploads/pasien/');
        if (isset($_FILES['Pasien']['name']['gambar_pasien'])) {
            if ($_FILES['Pasien']['name']['gambar_pasien'] != null || $_FILES['Pasien']['name']['gambar_pasien'] != '') {
                if ($id != null) {
                    $this->deleteImage($id);
                }
                $model = new Pasien();
                $file = UploadedFile::getInstance($model, 'gambar_pasien');
                $original_name = $file->baseName;
                $newFileName = \Yii::$app->security
                    ->generateRandomString() . '.' . $file->extension;

                // you can write save code here before uploading.
                if ($file->saveAs($uploadPath . '/' . $newFileName)) {
                    return $newFileName;
                }
            }
        } else {
            if ($id != null) {
                $pasien = Pasien::findOne($id);
                if ($pasien->gambar_pasien != null) {
                    return $pasien->gambar_pasien;
                }
            }
        }
        return null;
    }

    private function deleteImage($id = null)
    {
        if ($id != null) {
            $pasien = Pasien::findOne($id);
            $path = Yii::getAlias('uploads/pasien');
            $filename = $pasien->gambar_pasien;
            $fullpath = $path . "/" . $filename;
            @unlink($fullpath);
            return true;
        }
    }
}
