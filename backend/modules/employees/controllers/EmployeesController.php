<?php

namespace app\modules\employees\controllers;

use Yii;
use app\models\EmployeesList;
use app\models\EmployeeslistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\EmployeeSignup;

/**
 * EmployeesController implements the CRUD actions for EmployeesList model.
 */
class EmployeesController extends Controller
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
     * Lists all EmployeesList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeslistSearch();
    
        $params = Yii::$app->request->queryParams;
        $params['roleid'] = 3;
        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmployeesList model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new EmployeesList();
       

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	$model->createdDate = date('Y-m-d H:i:s');
        	$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

         if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	$model->updatedDate = date('Y-m-d H:i:s');
        	$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionEmployeeupdate($id)
    {
    	 
    	$model = new EmployeeSignup();
    	$employeeData = EmployeeSignup::find()->where(['userid'=> $id])->one();
    	$userData = EmployeesList::find()->where(['id' => $id])->one();
    	//print_r($userData);exit;
    
    	 
    	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    
    
    		$model->userid = $id;
    		$userExist = EmployeeSignup::find()->where(['userid'=>$id])->one();
    		if($userExist != NULL){
    			 
    			$userExist->username = $model->username;
    			$userExist->email = $model->email;
    			$userExist->name = $model->name;
    	    	$userExist->surname = $model->surname;
    		    
    		    $userExist->dateofbirth = $model->dateofbirth;
    		    $userExist->mobilenumber = $model->mobilenumber;
    			$userExist->status = $model->status;
    			$userExist->roleid = $model->roleid;
    			$userExist->updatedDate = date('Y-m-d H:i:s');
    			$date = $userExist->updatedDate;
    			$userExist->updatedDate = $date;
    
    			 
    			$userExist->save();
    			Yii::$app->getSession()->setFlash('success', 'You are successfully Updated Your Profile.');
    			return $this->redirect(['index']);
    		}
    		else {
    			 
    			$model->save();
    			//print_r($model);exit();
    			Yii::$app->getSession()->setFlash('success', 'You are successfully Updated Your Profile.');
    			return $this->redirect(['index']);
    		}
    
    	}else {
    		$model->username = $userData->username;
    		$model->email = $userData->email;
    		$model->name = $employeeData->name;
    		$model->surname = $employeeData->surname;
    		$model->userid = $employeeData['userid'];
    		$model->dateofbirth = $employeeData->dateofbirth;
    		$model->mobilenumber = $employeeData->mobilenumber;
    		
    		$model->status = $userData->status;
    		$model->roleid = $userData->roleid;
    		$userData->updatedDate = date('Y-m-d H:i:s');
    		 
    		$date=$userData->updatedDate;
    		//print_r($date);exit;
    		 
    		$model->updatedDate = $date;
    		//	print_r($model->updatedDate);exit;
    		return $this->render('update', ['model' => $model,]);
    	}
    
    
    }
    

    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

   
    protected function findModel($id)
    {
        if (($model = EmployeesList::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
