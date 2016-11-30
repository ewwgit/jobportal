<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$url = Yii::getAlias('@web');

$this->title = 'Company Profile';

?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
	<p>Please fill out the following fields to signup:</p>
	
	    <div class="row">
       		 <div class="col-lg-5">
       		 
   	<!-- form desinging-->	 
       		 
 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?> 
 
 <?= $form->field($model, 'company_name') ?>				
				
 <?= $form->field($model, 'company_type')->radioList(['corporate' =>'corporate' , 'consultant' =>'consultant'],['prompt' =>'<---select--->']) ?>
 
 <?= $form->field($model, 'industry_type')->dropDownList(['Accounting/Consulting/Taxation' =>'Accounting/Consulting/Taxation' , 'Advertising/Event Management/PR' =>'Advertising/Event Management/PR', 'Animation / Gaming' =>'Animation / Gaming' , 'Entertainment/Media/Publishing/Dotcom' =>'Entertainment/Media/Publishing/Dotcom' , 'Banking/FinancialServices/Broking' =>'Banking/FinancialServices/Broking' , 'Software Services' =>'Software Services' , 'Machinery/Equipment Manufacturing/Industrial Products' =>'Machinery/Equipment Manufacturing/Industrial Products' , 'Education/Training/Teaching' =>'Education/Training/Teaching'],['prompt' =>'select']) ?>
                
 <?= $form->field($model, 'dateofestablishment')->textInput(['type' => 'date']) ?>
                 
 <?= $form->field($model, 'location') ?>
 
 <?= $form->field($model, 'country')->dropDownList(['Afghanistan' =>'Afghanistan' , 'Brazil' =>'Brazil', 'Bulgaria' =>'Bulgaria' , 'Canada' =>'Canada' , 'India' =>'India' , 'United Kingdom' =>'United Kingdom' , 'USA' =>'USA' , 'Rome' =>'Rome'],['prompt' =>'select']) ?>
			   
 <?= $form->field($model, 'state')->dropDownList(['Himachal Pradesh' =>'Himachal Pradesh' , 'Andrapradesh' =>'Andrapradesh', 'Italy' =>'Italy' , 'California' =>'California' , 'Sweden' =>'Sweden' , 'Newyork' =>'Newyork' , 'parise' =>'parise'],['prompt' =>'select']) ?>

  <?= $form->field($model, 'city')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select']) ?>
              
  <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true]) ?>
			  
  
 
 <div class="form-group">
                    <?= Html::submitButton('save', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
 
 
 <?php ActiveForm::end(); ?>
      		 
       		 </div>
       		 </div>
  </div>
       		 
       		 