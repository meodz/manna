<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\LoginForm $model
 */
$this->title = 'Login';
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                   <?php $form = ActiveForm::begin(array('options' => array('role' => 'form', 'id' => 'login-form'))); ?>
                    	<?php echo $form->field($model, 'username')->textInput(); ?>
                    	<?php echo $form->field($model, 'password')->passwordInput(); ?>
                    	<?php echo $form->field($model, 'rememberMe')->checkbox(); ?>
                    	<div class="form-actions">
                    		<?php echo Html::submitButton('Login', array('class' => 'btn btn-lg btn-success btn-block')); ?>
                    	</div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
