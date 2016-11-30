<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "employee_signup".
 *
 * @property integer $regid
 * @property string $name
 * @property string $surname
 * @property string $mobilenumber
 * @property string $password
 */
class EmployeeProjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        		
            [[ 'prjtitle', 'prjstartdate','prjenddate', 'prjlocation','emptype','prjdescription','prjrole','prjroledescription','teamsize','prjskills'], 'required'],
           // [['regid'], 'integer'],
            [['prjtitle','prjstartdate','prjenddate', 'prjlocation','emptype','prjdescription','prjrole','prjroledescription','prjskills'], 'string', 'max' => 100],
        		[[ 'prjtitle', 'prjstartdate','prjenddate', 'prjlocation','emptype','prjdescription','prjrole','prjroledescription','teamsize','prjskills', 'userid'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        		
        		'prjtitle' => 'Prjtitle',
            
            'prjstartdate' => 'Prjstartdate',
        		'prjenddate' => 'Prjenddate',
        		
        		'prjlocation' =>'Prjlocation',
           	'emptype' => 'Emptype',
        	'prjdescription' => 'Prjdescription',
        		'prjrole'=>'Prjrole',
        		'prjroledescription'=>'Prjroledescription',
        		'teamsize'=>'Teamsize',
        		'prjskills'=>'Prjskills',
        		
        		'userid' => 'Userid'
        	
        		
        ];
    }
}



