<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\AuthItem */
/* @var $context mdm\admin\components\ItemController */

$labels = $this->context->labels();
$this->title = Yii::t('app', 'Update').': ' . $labels['Item'] . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => $labels['Items'], 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="auth-item-update">
    <?=
    $this->render('_form', [
        'model' => $model,
    ]);
    ?>
</div>
