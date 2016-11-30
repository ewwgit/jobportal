<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



$this->title = 'POST A JOB';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
	
	    <div class="row">
       		 <div class="col-lg-5">
       		 
   	<!-- form desinging-->	 
 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>   
 
 <?= $form->field($model, 'job_title') ?>				
				
 <?= $form->field($model, 'job_role')->radioList(['corporate' =>'corporate' , 'consultant' =>'consultant'],['prompt' =>'<---select--->']) ?>
 
 <?= $form->field($model, 'job_type')->radioList(['full time' =>'full time' , 'part time' =>'part time'],['prompt' =>'select']) ?>
                
 <?= $form->field($model, 'job_description')->textarea(['rows' => 6]) ?>
                 
 <?= $form->field($model, 'experience')->dropDownList(['6Months' =>'6Months' , '1year' =>'1year', '2years' =>'2years' , '3years' =>'3years' , '4years' =>'4years'],['prompt' =>'select']) ?>
 
 <?= $form->field($model, 'no_of_openings')->dropDownList(['10' =>'10' , '20' =>'20', '20' =>'20' , '50' =>'50' , '100' =>'100'],['prompt' =>'select']) ?>
			   
 <?= $form->field($model, 'shift_timings')->radioList(['DayShift' =>'DayShift' , 'NightShift' =>'NightShift'])?>

  <?= $form->field($model, 'work_location')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select']) ?>
              
  <?= $form->field($model, 'weekly_days')->textInput(['maxlength' => true]) ?>
			  
   <?= $form->field($model, 'salary')->textInput(['maxlength' => true]) ?>
 
 <div class="form-group">
                    <?= Html::submitButton('Next', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
 
 
 <?php ActiveForm::end(); ?>
      		 
       		 </div>
       		 </div>
  </div>
       		 
       		 