<?php
use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



$this->title = 'POST A JOB';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
	
	
	       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
 <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->	 
 <div class="container  ">
  <div class="panel panel-default">
    <div class="panel-heading">Employer Job Postings</div>
    <div class="panel-body">
       		 
   	<!-- form desinging-->	 
       		 
 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?> 
 
 <?= $form->field($postings, 'company_name')->textInput(['autofocus' => true],['value' => $postings->company_name])?>				
 <?= $form->field($postings, 'company_type')->radioList(['corporate' =>'corporate' , 'consultant' =>'consultant'],['prompt' =>'select'],['value' => $postings->company_type]) ?>
 <?= $form->field($postings, 'industry_type')->dropDownList(['Accounting/Consulting/Taxation' =>'Accounting/Consulting/Taxation' , 'Advertising/Event Management/PR' =>'Advertising/Event Management/PR', 'Animation / Gaming' =>'Animation / Gaming' , 'Entertainment/Media/Publishing/Dotcom' =>'Entertainment/Media/Publishing/Dotcom' , 'Banking/FinancialServices/Broking' =>'Banking/FinancialServices/Broking' , 'Software Services' =>'Software Services' , 'Machinery/Equipment Manufacturing/Industrial Products' =>'Machinery/Equipment Manufacturing/Industrial Products' , 'Education/Training/Teaching' =>'Education/Training/Teaching'],['prompt' =>'select'],['value' => $postings->industry_type]) ?>
 <?= $form->field($postings, 'dateofestablishment')->widget(
                 DatePicker::className(), [
                'inline' => true, 
           		'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy' ]],['value' => $postings->dateofestablishment]);?>
 <?= $form->field($postings, 'country')->dropDownList(['Afghanistan' =>'Afghanistan' , 'Brazil' =>'Brazil', 'Bulgaria' =>'Bulgaria' , 'Canada' =>'Canada' , 'India' =>'India' , 'United Kingdom' =>'United Kingdom' , 'USA' =>'USA' , 'Rome' =>'Rome'],['prompt' =>'select'],['value' => $postings->country]) ?>
 <?= $form->field($postings, 'state')->dropDownList(['Himachal Pradesh' =>'Himachal Pradesh' , 'Andrapradesh' =>'Andrapradesh', 'Italy' =>'Italy' , 'California' =>'California' , 'Sweden' =>'Sweden' , 'Newyork' =>'Newyork' , 'parise' =>'parise'],['prompt' =>'select'],['value' => $postings->state]) ?>
 <?= $form->field($postings, 'city')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select'],['value' => $postings->city]) ?>
 <?= $form->field($postings, 'zipcode')->textInput(['maxlength' => true],['value' => $postings->zipcode]) ?>
 <?= $form->field($postings, 'skills')->textInput(['autofocus' => true],['value' => $postings->skills])?>



	



 <?= $form->field($postings, 'designation')->textInput(['autofocus' => true],['value' => $postings->designation])?>
 
  <?= $form->field($model, 'Max_Experience')->dropDownList(['0 year' => '0 year', ' 1 year' => '1 year','2 year' => '2 years','3 years' =>'3 years', '4 years'=>'4 years',' 5 years' =>' 5 years' ,' 6 years' => ' 6 years', '7 years' =>'7 years',]) ?>
  <?= $form->field($model, 'Min_Experience')->dropDownList(['0 year' => '0 year', ' 1 year' => '1 year','2 year' => '2 years','3 years' =>'3 years', '4 years'=>'4 years',' 5 years' =>' 5 years' ,' 6 years' => ' 6 years', '7 years' =>'7 years',]) ?> 
 <?= $form->field($postings, 'rolecategory')->dropDownList(['SoftWareDeveloper' =>'SoftWareDeveloper' , 'MobileDeveloper' =>'MobileDeveloper'],['prompt' =>'select'],['value' => $postings->rolecategory]) ?>	
 <?= $form->field($postings, 'Description')->textarea(['rows' => 6],['value' => $postings->Description]) ?>
 <?= $form->field($postings, 'jobtype')->radioList(['full time' =>'full time' , 'part time' =>'part time'],['prompt' =>'select'],['value' => $postings->jobtype]) ?>
 <?= $form->field($postings, 'gender')->radioList(['Male' =>'Male' , 'Femail' =>'Femail'],['prompt' =>'select'],['value' => $postings->gender]) ?>
 <?= $form->field($postings, 'address')->textarea(['rows' => 6],['value' => $postings->address]) ?>
<div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
                
 </div>
 
 
 <?php ActiveForm::end(); ?>
      		 
       		 </div>
       		 </div>
  </div>
  
  


       		 
       		 

