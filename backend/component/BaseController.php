<?php

namespace backend\component;

use yii;

//class BaseController extends \yii\rest\Controller{
class BaseController extends \yii\web\Controller {

    public $clientScript = '';
    public $user;
    public $roles;
    public $baseUrl;

    public function init() {
        parent::init();
        if (!Yii::$app->session->get('user'))
            $this->redirect(Yii::$app->getUrlManager()->createUrl('site/login'));
        $this->baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . str_replace("index.php", '', $_SERVER['SCRIPT_NAME']);
        $this->roles = Yii::$app->session->get('roles');
        $this->layout = 'main';
    }

    public function beforeAction($action) {
        $permision = false;
        foreach ($this->roles as $role) {
            if ($role == Yii::$app->controller->id)
                $permision = true;
        }
        if (!$permision)
            $this->redirect(Yii::$app->getUrlManager()->createUrl('site/index'));
        if (parent::beforeAction($action))
            return true;
        return false;
    }

    public function response($status, $message, $rs) {
        $this->layout = false;
        header('Content-type: application/json');
        try {
            if (is_array($rs)) {
                $tmp = [];
                foreach ($rs as $r) {
                    if (is_object($r) && isset($r->attributes))
                        @$tmp[] = array_filter($r->attributes);
                    else {
                        $tmp = $rs;
                        break;
                    }
                }
            } else {
                if (isset($rs->attributes))
                    $tmp = array_filter($rs->attributes);
                else
                    $tmp = $rs;
            }
            $result = ['status' => $status, 'message' => $message, 'data' => json_decode(json_encode($tmp), false)];
            echo json_encode($result);
        } catch (Exception $ex) {
            echo json_encode([false, $ex->getMessage(), $ex]);
        }
        Yii::$app->end();
    }

    public function getAssetsUrl() {
        if ($this->getModule() != null) {
            return $this->getModule()->getAssetsUrl();
        }
        if ($this->_assetsUrl === null)
            $this->_assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.assets'), FALSE, -1, YII_DEBUG);
        return $this->_assetsUrl;
    }

    public function getBaseUrl() {
        return Yii::app()->getBaseUrl();
    }

    public function getUploadUrl() {
        return $this->getBaseUrl() . UploadedFile::UPLOADDIR;
    }

    public function getViewer() {
        if (!Yii::$app->session->get('user'))
            return null;
        return Yii::$app->session->get('user');
    }

}
