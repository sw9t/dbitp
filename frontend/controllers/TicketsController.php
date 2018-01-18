<?php

namespace frontend\controllers;

use frontend\models\Tickets;
use Yii;
use frontend\models\TicketsSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class TicketsController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'actions' => ['index'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['executor'],
                        'actions' => ['execute-ticket', 'update'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['declarer'],
                        'actions' => ['create', 'update', 'index', 'delete'],
                    ],
                    [
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

    public function actionIndex($type = null)
    {
        $searchModel = new TicketsSearch();
        if ($type == null) {
            if (Yii::$app->user->can('declarer')) {
                $type='my';
            }
            if (Yii::$app->user->can('executor')) {
                $type='free';
            }
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$type);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'type' => $type
        ]);
    }

    public function actionExecuteTicket($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->user->can('executor')) {
            $model = Tickets::find()->where(['id' => $id])->one();
            $model->executor_id = Yii::$app->user->id;
            $model->status_id = 2;
            return $model->save() ? true : false;
        } else {
            return false;
        }
    }


    public function actionCreate()
    {
        $model = new Tickets();
        $model->status_id = 1;
        $model->declarer_id = Yii::$app->user->getId();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('edit', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('edit', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->user->can('admin')) {
            $model = $this->findModel($id);
            $model->is_deleted = 1;
            $model->save();
            return true;
        }
        return false;
    }

    protected function findModel($id)
    {
        if (($model = Tickets::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
