<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



$this->title = 'Education Profile';

?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
	
	
	    <div class="row">
       		 <div class="col-lg-5">
       		 
   	<!-- form desinging-->	 
       		 
 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?> 
				
 <?= $form->field($model, 'expected_salary')->dropDownList(['10,000/month' =>'10,000/month' , '25,000/month' =>'25,000/month', '35,000/month' =>'35,000/month' , '30,000/month' =>'30,000/month' , '40,000/month' =>'40,000/month' , '50,000/month' =>'50,000/month' , '17,000/month' =>'17,000/month' ,'13,000/month' =>'13,000/month'],['prompt' =>'Min Salary']) ?>
  
  <?= $form->field($model, 'job_role')->dropDownList(['Accountant' =>'Accountant' , 'SoftwareEngineer' =>'SoftwareEngineer' , 'Tester' =>'Tester', 'Developer' =>'Developer' , 'DTP Operater' =>'DTP Operater' , 'Data Entry' =>'Data Entry' , 'Java Developer' =>'Java Developer' , 'Admin' =>'Admin' ,'Analyst' =>'Analyst','QA Analyst' =>'QA Analyst','Business Analyst' =>'Business Analyst'],['prompt' =>'select']) ?>
  
  <?= $form->field($model, 'job_location') ?>
  
  
 <div class="form-group">
                    <?= Html::submitButton('Next', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
 
 
 <?php ActiveForm::end(); ?>
      		 
       		 </div>
       		 </div>
  </div>
       	