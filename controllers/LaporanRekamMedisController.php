<?php

namespace app\controllers;

use app\models\RekamMedisDetail;
use Yii;
use yii\web\Controller;

class LaporanRekamMedisController extends Controller
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
        $getData = $rekamMedisDetail->joinData();

        return $this->render('index', [
            'data' => $getData,
            'title' => 'Rekam Medis detail',
        ]);
    }
    public function actionCetakLaporan()
    {
        $rekamMedisDetail = new RekamMedisDetail();
        $getData = $rekamMedisDetail->joinData();

        return $this->renderPartial('cetak', [
            'data' => $getData
        ]);
    }
}
