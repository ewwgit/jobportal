<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



$this->title = 'Register';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
	<p>Please fill out the following fields to signup:</p>
	
	    <div class="row">
       		 <div class="col-lg-5">
       		 
   	<!-- form desinging-->	 
       		 
 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?> 
 
 <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
 
 <?= $form->field($model, 'email') ?>
 
 <?= $form->field($model, 'password')->passwordInput() ?>
 
 <?= $form->field($model, 'company_name') ?>				
				
 <?= $form->field($model, 'company_type')->radioList(['corporate' =>'corporate' , 'consultant' =>'consultant'],['prompt' =>'<---select--->']) ?>
 
 <?= $form->field($model, 'industry_type')->dropDownList(['Accounting/Consulting/Taxation' =>'Accounting/Consulting/Taxation' , 'Advertising/Event Management/PR' =>'Advertising/Event Management/PR', 'Animation / Gaming' =>'Animation / Gaming' , 'Entertainment/Media/Publishing/Dotcom' =>'Entertainment/Media/Publishing/Dotcom' , 'Banking/FinancialServices/Broking' =>'Banking/FinancialServices/Broking' , 'Software Services' =>'Software Services' , 'Machinery/Equipment Manufacturing/Industrial Products' =>'Machinery/Equipment Manufacturing/Industrial Products' , 'Education/Training/Teaching' =>'Education/Training/Teaching'],['prompt' =>'select']) ?>
				
 <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                
 <?= $form->field($model, 'gender')->radioList(['male' =>'male' , 'female' =>'female'],['prompt' =>'<---select gender--->']) ?>
                
 <?= $form->field($model, 'designation')->dropDownList(['Java Developer' =>'Java Developer' , 'Tester' =>'Tester', 'Designer' =>'Designer' , 'Administrator' =>'Administrator' , 'Software Engineer' =>'Software Engineer' , 'Web Developer' =>'Web Developer' , 'Php Developer' =>'Php Developer'],['prompt' =>'select designation']) ?>
                
 <?= $form->field($model, 'dateofbirth')->textInput(['type' => 'date']) ?>
                 
 <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>
 
 <?= $form->field($model, 'country')->dropDownList(['Afghanistan' =>'Afghanistan' , 'Brazil' =>'Brazil', 'Bulgaria' =>'Bulgaria' , 'Canada' =>'Canada' , 'India' =>'India' , 'United Kingdom' =>'United Kingdom' , 'USA' =>'USA' , 'Rome' =>'Rome'],['prompt' =>'select']) ?>
			   
 <?= $form->field($model, 'state')->dropDownList(['Himachal Pradesh' =>'Himachal Pradesh' , 'Andrapradesh' =>'Andrapradesh', 'Italy' =>'Italy' , 'California' =>'California' , 'Sweden' =>'Sweden' , 'Newyork' =>'Newyork' , 'parise' =>'parise'],['prompt' =>'select']) ?>

  <?= $form->field($model, 'city')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select']) ?>
              
  <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true]) ?>
			  
   <?= $form->field($model, 'phonenumber')->textInput(['maxlength' => true]) ?>
 
 <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
 
 
 <?php ActiveForm::end(); ?>
      		 
       		 </div>
       		 </div>
  </div>
       		 
       		 