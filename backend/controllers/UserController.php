<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use common\models\User;
use backend\models\SignupForm;
use backend\models\Profile;
use backend\models\PasswordForm;

/**
 * Site controller
 */
class UserController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return parent::behaviors();
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        if (\Yii::$app->user->identity->role == User::ROLE_ADMIN)
            $query = Profile::find()->where(['NOT IN', 'role', User::ROLE_ADMIN]);
        else
            $query = Profile::find()->where(['NOT IN', 'id', Yii::$app->user->id])->andWhere(['parent_id' => \Yii::$app->user->id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->profile()) {
                return $this->redirect(['index']);
            }
        }
        $user = User::findOne($id);

        return $this->render('update', [
                    'model' => $model
        ]);
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionProfile() {
        $model = new Profile();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->profile()) {
                Yii::$app->getSession()->setFlash('success', 'Bạn đã cập nhật thành công!');
                return $this->redirect(['profile']);
            }
        }
        $user = $this->findModel(\Yii::$app->user->id);
        return $this->render('profile', [
                    'model' => $model
        ]);
    }

    public function actionChangepassword() {
        $model = new PasswordForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->change()) {
                Yii::$app->getSession()->setFlash('success', 'Bạn đã thay đổi mật khẩu thành công!');
                return $this->redirect(['changepassword']);
            }
        }
        $user = $this->findModel(\Yii::$app->user->id);
        return $this->render('changepassword', [
                    'model' => $model,
                    'user' => $user
        ]);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
