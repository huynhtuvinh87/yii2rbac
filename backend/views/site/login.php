<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = \Yii::t('app', 'Login');
?>
<section class="login_content row">
    <?php
    $form = ActiveForm::begin();
    ?>  
    <?= $form->field($model, 'username')->textInput()->label() ?>
    <?= $form->field($model, 'password')->passwordInput()->label() ?>
    <?= $form->field($model, 'rememberMe')->checkbox()->label() ?>
    <?= Html::submitButton(\Yii::t('app', 'Login'), ['class' => 'btn btn-primary pull-right', 'name' => 'login-button']) ?>

    <?php ActiveForm::end(); ?>
</section>
<div class="lostpassword">
    <?= Html::a(Yii::t('app', 'Lost your password?'), ['forgot']) ?>
</div>