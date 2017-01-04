<?php
namespace app\modules\employercompany\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\Memberships;
use yii\data\ActiveDataProvider;
use backend\models\EmployerPackages;

class PackageController extends Controller
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
   

	public function actionIndex() {
		$this->layout = '@app/views/layouts/employerinner';
		$membershipsInfo = Memberships::find()->where(['status' => 'Active']);
		$dataProvider = new ActiveDataProvider([
				'pagination' => false,
				'query' => $membershipsInfo,
		]);
		return $this->render ( 'index',['dataProvider' => $dataProvider] );
	}
	
	public function actionUpdatepackageinfo() {
		$memId = $_POST['memid'];
		$membershipsInfo = Memberships::find()->where(['mem_id' => $memId])->one();
		
		$packageInfoByUser = EmployerPackages::find()->where(['userId' => Yii::$app->employer->employerid,'status'=> 1])->one();
		if(!empty($packageInfoByUser))
		{
			$packageInfoByUser->status = 0;
			$packageInfoByUser->update();
		}
		$model = new EmployerPackages();
		$model->mem_id = $memId;
		$model->userId = Yii::$app->employer->employerid;
		$model->startDate = date('Y-m-d');
		$model->endDate = date('Y-m-d', strtotime("+".$membershipsInfo->duration." days"));
		$model->createdDate = date('Y-m-d H:i:s');
		$model->status = 1;
		$model->save();
		Yii::$app->getSession()->setFlash('success', [
				'type' => 'success',
				'duration' => 20000,
				'icon' => 'fa fa-users',
				'message' => 'You are successfully upgrade your package.',
				'title' => 'Success',
				'positonY' => 'top',
				'positonX' => 'center'
		]);
		return $this->redirect('index');
		exit();
		//print_r($memId);exit();
	}
    
}
