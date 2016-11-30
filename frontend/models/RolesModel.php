<?php
namespace frontend\models;

use yii;
use yii\base\Component;
use yii\helpers\Url;
/**
 * RolesModel is the model behind the RolesModel.
  *
 */
class RolesModel extends Component
{
	public static function getRole()
	{
		
		
			$roleId = Yii::$app->employer->employerroleId;
			
			
			if($roleId)
			{
				return $roleId;
			}
			else 
			{
				return $roleId=1;
			}
		}
		
	
}
