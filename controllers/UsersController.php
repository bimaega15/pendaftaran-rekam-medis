<?php

namespace app\controllers;

use app\models\Users;
use Yii;
use yii\db\Connection;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class UsersController extends Controller
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
        $getData = Users::find()->all();
        return $this->render('index', [
            'data' => $getData,
            'title' => 'users'
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionCreate()
    {
        $users = new Users();
        $formData = Yii::$app->request->post();
        if ($users->load($formData)) {
            $tanggal_lahir_users = strtotime($formData['Users']['tanggal_lahir_users']);
            $tanggal_lahir_users = date('Y-m-d', $tanggal_lahir_users);

            $upload = $this->uploadImage();
            $users->gambar_users = $upload;
            $users->tanggal_lahir_users = $tanggal_lahir_users;
            $users->password_users = md5($formData['Users']['password_users']);

            if ($users->save(false)) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil menambahkan data users');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal menambahkan data users');
            }
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'title' => 'Form tambah users',
            'users' => $users
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionUpdate($id)
    {
        $users = Users::findOne($id);
        if ($users->load(Yii::$app->request->post())) {
            $formData = Yii::$app->request->post();

            $password_users = $formData['Users']['password_users_old'];
            if ($formData['Users']['password_users'] != null) {
                $password_users = md5($formData['Users']['password_users']);
            }

            $tanggal_lahir_users = strtotime($formData['Users']['tanggal_lahir_users']);
            $tanggal_lahir_users = date('Y-m-d', $tanggal_lahir_users);
            $users->password_users = $password_users;

            $upload = $this->uploadImage($id);
            $users->gambar_users = $upload;
            $users->tanggal_lahir_users = $tanggal_lahir_users;
            if ($users->save(false)) {
                Yii::$app->getSession()->setFlash('success', 'Berhasil mengubah data users');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Gagal mengubah data users');
            }
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'title' => 'Form edit users',
            'users' => $users
        ]);
    }

    public function actionDelete($id)
    {
        $users = Users::findOne($id);
        $this->deleteImage($id);
        $delete = $users->delete();
        if ($users) {
            Yii::$app->getSession()->setFlash('success', 'Berhasil menghapus data');
        } else {
            Yii::$app->getSession()->setFlash('error', 'Gagal menghapus data');
        }
        return $this->redirect(['index']);
    }

    private function uploadImage($id = null)
    {

        $uploadPath = Yii::getAlias('uploads/users/');
        if (isset($_FILES['Users']['name']['gambar_users'])) {
            if ($_FILES['Users']['name']['gambar_users'] != null || $_FILES['Users']['name']['gambar_users'] != '') {
                if ($id != null) {
                    $this->deleteImage($id);
                }
                $model = new Users();
                $file = UploadedFile::getInstance($model, 'gambar_users');
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
                $users = Users::findOne($id);
                if ($users->gambar_users != null) {
                    return $users->gambar_users;
                }
            }
        }
        return null;
    }

    private function deleteImage($id = null)
    {
        if ($id != null) {
            $users = Users::findOne($id);
            $path = Yii::getAlias('uploads/users');
            $filename = $users->gambar_users;
            $fullpath = $path . "/" . $filename;
            @unlink($fullpath);
            return true;
        }
    }
}
