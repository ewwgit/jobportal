<?php
namespace common\components;

use Yii;
use yii\base\Component;


class Employer extends Component {
	public $employerid;
    public $employerusername;
    public $employerpassword_hash;
    public $employerpassword_reset_token;
    public $employeremail;
    public $employerauth_key;   
    public $employerstatus;
    public $employercreated_at;
    public $employerupdated_at;    
    public $employerroleid;
    
    
    
	public function init()
	{
		
	$this->employerid = \Yii::$app->session->get('user.employerid');
    $this->employerusername= \Yii::$app->session->get('user.employerusername');
    $this->employerpassword_hash= \Yii::$app->session->get('user.employerpassword_hash');
    $this->employerpassword_reset_token= \Yii::$app->session->get('user.employerpassword_reset_token');
    $this->employeremail= \Yii::$app->session->get('user.employeremail');
    $this->employerauth_key= \Yii::$app->session->get('user.employerauth_key');    
    $this->employerstatus= \Yii::$app->session->get('user.employerstatus');
    $this->employercreated_at= \Yii::$app->session->get('user.employercreated_at');
    $this->employerupdated_at= \Yii::$app->session->get('user.employerupdated_at');   
    $this->employerroleid= \Yii::$app->session->get('user.employerroleid');
   
   
		
		
	}

	public  function RealIP()
	{
		$ent="hello";
		return $ent;
	}
	
	/* public function setuserlogin($employerid,$employerusername,$employerpassword_hash,$employerpassword_reset_token,$employeremail,$employerauth_key,$employerOtpNumber,$employerstatus,$employercreated_at,$employerupdated_at,$employerpassword,$employerroleid,$employercreatedDate,$employermodifiedDate)
	{
		
		$this->employerid = $employerid;
		
		$this->isadminLogin = 1;
		$this->employerusername= $employerusername;
		$this->employerpassword_hash= $employerpassword_hash;
		$this->employerpassword_reset_token= $employerpassword_reset_token;
		$this->employeremail= $employeremail;
		$this->employerauth_key= $employerauth_key;
		$this->employerOtpNumber= $employerOtpNumber;
		$this->employerstatus= $employerstatus;
		$this->employercreated_at= $employercreated_at;
		$this->employerupdated_at= $employerupdated_at;
		$this->employerpassword= $employerpassword;
		$this->employerroleid= $employerroleid;
		$this->employercreatedDate= $employercreatedDate;
		$this->employermodifiedDate= $employermodifiedDate;
		
		$currentMembershipInfo = employerMembership::find()->where(['employerId' =>$employerid ,'activemembeship' =>1])->one();
		if(!(empty($currentMembershipInfo)))
		{
			$this->employermemId = $currentMembershipInfo['MemId'];
		}
	
	} */

}
