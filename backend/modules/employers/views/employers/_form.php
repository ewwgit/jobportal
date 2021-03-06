<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeesList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-main-form">
<div class="box ">
<div class="box-body">

 

    <?php $form = ActiveForm::begin(); ?>
     <div class="form-group col-lg-6 col-sm-12">
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?></div>
     <div class="form-group col-lg-6 col-sm-12">
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?></div>
     <div class="form-group col-lg-6 col-sm-12">
    
     <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?></div>
       <div class="form-group col-lg-6 col-sm-12">
     
     <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?></div>
     <div class="form-group col-lg-6 col-sm-12">
     
     <?= $form->field($model, 'mobilenumber')->textInput(['maxlength' => true]) ?></div>
      <div class="form-group col-lg-6 col-sm-12">
    <?= $form->field($model, 'landline')->textInput(['maxlength' => true]) ?>
    </div>
     
      
	
    <div class="form-group col-lg-6 col-sm-12">

   <?= $form->field($model, 'gender')->dropDownList([ 'male' => 'Male', 'femail' => 'Femail', ], ['prompt' => '']) ?></div>
     <div class="form-group col-lg-6 col-sm-12">
    <?= $form->field($model, 'skills')->textInput(['maxlength' => true]) ?>
    </div>
    
     <div class="form-group col-lg-6 col-sm-12">
    <?= $form->field($model, 'designation')->textInput(['maxlength' => true]) ?>
    </div>
     <div class="form-group col-lg-6 col-sm-12">
    <?= $form->field($model, 'dateofbirth')->widget(DatePicker::classname(),[
														'options' => ['placeholder' => 'Enter birth date ...'],
														'name'  => 'from_date',
														'value' => $model->dateofbirth,
														'pluginOptions' => [
																'autoclose'=>true,
																'format' => 'yyyy-mm-dd',
																'todayHighlight' => true
														]
												]);?>
	</div>
     <div class="form-group col-lg-6 col-sm-12">
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    </div>
      <div class="form-group col-lg-6 col-sm-12">

   <?= $form->field($model, 'status')->dropDownList([ '10' => 'Active', '0' => 'In-active', ], ['prompt' => '']) ?></div>

       <div class="form-group col-lg-6 col-sm-12">
   

    <?= $form->field($model, 'roleid')->textInput() ?></div>
    
    
	   
     
     

   <div class="form-group col-lg-6 col-sm-12">
        <?= Html::submitButton($model->isNewRecord ? 'Update' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
</div></div>
