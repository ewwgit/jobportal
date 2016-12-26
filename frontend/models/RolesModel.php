<?php

namespace frontend\models;

use yii;
use yii\base\Component;
use yii\helpers\Url;
use common\models\User;

/**
 * RolesModel is the model behind the RolesModel.
 */
class RolesModel extends Component {
	public static function getRole() {
		//echo Yii::$app->emplyoeeid->emplyoeeroleid;exit();
		if(isset(Yii::$app->emplyoee->emplyoeeid))
		{
		$userExist = User::find()->where( [ 'id' => Yii::$app->emplyoee->emplyoeeid,'status' => 10 ] )->exists();
		if($userExist != 1)
		{
			\Yii::$app->session->remove('user.emplyoeeid');
    	\Yii::$app->session->remove('user.emplyoeeusername');
    	\Yii::$app->session->remove('user.emplyoeepassword_hash');
    	\Yii::$app->session->remove('user.emplyoeepassword_reset_token');
    	\Yii::$app->session->remove('user.emplyoeeemail');
    	\Yii::$app->session->remove('user.emplyoeeauth_key');    	
    	\Yii::$app->session->remove('user.emplyoeestatus');
    	\Yii::$app->session->remove('user.emplyoeecreated_at');
    	\Yii::$app->session->remove('user.emplyoeeupdated_at');    	
    	\Yii::$app->session->remove('user.emplyoeeroleid');
		}
		}
		if(isset(Yii::$app->emplyoee->emplyoeeroleid))
		{
			
		$roleId = Yii::$app->emplyoee->emplyoeeroleid;
			
			
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
