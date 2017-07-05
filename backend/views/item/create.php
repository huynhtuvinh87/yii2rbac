<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\AuthItem */
/* @var $context mdm\admin\components\ItemController */

$labels = $this->context->labels();
$this->title = Yii::t('app', 'Add New');
$this->params['breadcrumbs'][] = ['label' => $labels['Item'], 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">
    <?=
    $this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>
