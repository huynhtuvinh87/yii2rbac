<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\components\RouteRule;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\AuthItemSearch */
/* @var $context mdm\admin\components\ItemController */

$labels = $this->context->labels();
$this->title = $labels['Items'];
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Yii::$app->getAuthManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>
<div class="role-index">
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="pull-right">
                <?php
                $form = ActiveForm::begin([
                            'action' => '/page/admin/index',
                            'method' => 'GET',
                            'options' => [
                                'class' => 'form-inline'
                            ]
                ]);
                ?>
                <?= $form->field($searchModel, 'keywords')->textInput()->label(FALSE) ?>
                <button type="submit" class="btn btn-default" style="margin-top: -5px;"><?= Yii::t('app', 'Search') ?></button>
                <?php ActiveForm::end(); ?>
            </div>

            <?php
            Pjax::begin([
                'id' => 'pjax_gridview_page',
            ])
            ?>
            <?php
            $form = ActiveForm::begin([
                        'id' => 'itemAction',
                        'action' => ['doaction'],
                        'options' => [
                            'class' => 'form-inline'
                        ]
            ]);
            ?>
            <div class="pull-left">
                <div class="form-group" style="margin-bottom: 5px">
                    <select name="action" class="form-control">
                        <option><?= Yii::t('app', 'Builk Actions') ?></option>
                        <option value="delete"><?= Yii::t('app', 'Delete') ?></option>
                    </select>
                </div>
                <button type="submit" id="doaction" class="btn btn-default"><?= Yii::t('app', 'Apply') ?></button>
                <?= Html::a(Yii::t('app', 'Add New'), ['create'], ['class' => 'btn btn-success']) ?>
            </div>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => "{pager}\n{items}\n{summary}\n{pager}",
                'columns' => [
                        ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['width' => 30]],
                        [
                        'class' => 'yii\grid\CheckboxColumn',
                        'multiple' => true,
                        'headerOptions' => ['width' => 10]
                    ],
                        [
                        'attribute' => 'name',
                    ],
                        [
                        'attribute' => 'ruleName',
                        'filter' => $rules
                    ],
                        [
                        'attribute' => 'description',
                    ],
                        ['class' => 'yii\grid\ActionColumn',],
                ],
            ])
            ?>
            <?php ActiveForm::end(); ?>
            <?php Pjax::end() ?> 
        </div>
    </div>
</div>
<?= $this->registerJs("
$(document).ready(function() {
    $('form#itemAction button[type=submit]').click(function() {
        return confirm('Rollback deletion of candidate table?');
    });
});
") ?>

