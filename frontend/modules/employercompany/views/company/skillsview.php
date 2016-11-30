<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



$this->title = 'ADD Skills';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
	
	    <div class="row">
       		 <div class="col-lg-5">
       		 
   	<!-- form desinging-->	 
 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>   
 
 <?= $form->field($model, 'requirment') ?>				
				
 <?= $form->field($model, 'companytype')->radioList(['corporate' =>'corporate' , 'consultant' =>'consultant'],['prompt' =>'<---select--->']) ?>
 
 <?= $form->field($model, 'language')->radioList(['full time' =>'full time' , 'part time' =>'part time'],['prompt' =>'select']) ?>
                

 
 
  <div class="form-group">
                    <?= Html::submitButton('update', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
 
 
 <?php ActiveForm::end(); ?>
      		 
       		 </div>
       		 </div>
  </div>
       		 
       	