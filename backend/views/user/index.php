<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="pull-right">
                <?php
                $form = ActiveForm::begin([
                            'action' => ['index'],
                            'method' => 'GET',
                            'options' => [
                                'class' => 'form-inline'
                            ]
                ]);
                ?>
                <?= $form->field($search, 'keywords')->textInput()->label(FALSE) ?>
                <button type="submit" class="btn btn-default" style="margin-top: -5px;"><?= Yii::t('app', 'Search') ?></button>
                <?php ActiveForm::end(); ?>
            </div>

            <?php
            Pjax::begin([
                'id' => 'pjax_gridview_news',
            ])
            ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => "{pager}\n{items}\n{summary}\n{pager}",
                'columns' => [
                        [
                        'class' => 'yii\grid\CheckboxColumn',
                        'multiple' => true,
                    ],
                        ['class' => 'yii\grid\SerialColumn'],
                    'firstname',
                    'lastname',
                    'username',
                    'email',
                        ['class' => 'yii\grid\ActionColumn',
                        'buttons' => [
                            //view button
                            'view' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['assignment/view', 'id' => $model->id], [
                                            'title' => Yii::t('app', 'View'),
                                ]);
                            },
                        ],
                    ],
                ],
            ]);
            ?>
            <?php ActiveForm::end(); ?>
            <?php Pjax::end() ?> 
        </div>
    </div>
</div>

