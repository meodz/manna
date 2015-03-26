<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use common\models\User;
use common\models\GroupRole;
use common\models\Role;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public $clientScript;
    public $baseUrl;

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    public function init() {
        parent::init();
        $this->baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . str_replace("index.php", '', $_SERVER['SCRIPT_NAME']);
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex() {
        if (Yii::$app->user->isGuest)
            $this->redirect(Yii::$app->getUrlManager()->createUrl('site/login'));
        return $this->render('index');
    }

    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            $this->redirect(Yii::$app->getUrlManager()->createUrl('site/index'));
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $user = User::find()->where(['username' => $model->username])->one();
            Yii::$app->session->set('user', $user);
            $grouproles = GroupRole::find()->where(['groupId' => $user->groupId])->all();
            $roles = Role::find()->all();
            $userroles = [];
            foreach ($roles as $role) {
                foreach ($grouproles as $gr) {
                    if ($role->id == $gr->roleId)
                        $userroles[] = $role->action;
                }
            }
            Yii::$app->session->set('roles', $userroles);
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();
        Yii::$app->session->set('user', null);
        return $this->goHome();
    }

}
