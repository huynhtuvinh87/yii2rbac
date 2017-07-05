<?php

namespace backend\models;

use common\models\User;
use Yii;
/**
 * Signup form
 */
class Profile extends User {

    public $firstname;
    public $lastname;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                ['id', 'integer'],
                ['username', 'filter', 'filter' => 'trim'],
                [['username', 'firstname', 'lastname', 'email'], 'required', 'message' => '{attribute} không được rỗng.'],
                ['username', 'validateUsername'],
                ['username', 'string', 'min' => 2, 'max' => 255],
                ['email', 'filter', 'filter' => 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                [['email', 'firstname', 'lastname'], 'string', 'max' => 255],
                ['email', 'validateEmail'],
        ];
    }

    public function validateUsername($attribute, $params) {
        if (!$this->hasErrors()) {
            $model = User::find()->where(['username' => $this->username])->one();
            if (!empty($model)) {
                if ($model->id != $this->id)
                    $this->addError($attribute, $this->username . ' đã tồn tại trong hệ thống.');
            }
        }
    }

    public function validateEmail($attribute, $params) {
        if (!$this->hasErrors()) {
            $model = User::find()->where(['email' => $this->email])->one();
            if (!empty($model)) {
                if ($model->id != $this->id)
                    $this->addError($attribute, $this->email . ' đã tồn tại trong hệ thống.');
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'username' => Yii::t('app', 'Username'),
            'firstname' => Yii::t('app', 'Firstname'),
            'lastname' => Yii::t('app', 'Lastname'),
            'email' => 'Email'
        ];
    }

    public static function find() {
        return parent::find();
    }

    public function profile() {
        if ($this->validate()) {
            $user = User::findOne($this->id);
            $user->username = $this->username;
            $user->email = $this->email;
            $user->firstname = $this->firstname;
            $user->lastname = $this->lastname;
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

    public function metaKeys() {
        return ['firstname', 'lastname'];
    }

}
