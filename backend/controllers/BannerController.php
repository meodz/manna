<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use share\models\Banner;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

class BannerController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['generalManager', 'marketingManager', 'marketingAgent'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $this->view->title = 'Quản trị banner | Joma.vn';

        $dataProvider = new ActiveDataProvider([
            'query' => Banner::find(),
            'pagination' => [
                'pageSize' => 100
            ],
            'sort' => [
                'defaultOrder' => [
                    'place' => SORT_ASC,
                    'position' => SORT_ASC,
                ]
            ],
        ]);

        return $this->render('index', [
                    'data' => $dataProvider,
        ]);
    }

    public function actionNew() {
        $model = new Banner();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Thêm banner thành công!');
                $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'Thêm banner thất bại!');
            }
        }
        return $this->render('new', [
                    'model' => $model,
        ]);
    }

    public function actionUpdate($id) {
        $model = Banner::findOne($id);

        if ($model == null) {
            Yii::$app->session->setFlash('error', 'Banner không tồn tại không thể sửa được!');
            $this->redirect(['index']);
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Sửa banner thành công!');
                $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'Sửa banner thất bại!');
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function actionDelete($id) {
        $model = Banner::findOne($id);
        if (isset($model)) {
            Yii::$app->session->setFlash('success', 'Xóa banner thành công!');
            $model->delete();
        } else {
            Yii::$app->session->setFlash('error', 'Banner không tồn tại, không thể xóa!');
        }
        $this->redirect(['index']);
    }

}
