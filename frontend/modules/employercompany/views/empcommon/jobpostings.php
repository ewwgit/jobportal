<?php
use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container"> 
    
    <!-- Submit Page -->
    <div class="sixteen columns">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
      <div class="submit-page" style="padding:0px;">
        <div class="container">
        
          <div class="col-md-3 col-sm-3 col-xs-3 profile_img">
          
            <div class="form">
						<h5>Upload Your Profile image</h5>
						<label class="upload-btn"> <input type="file" multiple /> <i
							class="fa fa-upload"></i> Browse
						</label> <span class="fake-input">No file selected</span>
					</div>
					
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div class="title-underlined">
                    <h4>Employer Job Postings</h4>
                  </div>
                  <!-- Email -->
                  <div class="form">
                    <h5> company name</h5>
                  <?= $form->field($model, 'company_name')->textInput(['autofocus' => true])->label(false) ?>			
                  </div>
                  
                  <!-- Email -->
                  <div class="form">
                    <h5>dateofestablishment</h5>
                  <?= $form->field($model, 'dateofestablishment')->widget(
                 DatePicker::className(), [
                'inline' => true, 
           		'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy' ]])->label(false) ?>
                  </div>
                  
                  <!-- Title -->
                  <div class="form">
                    <h5>country</h5>
                   <?= $form->field($model, 'country')->dropDownList(['Afghanistan' =>'Afghanistan' , 'Brazil' =>'Brazil', 'Bulgaria' =>'Bulgaria' , 'Canada' =>'Canada' , 'India' =>'India' , 'United Kingdom' =>'United Kingdom' , 'USA' =>'USA' , 'Rome' =>'Rome'],['prompt' =>'select'])->label(false) ?>
                  </div>
                  
                  <!-- Location -->
                  <div class="form">
                    <h5> state</h5>
                    <form role="form">
                    <?= $form->field($model, 'state')->dropDownList(['Himachal Pradesh' =>'Himachal Pradesh' , 'Andrapradesh' =>'Andrapradesh', 'Italy' =>'Italy' , 'California' =>'California' , 'Sweden' =>'Sweden' , 'Newyork' =>'Newyork' , 'parise' =>'parise'],['prompt' =>'select'])->label(false)?>
                    </form>
                  </div>
                  <div class="form-group">
                    <h5>city</h5>
                   <?= $form->field($model, 'city')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select'])->label(false);?>
                  </div>
                  <div class="form">
                    <h5>zipcode</h5>
                  <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true])->label(false) ?>
                  </div>
                   <div class="form">
                    <h5>CTC</h5>
                  <?= $form->field($model, 'CTC')->textInput(['autofocus' => true])->label(false) ?>
                  </div>
                   <div class="form">
                    <h5>skills</h5>
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

                  </div>
                  
                    <div class="form">
                    <h5>designation</h5>
                  <?= $form->field($model, 'designation')->label(false) ?>
                  </div>
                   <div class="form">
                    <h5>experience</h5>
                  <?= $form->field($model, 'experience')->dropDownList(['0 year' => '0 year', '< 1 year' => '< 1 year','1 year' => '1 year','< 2 years' =>'< 2 years','2 years' => '2 years','< 3 years' =>'< 3 years','3 years' => '3 years', '< 4 years'=>'< 4 years','4 years' => '4 years','< 5 years' =>'< 5 years','5 years' => '5 years', '< 6 years' => '< 6 years','6 years'=>'6 years', '7 years' =>'7 years',])->label(false) ?>
                  </div>
                   <div class="form">
                    <h5>rolecategory</h5>
                  <?= $form->field($model, 'rolecategory')->dropDownList(['Software Developer' => 'Software Developer','System Analyst' => 'System Analyst',
          		'Project Lead' => 'Project Lead','Testing Engineer' =>'Testing Engineer','Database Designer' => 'Database Designer',
          		'Product Manager' => 'Product Manager','System Admin' => ' System Admin'],['prompt'=>'select your jobrole'])->label(false) ?>
                  </div>
                   <div class="form">
                    <h5>Description</h5>
                  <?= $form->field($model, 'Description')->textarea(['rows' => 6])->label(false) ?>
                  </div>
                   <div class="form">
                    <h5>jobtype</h5>
                   <?= $form->field($model, 'jobtype')->radioList(['full time' =>'full time' , 'part time' =>'part time'],['prompt' =>'select']) ?>
                  </div>
                   <div class="form">
                    <h5>gender</h5>
                 <?= $form->field($model, 'gender')->radioList(['Male' =>'Male' , 'Femail' =>'Femail'],['prompt' =>'select']) ?>
                  </div>
                   <div class="form">
                    <h5>address</h5>
                 <?= $form->field($model, 'address')->textarea(['rows' => 6])->label(false) ?>
                  </div>
                                  
                </div>
              </div>
             
<div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
                
 
 
 <?php ActiveForm::end(); ?>
      		 
       		 </div>
       		 </div>
  </div>
  
  

       		 
       		 
