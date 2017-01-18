<?php
namespace app\modules\company\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\base\ErrorException;
use frontend\models\CompanyForm;

class CompanyController Extends Controller{
	
	public function actionCreate()
	{
		//echo "hai";exit;
		$this->layout = '@app/views/layouts/employerinner';
		$model= new CompanyForm();
		if (($model->load ( Yii::$app->request->post () )) && ($model->validate ())) {
			
			$model->createdDate = date('Y-m-d H:i:s');
			
			$model->save();
		}
		return $this->render ( 'companyview',[
				'model' => $model,]
				);
	}
}