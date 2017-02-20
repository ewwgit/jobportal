<?php

namespace app\modules\employers\controllers;

use Yii;
use app\models\EmployersList;
use app\models\EmployerslistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Employer;
use app\models\User;

/**
 * EmployersController implements the CRUD actions for EmployersList model.
 */
class EmployersController extends Controller
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
     * Lists all EmployersList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployerslistSearch();
       $params = Yii::$app->request->queryParams;
        $params['roleid'] = 2;
        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single EmployersList model.
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
     * Creates a new EmployersList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmployersList();
//         $var=EmployersList::find()->joinWith('employer')->joinWith(['user', 'user.employer'])->all();
//         print_r($var);exit;
      

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

    /**
     * Updates an existing EmployersList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
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
    public function actionEmployerupdate($id)
    {
    	
    	$model = new Employer();
    	$employerData = Employer::find()->where(['userid'=> $id])->one();
    	$userData = EmployersList::find()->where(['id' => $id])->one();
  
    	
     if ($model->load(Yii::$app->request->post()) && $model->validate()) {
     	$model->userid = $id;
     	
     	$employeruser = EmployersList::find()->where(['id' => $id])->one();
     	if($employeruser != NULL){
     		 
     		$employeruser->username = $model->username;
     		$employeruser->email = $model->email;
     		$employeruser->save();
     	}
     	
     	  
     	  $userExist = Employer::find()->where(['userid'=>$id])->one();
     	  if($userExist != NULL){
     	  	
     	  
     	  	$userExist->first_name = $model->first_name;
     	  	$userExist->last_name = $model->last_name;
     	  	$userExist->mobilenumber = $model->mobilenumber;
     	  	$userExist->landline = $model->landline;
     	  	$userExist->dateofbirth = $model->dateofbirth;
     	  	$userExist->gender = $model->gender;
     	  	$userExist->designation = $model->designation;
     	  	$userExist->address = $model->address;
     	  	$userExist->skills = $model->skills;
     	  	$userExist->status = $model->status;	
     	  	$userExist->roleid = $model->roleid;  
     	  	$model->updatedDate = date('Y-m-d H:i:s');
     	  	$date = $model->updatedDate;
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
        		$model->first_name = $employerData->first_name;
        		$model->last_name = $employerData->last_name;
        		$model->userid = $employerData['userid'];
        		$model->mobilenumber = $employerData->mobilenumber;
        		$model->landline = $employerData->landline;
        		$model->dateofbirth = $employerData->dateofbirth;
        		$model->gender = $employerData->gender;
        		$model->designation = $employerData->designation;
        		$model->address = $employerData->address;
        		$model->skills = $employerData->skills;
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

    /**
     * Deletes an existing EmployersList model.
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
     * Finds the EmployersList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EmployersList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmployersList::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
