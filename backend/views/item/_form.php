<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\components\RouteRule;

$rules = array_keys(Yii::$app->getAuthManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>

<div class="auth-item-form">
    <?php
    $form = ActiveForm::begin([
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-2',
                        'offset' => 'col-sm-offset-2',
                        'wrapper' => ' col-md-10 col-sm-10 col-xs-12',
                        'error' => '',
                        'hint' => '',
                    ],
                ],
    ]);
    ?>  
    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'ruleName')->dropDownList($rules, ['prompt' => ' --select rule']) ?>

    <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-6 col-sm-9 col-xs-12">
            <?php
            echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Add New') : Yii::t('app', 'Update'), [
                'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
                'name' => 'submit-button'])
            ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
