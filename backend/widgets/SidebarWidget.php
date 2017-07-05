<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\widgets;

use Yii;
use yii\base\Widget;

class SidebarWidget extends Widget
{

    public function init()
    {
        
    }
    public function run()
    {
        if (!Yii::$app->user->isGuest)
        {
            return $this->render('sidebar');
        }
    }

}
