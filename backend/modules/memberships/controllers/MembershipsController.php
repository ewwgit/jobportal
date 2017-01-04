<?php

namespace app\modules\memberships\controllers;

use Yii;
use backend\models\Memberships;
use backend\models\MembershipsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MembershipsController implements the CRUD actions for Memberships model.
 */
class MembershipsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Memberships models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MembershipsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Memberships model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Memberships model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Memberships();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	$model->createdDate = date('Y-m-d H:i:s');
        	$model->updatedDate = date('Y-m-d H:i:s');
        	$model->createdBy = Yii::$app->user->id;
        	$model->updatedBy = Yii::$app->user->id;
        	$model->save();
            return $this->redirect(['view', 'id' => $model->mem_id]);
        } else {
        	//print_r($model->errors);exit();
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Memberships model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	$model->updatedDate = date('Y-m-d H:i:s');
        	$model->updatedBy = Yii::$app->user->id;
        	$model->save();
            return $this->redirect(['view', 'id' => $model->mem_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Memberships model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Memberships model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Memberships the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Memberships::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
