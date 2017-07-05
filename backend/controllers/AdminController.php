<?php

namespace backend\controllers;

use Yii;
use backend\models\Admin;
use backend\models\AdminSearch;
use backend\models\SignupForm;
use backend\models\ProfileForm;
use backend\models\PasswordForm;
use backend\components\BackendController;

/**
 * Admin controller
 */
class AdminController extends BackendController {

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        $search = new AdminSearch();
        $dataProvider = $search->search(Yii::$app->request->getQueryParams());
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'search' => $search
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
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('update', [
                    'model' => $model
        ]);
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionProfile() {
        $model = new ProfileForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', \Yii::t('app', 'You have successfully updated!'));
            return $this->redirect(['profile']);
        }
        $user = $this->findModel(\Yii::$app->user->id);
        return $this->render('profile', [
                    'model' => $model,
                    'user' => $user
        ]);
    }

    public function actionChangepassword() {
        $model = new PasswordForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->change()) {
                Yii::$app->getSession()->setFlash('success', \Yii::t('app', 'You have successfully updated!'));
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
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
