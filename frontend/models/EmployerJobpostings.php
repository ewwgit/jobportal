<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class EmployerJobpostings extends \yii\db\ActiveRecord
{

	    public static function tableName()
    {
        return 'employer_post_jobs';
    }

    public function rules()
    {
        return [
              	[['CTC','rolecategory','skills','designation','experience','Description','jobtype','gender','address','company_name','company_type','industry_type','dateofestablishment','country','state','city','zipcode'], 'required'],
        		[['CTC','rolecategory','skills','designation','experience','Description','jobtype','gender','address','company_name','company_type','industry_type','dateofestablishment','country','state','city','zipcode'], 'safe'],
       
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'id',
        	'skills' => 'skills',
            'designation' => 'designation',
        	'experience' => 'experience',
        	'Description' => 'Description',
        	'jobtype' => 'jobtype',
        	'gender' => 'gender',
        	'address' => 'address',
        	'roleid' => 'Roleid',
        ];
    }
//     public static skills($skills){
//     	if($skills){
//     		return ['skills'];
//     	}else{
//     		return [];
//     	}
//     }
}
