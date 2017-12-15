<?php

namespace frontend\controllers;

use frontend\models\AuthAssignment;
use frontend\models\AuthItem;
use frontend\models\SignupForm;
use Yii;
use common\models\User;
use frontend\models\UserSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create', 'index', 'delete', 'update'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new SignupForm();
        $modelAuthAssigment = new AuthAssignment();
        $modelRoles = $this->getRolesList();
        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            if ($user = $model->signup(true)) {
                if ($modelAuthAssigment->load(Yii::$app->request->post())) {
                    $modelAuthAssigment->user_id = (string)$user->id;
                    $modelAuthAssigment->created_at = time();
                    $modelAuthAssigment->save();
                    if (!$modelAuthAssigment->save()) {
                        var_dump($modelAuthAssigment->getErrors());
                        exit;
                    }
                    $transaction->commit();
                    return $this->redirect('index');
                }
            }
            $transaction->rollBack();
        }
        return $this->renderAjax('_form', [
            'status' => 1,
            'model' => $model,
            'modelAuthAssigment' => $modelAuthAssigment,
            'modelRoles' => $modelRoles,
        ]);
    }

    private function getRolesList()
    {
        return ArrayHelper::map(AuthItem::find()->all(), 'name', 'description');
    }

    public function actionUpdate($id)
    {
        $model = \frontend\models\User::find()->where(['id' => $id])->one();
        $modelAuthAssigment = AuthAssignment::find()->where(['user_id' => $id])->one();
        $modelRoles = $this->getRolesList();
        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            if ($model->save()) {
                if ($modelAuthAssigment->load(Yii::$app->request->post())) {
                    $modelAuthAssigment->user_id = (string)$model->id;
                    $modelAuthAssigment->created_at = time();
                    $modelAuthAssigment->save();
                    if (!$modelAuthAssigment->save()) {
                        var_dump($modelAuthAssigment->getErrors());
                        exit;
                    }
                    $transaction->commit();
                    return $this->redirect('index');
                }
            }
            $transaction->rollBack();
        }
        return $this->renderAjax('_form', [
            'status' => 0,
            'model' => $model,
            'modelAuthAssigment' => $modelAuthAssigment,
            'modelRoles' => $modelRoles,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
