<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use frontend\models\EmployerJobpostings;
/**
 * This is the model class for table "employee_signup".
 *
 * @property integer $regid
 * @property string $name
 * @property string $surname
 * @property string $mobilenumber
 * @property string $password
 */
class EmployeeJobapplied extends \yii\db\ActiveRecord
{	
	public $status;
    public static function tableName()
    {
        return 'employee_job_applied';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'jobid', 'appliedDate'], 'required'],
            [['userid', 'jobid'], 'integer'],
            [['appliedDate','resid'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        	'jobUid' => 'Job Uid',
            'userid' => 'User ID',
            'jobid' => 'Job ID',
        
            'appliedDate' => 'Applied Date',
        ];
    }
    
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
    	return $this->hasOne(EmployerJobpostings::className(), ['id' => 'jobid']);
    }
//     public function getresume()
//     {
//     	return $this->hasOne(EmployeeResume::className(), ['id' => 'resid']);
//     }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
    	return $this->hasOne(User::className(), ['id' => 'userid']);
    }
    public function checkQuery($userId, $JobId)
    {
    
    	$this->userid = $userId;
    	$this->jobid = $JobId;
    
    	$allJobsUserobj = EmployeeJobapplied::find()->select(['jobid'])
    	->where(['userid'=>$this->userid ,'jobid'=>$this->jobid ])->count();
    	//$data = ArrayHelper::toArray($allJobsUserobj, ['jobid','userid']);
    	/* echo $allJobsUserobj;exit();
    	$JobsUserData = @$data[0]['jobid']; */
    	return $allJobsUserobj;
    
    
    
    }
    
    public function insertQuery($userId, $JobId, $resId)
    {
    	 
    	date_default_timezone_set('Asia/Calcutta');
    	date_default_timezone_set('UTC');
    	$this->userid = $userId;
    	$this->jobid = $JobId;
    	
    	$employeejobapplied = new EmployeeJobapplied();
    	$employeejobapplied->userid = $userId;
    	$employeejobapplied->jobid = $JobId;
    	
    	$employeejobapplied->appliedDate = date("Y-m-d H:i:s");
    	$employeejobapplied->rating = 0;
    	$employeejobapplied->updatedDate = date("Y-m-d H:i:s");
    	$employeejobapplied->updatedBy = $userId;
    	$data = $employeejobapplied->save();
    	/* $data = Yii::$app->db->createCommand ()->insert ( 'employee_job_applied', [
    			'userid' => $this->userid,
    			'jobid' =>  $this->jobid,
    			'appliedDate' => date("Y-m-d H:i:s") // time in India
    			 
    			 
    	]
    			 
    			// 'imageFile' => $filePath
    			)->execute (); */
    			//Yii::$app->getSession()->setFlash('success', 'You are successfully Applied.');
    			return $data;
    
    }
    
    public static function getUsersjoined($JobId,$userId)
    {
    	$memberJoined = EmployeeJobapplied::find()
    	->where(['jobid' => $JobId,
    			 'userid'=>$userId,
    			
    	])
    	->count();
    
    	return $memberJoined;
    }
}

