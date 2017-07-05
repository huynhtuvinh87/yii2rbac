<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = 'Assignments';
$this->params['breadcrumbs'][] = $this->title;

$columns = [
        ['class' => 'yii\grid\SerialColumn'],
    $usernameField,
];
if (!empty($extraColumns)) {
    $columns = array_merge($columns, $extraColumns);
}
$columns[] = [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{view}'
];
?>
<div class="assignment-index">
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">


            <?php Pjax::begin(); ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => "{pager}\n{items}\n{summary}\n{pager}",
                'filterModel' => $searchModel,
                'columns' => $columns,
            ]);
            ?>
            <?php Pjax::end(); ?>


        </div>
    </div>
</div>