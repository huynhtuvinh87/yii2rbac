<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

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


<?= $form->field($model, 'username') ?>

<?= $form->field($model, 'email') ?>

<?= $form->field($model, 'password')->passwordInput() ?>

<?= $form->field($model, 'firstname') ?>

<?= $form->field($model, 'lastname') ?>
<div class="form-group">
    <div class="col-md-offset-2 col-md-6 col-sm-9 col-xs-12">
        <?= Html::submitButton(\Yii::t('app', 'Add New'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

