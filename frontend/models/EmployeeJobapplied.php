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
class EmployeeJobapplied extends \yii\db\ActiveRecord
{	
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
            [['appliedDate'], 'safe']
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
    
    public function getUser()
    {
    	$a= $this->hasOne(User::className(), ['id' => 'userid']);
    	Print_r($a);exit;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    
    public function getJob()
    {
    	return $this->hasOne(Jobs::className(), ['jobid' => 'JobId']);
    }
    

    public function checkQuery($userId, $JobId)
    {
    
    	$this->userid = $userId;
    	$this->jobid = $JobId;
    	$allJobsUserobj = EmployeeJobapplied::find()->select(['jobid'])
    	->where(['userid'=>$this->userid ,'jobid'=>$this->jobid])->count();
    	//$data = ArrayHelper::toArray($allJobsUserobj, ['jobid','userid']);
    	/* echo $allJobsUserobj;exit();
    	$JobsUserData = @$data[0]['jobid']; */
    	return $allJobsUserobj;
    
    
    
    }
    
    public function insertQuery($userId, $JobId)
    {
    	 
    	date_default_timezone_set('Asia/Calcutta');
    	date_default_timezone_set('UTC');
    	$this->userid = $userId;
    	$this->jobid = $JobId;
    	$data = Yii::$app->db->createCommand ()->insert ( 'employee_job_applied', [
    			'userid' => $this->userid,
    			'jobid' =>  $this->jobid,
    			'appliedDate' => date("Y-m-d H:i:s") // time in India
    			 
    			 
    	]
    			 
    			// 'imageFile' => $filePath
    			)->execute ();
    			//Yii::$app->getSession()->setFlash('success', 'You are successfully Applied.');
    			return $data;
    
    }
    
    public static function getUsersjoined($JobId,$userId)
    {
    	$memberJoined = EmployeeJobapplied::find()
    	->where(['jobid' => $JobId,'userid'=>$userId])
    	->count();
    
    	return $memberJoined;
    }
}

