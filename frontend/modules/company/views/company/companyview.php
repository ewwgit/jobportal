<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\date\DatePicker;
$this->title = 'Company Form';

?>
<div class="site-signup">
   
				<div class="container">
				<div class="sixteen columns">
	<div class="col-md-9">
	    <div class="row">
       		 <div class="col-lg-5">
       		 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?> 
       		  <h5>Company Name</h5> <?= $form->field($model, 'company_name')->textInput(['autofocus' => true, 'placeholder' => 'Company Name',])->label(false)?>
       		   <h5>Description</h5><?= $form->field($model, 'description')->textarea(['rows' => 6])->label(false)?>
       		   <h5>Establishment Date</h5><?=$form->field ( $model, 'establishment_date' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter Establish date ...' ],'pluginOptions' => [ 'autoclose' => true ,'format' => 'yyyy-mm-dd',] ] )->label(false);?>  
               <h5>Category</h5><?= $form->field($model, 'category')->textInput(['autofocus' => true, 'placeholder' => 'Category',])->label(false)?>
       		   <h5>Branches</h5><?= $form->field($model, 'add_branches')->textInput(['autofocus' => true, 'placeholder' => 'Branches',])->label(false)?>
       		   
       		   <h5>Industry</h5><?= $form->field($model, 'industry')->textInput(['autofocus' => true, 'placeholder' => 'Industry',])->label(false)?>
       		   <h5>Email</h5><?= $form->field($model, 'email')->textInput(['autofocus' => true,'placeholder' => 'Email',])->label(false)?>
       		   <h5>Phone Number</h5><?= $form->field($model, 'phone_no')->textInput(['autofocus' => true,'placeholder' => 'Phone Number',])->label(false)?>
       		    <h5>Mobile Number</h5><?= $form->field($model, 'mobile_no')->textInput(['autofocus' => true,'placeholder' => 'Mobile Number',])->label(false)?>
       		   
       		 <div class="form-group">
                    <?= Html::submitButton('save', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
 </div>
 
 <?php ActiveForm::end(); ?>
      		 
       		 </div>
       		 </div>
       		 </div>
       		 </div>
  </div>
       		 
       		 
