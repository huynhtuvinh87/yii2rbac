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
<div class="user-index">
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
                'id' => 'pjax_gridview_user',
            ])
            ?>
            <?php
            $form = ActiveForm::begin([
                        'id' => 'userAction',
                        'action' => ['doaction'],
                        'options' => [
                            'class' => 'form-inline'
                        ]
            ]);
            ?>
            <div class="pull-left">

                <?= Html::a(Yii::t('app', 'Add New'), ['create'], ['class' => 'btn btn-success']) ?>
            </div>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => "{pager}\n{items}\n{summary}\n{pager}",
                'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                    'username',
                        [
                        'attribute' => 'Name',
                        'format' => 'raw',
                        'value' => function($data) {
                            return $data->firstname . ' ' . $data->lastname;
                        }
                    ],
                    'email',
                    'role',
                        ['class' => 'yii\grid\ActionColumn',
                        'template' => '{update}{delete}',
                        'buttons' => [
                            //view button
                            'update' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->id], [
                                                'title' => Yii::t('app', 'Update'),
                                    ]);
                            },
                            'delete' => function ($url, $model) {
                                    $options = array_merge([
                                        'title' => Yii::t('yii', 'Delete'),
                                        'aria-label' => Yii::t('yii', 'Delete'),
                                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'data-method' => 'post',
                                        'data-pjax' => '0',
                                    ]);
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                             
                            }
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
<?= $this->registerJs("
$(document).ready(function() {
    $('form#userAction button[type=submit]').click(function() {
        return confirm('Rollback deletion of candidate table?');
    });
});
") ?>