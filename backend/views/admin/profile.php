<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\AuthItem */
/* @var $context mdm\admin\components\ItemController */

$this->title = \Yii::t('app', 'Update profile');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->firstname . ' ' . $user->lastname, 'url' => ['assignment/view', 'id' => $user->id]];
?>
<div class="profile">
    <?php
    $form = ActiveForm::begin([
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-2',
                        'offset' => 'col-sm-offset-2',
                        'wrapper' => ' col-md-6 col-sm-6 col-xs-12',
                        'error' => '',
                        'hint' => '',
                    ],
                ],
    ]);
    ?>  

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    <?= $form->field($model, 'id')->hiddenInput(['value' => $user->id])->label(FALSE) ?>

    <?= $form->field($model, 'username')->textInput(['value' => $user->username]) ?>

    <?= $form->field($model, 'email')->textInput(['value' => $user->email]) ?>

    <?= $form->field($model, 'firstname')->textInput(['value' => $user->firstname]) ?>

    <?= $form->field($model, 'lastname')->textInput(['value' => $user->lastname]) ?>

    <?= $form->field($model, 'address')->textInput(['value' => $user->address]) ?>

    <?= $form->field($model, 'phone')->textInput(['value' => $user->phone]) ?>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-6 col-sm-9 col-xs-12">
            <?= Html::submitButton($this->title, ['class' => 'btn btn-success', 'name' => 'profile-button']) ?>
            <?= Html::a(Yii::t('app', 'Change password'), ['changepassword'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>


