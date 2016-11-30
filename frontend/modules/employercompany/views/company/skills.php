<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'POST A JOB';
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
		    <div class="row">
       		<div class="col-lg-5">
 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>   
 <?= $form->field($model, 'requirment') ?>				
 <?= $form->field($model, 'companytype')->radioList(['corporate' =>'corporate' , 'consultant' =>'consultant'],['prompt' =>'<---select--->']) ?>
 <?= $form->field($model, 'jobtype')->radioList(['full time' =>'full time' , 'part time' =>'part time'],['prompt' =>'select']) ?>
  <div class="form-group">
                    <?= Html::submitButton('create', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
  <?php ActiveForm::end(); ?>
      		 
       		 </div>
       		 </div>
  </div>
       		 
       
      
     
    
   

 




      
       	