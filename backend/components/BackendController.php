<?php

namespace backend\components;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class BackendController extends Controller {


    public function init() {

    }

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                // everything else is denied
                ],
            ],
        ];
    }

}
