<?php

namespace backend\controllers;

use Yii;
use common\models\Course;
use backend\component\BaseController;
    use yii\data\ActiveDataProvider;

/**
 * Course controller
 */
class CourseController extends BaseController {

    public function actionIndex($type = 0, $name = '', $teacher = '', $id = 0) {
//        $this->view->title = 'Quản trị tin tức | Joma.vn';

        $query = Course::find();
        if ($type != 0) {
            $query->andWhere(['groupId' => $groupId]);
        }
        if ($id != 0) {
            $query->andWhere(['id' => $id]);
        }

        if($name != ''){
            $query->andWhere(['like', 'name', $name]);
        }

        if($teacher != ''){
            $query->andWhere(['like', 'teacher', $teacher]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100
            ],
            'sort' => [
                'defaultOrder' => [
//                    'position' => SORT_ASC,
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index', [
                    'data' => $dataProvider,
                    'type' => $type,
                    'types' => $this->getType(),
                    'name' => $name,
                    'id' => $id,
                    'teacher' => $teacher
        ]);
    }
    public function actionDelete($id) {
        $model = Course::findOne($id);
        if (isset($model)) {
            Yii::$app->session->setFlash('success', 'Success!');
            $model->delete();
        } else {
            Yii::$app->session->setFlash('error', 'Course not found!');
        }
        $this->redirect(['index']);
    }

    public function actionCreate() {
        $model = new Course();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Success!');
                $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'Failed!');
            }
        }
        return $this->render('form', [
                    'model' => $model,
        ]);
    }

    public function actionEdit($id) {
        $model = Course::findOne($id);

        if ($model == null) {
            Yii::$app->session->setFlash('error', 'Course not found!');
            $this->redirect(['index']);
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Success!');
                $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'Failed!');
            }
        }
        return $this->render('form', [
                    'model' => $model,
        ]);
    }
    public function getType() {
        $groups = array();
        $groups[] = 'Tiếng Anh trẻ em';
        $groups[] = 'Tiếng Anh người lớn';
        $groups[] = 'Tiếng Anh giao tiếp';
        $groups[] = 'Luyện thi TOEIC';
        return $groups;
    }
}
