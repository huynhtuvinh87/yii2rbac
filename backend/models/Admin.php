<?php

namespace backend\models;

use common\models\User;

class Admin extends User {

    public $firstname;
    public $lastname;
    public $address;

    /**
     * @inheritdoc
     */
    public function rules() {
        $rules = [
                [['username', 'email', 'firstname', 'lastname'], 'string'],
                [['username', 'email'], 'required'],
                [['email'], 'email'],
        ];
        return array_merge(parent::rules(), $rules);
    }

    public function metaKeys() {
        return ['firstname', 'lastname', 'address'];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return array_merge(
                parent::attributeLabels(), [
                ]
        );
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->role = 'admin';
            return true;
        }
        return false;
    }

}
