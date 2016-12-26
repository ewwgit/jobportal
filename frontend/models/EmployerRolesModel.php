<?php

namespace frontend\models;

use yii;
use yii\base\Component;
use yii\helpers\Url;
use common\models\User;

/**
 * RolesModel is the model behind the RolesModel.
 */
class EmployerRolesModel extends Component {
	public static function getRole() {
		//echo Yii::$app->emplyoeeid->emplyoeeroleid;exit();
		if(isset(Yii::$app->employer->employerid))
		{
		$userExist = User::find()->where( [ 'id' => Yii::$app->employer->employerid,'status' => 10 ] )->exists();
		if($userExist != 1)
		{
			\Yii::$app->session->remove('user.employerid');
		\Yii::$app->session->remove('user.employerusername');
		\Yii::$app->session->remove('user.employerpassword_hash');
		\Yii::$app->session->remove('user.employerpassword_reset_token');
		\Yii::$app->session->remove('user.employeremail');
		\Yii::$app->session->remove('user.employerauth_key');
		\Yii::$app->session->remove('user.employerstatus');
		\Yii::$app->session->remove('user.employercreated_at');
		\Yii::$app->session->remove('user.employerupdated_at');
		\Yii::$app->session->remove('user.employerroleid');
		}
		}
		if(isset(Yii::$app->employer->employerroleid))
		{
			
		$roleId = Yii::$app->employer->employerroleid;
			
			
		if($roleId)
		{
			return $roleId;
		}
		else
		{
			return $roleId=0;
		}
		
		}
		else {
			return $roleId=0;
		}
		
	}
}
