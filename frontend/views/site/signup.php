<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

 

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */




?>


<html>
<head>
<title>Seeking an Job Portal Category Flat Bootstarp Resposive Website Template | Login :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Seeking Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!----font-Awesome----->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->
</head>

<body>
<div class="site-login">

<div class="banner_1">
	<div class="container">
		<div id="search_wrapper1">
		   <div id="search_form" class="clearfix">
		    <h1>Start your job search</h1>
		    <p>
			 <input type="text" class="text" placeholder=" " value="Enter Keyword(s)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Keyword(s)';}">
			 <input type="text" class="text" placeholder=" " value="Location" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Location';}">
			 <label class="btn2 btn-2 btn2-1b"><input type="submit" value="Find Jobs"></label>
			</p>
           </div>
		</div>
   </div> 
</div>	

<div class="row">
        <div class="col-lg-5">
        
        <div class="section-title">
                            <h3>JobSeeker Registration Form</h3>
                        </div>
        
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'surname')->textInput(['autofocus' => true]) ?>
                
                 <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                 <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                
                <?= $form->field($model, 'password')->passwordInput() ?>
                
                <?= $form->field($model, 'confirmpassword')->passwordInput() ?>
                 
                 <?= $form->field($model, 'gender')->radioList(['male'=>'male','female'=>'female'],['prompt' =>'<---select gender--->'])?>
                 
                 
                 
                 
                  
                <?= $form->field($model, 'dateofbirth')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => true, 
         // modify template for custom rendering
    		'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
]);?>
                  
                  <?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true]) ?>
                      
                 <?= $form->field($model, 'profileimage')->fileInput(['maxlength' => true]) ?>
                  

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
    
    </div>
</div>