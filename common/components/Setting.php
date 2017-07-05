<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components;

use yii\base\Component;
use common\models\SettingMeta;
use common\models\MenuMeta;
use common\models\MenuItem;
use common\models\Menu;


class Setting extends Component
{

    public function get($key)
    {
        $model = SettingMeta::find()->where(['meta_key' => $key])->one();
        return $model->meta_value;
    }

    public function menuPosition($param)
    {
        $menu = MenuMeta::find()->where(['meta_key' => $param, 'meta_value' => 1])->one();
        if (!empty($menu))
        {
            $result = static::recrusive($menu->menu_id);
        }
        else
        {
            $result = [];
        }
        return $result;
    }

    public function menuName($param)
    {
        $menu = Menu::find()->where(['name' => $param])->one();
        if (!empty($menu))
        {
            $result = static::recrusive($menu->id);
        }
        else
        {
            $result = [];
        }
        return $result;
    }

    private static function recrusive($menu_id, $parent = NULL)
    {
        $items  = MenuItem::find()->where(['menu_id' => $menu_id, 'parent_id' => $parent])->asArray()->all();
        $result = [];
        foreach ($items as $key => $item)
        {
            $result[] = [
                'label' => $item['title'],
                'url'   => $item['link'],
                'items' => static::recrusive($menu_id, $item['id'])
            ];
        }
        return $result;
    }

}
