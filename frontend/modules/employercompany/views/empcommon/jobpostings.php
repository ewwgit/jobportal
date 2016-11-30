<?php
use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



$this->title = '';
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
 
 <?= $form->field($model, 'company_name')->textInput(['autofocus' => true])?>				
 <?= $form->field($model, 'company_type')->radioList(['corporate' =>'corporate' , 'consultant' =>'consultant'],['prompt' =>'select']) ?>
 <?= $form->field($model, 'industry_type')->dropDownList(['Accounting/Consulting/Taxation' =>'Accounting/Consulting/Taxation' , 'Advertising/Event Management/PR' =>'Advertising/Event Management/PR', 'Animation / Gaming' =>'Animation / Gaming' , 'Entertainment/Media/Publishing/Dotcom' =>'Entertainment/Media/Publishing/Dotcom' , 'Banking/FinancialServices/Broking' =>'Banking/FinancialServices/Broking' , 'Software Services' =>'Software Services' , 'Machinery/Equipment Manufacturing/Industrial Products' =>'Machinery/Equipment Manufacturing/Industrial Products' , 'Education/Training/Teaching' =>'Education/Training/Teaching'],['prompt' =>'select']) ?>
 <?= $form->field($model, 'dateofestablishment')->widget(
                 DatePicker::className(), [
                'inline' => true, 
           		'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy' ]]);?>
 <?= $form->field($model, 'country')->dropDownList(['Afghanistan' =>'Afghanistan' , 'Brazil' =>'Brazil', 'Bulgaria' =>'Bulgaria' , 'Canada' =>'Canada' , 'India' =>'India' , 'United Kingdom' =>'United Kingdom' , 'USA' =>'USA' , 'Rome' =>'Rome'],['prompt' =>'select']) ?>
 <?= $form->field($model, 'state')->dropDownList(['Himachal Pradesh' =>'Himachal Pradesh' , 'Andrapradesh' =>'Andrapradesh', 'Italy' =>'Italy' , 'California' =>'California' , 'Sweden' =>'Sweden' , 'Newyork' =>'Newyork' , 'parise' =>'parise'],['prompt' =>'select']) ?>
 <?= $form->field($model, 'city')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select']) ?>
 <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true])?>
 <?= $form->field($model, 'CTC')->textInput(['autofocus' => true])?>

      	<div class="input-group control-group after-add-more">
      	  <?= $form->field($model, 'skills[]')->textInput(['autofocus' => true])?>	
          
          <div class="input-group-btn"> 
            <button class="btn btn-success add-more" type="button" style="margin-top: 25px;"><i class="glyphicon glyphicon-plus"></i> Add</button>
          </div>
        </div>

       
         <div class="copy hide">
          <div class="control-group input-group" style="margin-top:10px">
          
            <?= $form->field($model, 'skills[]')->textInput(['autofocus' => true])?>	
            <div class="input-group-btn"> 
              <button class="btn btn-danger remove" type="button" style="margin-top: 25px;"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>	
        <script type="text/javascript">

    $(document).ready(function() {

      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });

      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>

 <?= $form->field($model, 'designation') ?>
 <?= $form->field($model, 'experience')->dropDownList(['0 year' => '0 year', '< 1 year' => '< 1 year','1 year' => '1 year','< 2 years' =>'< 2 years','2 years' => '2 years','< 3 years' =>'< 3 years','3 years' => '3 years', '< 4 years'=>'< 4 years','4 years' => '4 years','< 5 years' =>'< 5 years','5 years' => '5 years', '< 6 years' => '< 6 years','6 years'=>'6 years', '7 years' =>'7 years',]) ?>
      
 
   <?= $form->field($model, 'rolecategory')->dropDownList(['Software Developer' => 'Software Developer','System Analyst' => 'System Analyst',
          		'Project Lead' => 'Project Lead','Testing Engineer' =>'Testing Engineer','Database Designer' => 'Database Designer',
          		'Product Manager' => 'Product Manager','System Admin' => ' System Admin'],['prompt'=>'select your jobrole']) ?>
            	
 <?= $form->field($model, 'Description')->textarea(['rows' => 6]) ?>
 <?= $form->field($model, 'jobtype')->radioList(['full time' =>'full time' , 'part time' =>'part time'],['prompt' =>'select']) ?>
 <?= $form->field($model, 'gender')->radioList(['Male' =>'Male' , 'Femail' =>'Femail'],['prompt' =>'select']) ?>
 <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>
<div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
                
 
 
 <?php ActiveForm::end(); ?>
      		 
       		 </div>
       		 </div>
  </div>
  
  

       		 
       		 
