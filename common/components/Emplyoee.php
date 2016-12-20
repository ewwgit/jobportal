<?php
namespace common\components;

use Yii;
use yii\base\Component;

class Emplyoee extends Component {
	public $emplyoeeid;
    public $emplyoeeusername;
    public $emplyoeepassword_hash;
    public $emplyoeepassword_reset_token;
    public $emplyoeeemail;
    public $emplyoeeauth_key;    
    public $emplyoeestatus;
    public $emplyoeecreated_at;
    public $emplyoeeupdated_at;   
    public $emplyoeeroleid;
    public $emplyoeecreatedDate;
    public $emplyoeemodifiedDate;
	public function init()
	{
	$this->emplyoeeid = \Yii::$app->session->get('user.emplyoeeid');
    $this->emplyoeeusername= \Yii::$app->session->get('user.emplyoeeusername');
    $this->emplyoeepassword_hash= \Yii::$app->session->get('user.emplyoeepassword_hash');
    $this->emplyoeepassword_reset_token= \Yii::$app->session->get('user.emplyoeepassword_reset_token');
    $this->emplyoeeemail= \Yii::$app->session->get('user.emplyoeeemail');
    $this->emplyoeeauth_key= \Yii::$app->session->get('user.emplyoeeauth_key');    
    $this->emplyoeestatus= \Yii::$app->session->get('user.emplyoeestatus');
    $this->emplyoeecreated_at= \Yii::$app->session->get('user.emplyoeecreated_at');
    $this->emplyoeeupdated_at= \Yii::$app->session->get('user.emplyoeeupdated_at');    
    $this->emplyoeeroleid= \Yii::$app->session->get('user.emplyoeeroleid');
    $this->emplyoeecreatedDate= \Yii::$app->session->get('user.emplyoeecreatedDate');
    $this->emplyoeemodifiedDate= \Yii::$app->session->get('user.emplyoeemodifiedDate');
		
	}

	public  function RealIP()
	{
		$ent="hello";
		return $ent;
	}

}
