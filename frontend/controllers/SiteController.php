<?php

namespace frontend\controllers;

use Yii;
use common\models\Order;

/**
 * Site controller
 */
class SiteController extends \frontend\component\BaseController {

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

    public $item;

    public function actionIndex() {
        if (isset($_GET['link'])) {
            if (filter_var($_GET['link'], FILTER_VALIDATE_URL) === FALSE) {
                echo '<script>alert("Url không hợp lệ ");</script>';
                return $this->render('index');
            }
            $link = $_GET['link'];
            //$ch = curl_init('http://www.xe.com/currencyconverter/convert/?Amount=1&From=USD&To=VND');
            $ch = curl_init($link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            $html = curl_exec($ch);
            if (curl_error($ch) != '') {
                //$this->redirect(Url::)
            }
            curl_close($ch);
            $source = \keltstr\simplehtmldom\SimpleHTMLDom::str_get_html($html);
            $title = '';
            foreach ($source->find('[itemprop=name]') as $title) {
                $title = $title->plaintext;
                break;
            }
            //img
            $imgs = [];
            foreach ($source->find('[itemprop=image]') as $img) {
                $imgs[] = $img->src;
            }
            //price
            $price = '';
            foreach ($source->find('[itemprop=price]') as $prices) {
                $price = $prices->plaintext;
            }
            //priceCurrency
            $currency = '';
            foreach ($source->find('[itemprop=priceCurrency]') as $currencys) {
                $currency = $currencys->content;
            }
            //brand
            $brand = '';
            foreach ($source->find('[itemprop=brand]') as $b) {
                $brand = $b->plaintext;
            }
            //desc
            $desc = '';
            foreach ($source->find('[itemprop=description]') as $d) {
                $desc = $d->plaintext;
            }
            $item = [
                'name' => $title,
                'images' => $imgs,
                'price' => $price,
                'currency' => $currency,
                'brand' => $brand,
                'description' => $desc
            ];
            return $this->render('detail', ['item' => json_decode(json_encode($item), false)]);
        }
        return $this->render('index');
    }

    public function actionCreateorder() {
        $order = new Order;
        $order->attributes = $_POST['OrderForm'];
        if ($order->insert()) {
            $this->response(true, 'Created.', $order);
        } else {
            $this->response(false, null, $order->getErrors());
        }
    }

    private function getAmazonItem($html) {
        $content = str_get_html($html);
        $elem = $content->find('title', 0);
        var_dump($elem);
        die;
        return $elem;
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [

                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {

        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params ['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [

                        'model' => $model,
            ]);
        }
    }

}
