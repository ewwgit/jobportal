<?php
namespace frontend\models;

use common\models\User;
use yii\base\InvalidParamException;
use yii\base\Model;
use Yii;

/**
 * Password reset form
 */
class ChangePasswordForm  extends Model
{
    
	public $Oldpassword;
	public $password;
    public $confirmPassword;
  

    private $_user;


  
    public function rules()
    {
        return [
        		
        		[['Oldpassword', 'password', 'confirmPassword'], 'required'],
        		 [ 
						'password',
						'string',
						'min' => 6,
						'max' => 14 
				 ],
				
				 [['confirmPassword'], 'compare', 'compareAttribute' => 'password'],
			     [['password'],'safe'],
				
				
        		[
        		'password',
        		'match',
        		// char and number and special symbol
        		  'pattern' => '/^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};:"\\|,.<>\/?]{6,16}$/',
				  'message' => 'should contain min 6 char with atleast 1 letter and 1 number'
        		],
        		
        		['Oldpassword','findPasswords'],
        		
		        	
        	
        		
        		
        ];
    }
    
              public function findPasswords($attribute, $params)
              {
		 		
				  	 
				  	 $id  = Yii::$app->user->identity->id;
				  	 $username  = Yii::$app->user->identity->username;
				  	// print_r($id);exit();
				  	 
				  	  
				  	 $dbpassword = User::findOne([
				  	 		'status' => User::STATUS_ACTIVE,
				  	 		'username' => $username,
				  	 ])->password_hash;

				  	// $dbpassword = User::find()->all();
				  	 
				  	 //print_r($dbpassword);
				  	 	
				      $password = $this->Oldpassword;
				     // print_r($password);exit();
				      
				  	  $full_salt = substr($dbpassword, 0, 29);
				  	 
				  	 // print_r($full_salt);
				  	  // run the hash function on $password
				     $new_hash = crypt($password, $full_salt);
				  	  
				  	 /// print_r($new_hash);exit();
				  	   if($dbpassword != $new_hash){
				  	 
				  	 	$this->addError($attribute,'Current Password is incorrect');
				  	 	
				  	 }
				  	 
				  	
			  }
		
			  public function attributeLabels()
			  {
			  	return [
			  
			  			'Oldpassword' => 'Old Password',
			  			'password' => 'New Password',
			  			'confirmPassword' => 'Confirm New Password',
			  
			  	];
			  }
			  	
			  
			  public function resetPassword($password)
			  {
			  	    //echo "New password===" .  $password;
			  	    $user = new User();
			  	    return  $user->password_hash = Yii::$app->security->generatePasswordHash($password);
			   }
			   
// 			   public function getPassword()
// 			   {
// 			   	return '';
// 			   }
			  
			  
			  
			
				  
}
