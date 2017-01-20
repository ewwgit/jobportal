<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\Url;



/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
$this->title = 'Signup';

?>
<style>
.required {
	color: #555 !important;
}
</style>

<div class="clearfix"></div>

<div id="titlebar" class="single">
	<div class="container">
		<div class="sixteen columns">
			<h2>Candidates Register</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="#">Home</a></li>
					<li>Candidates Register</li>
				</ul>
			</nav>
		</div>
	</div>
</div>

<div class="container">
	<div class="my-account">
		<ul class="tabs-nav">
			<li class="in-active"><a href="<?= Url::to(['/site/login'])?>" title="login">Login</a></li>
			<li class="active"><a href="<?= Url::to(['/site/signup'])?>" title="signup">Register</a></li>
		</ul>
		<div class="tabs-container">

          <?php $form = ActiveForm::begin([ 'id' => 'signup-form'
		
]); ?>
         
          <p class="form-row form-row-wide">
            	<h5>Name</h5>
              <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label(false);?>
           
              <h5>Sur Name</h5>
             <?= $form->field($model, 'surname')->textInput(['autofocus' => true])->label(false);?>
                
               <h5>User Name</h5>
              <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false);?>
           
          </p>
				<p class="form-row form-row-wide">
                <h5>Email</h5>
             <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label(false);?>
            
          </p>
				<p class="form-row form-row-wide">
                 <h5>Password</h5>
             <?= $form->field($model, 'password')->passwordInput()->label(false);?>
            
          </p>
				<p class="form-row form-row-wide">
                    <h5>Confirm Password</h5>
               <?= $form->field($model, 'confirmpassword')->passwordInput()->label(false);?>
           
          </p>
				<p class="form-row form-row-wide">  
				 
                   <h5>Gender</h5>
                 <?= $form->field($model, 'gender')->inline()->radioList(['male'=>'Male','female'=>'Female'],['prompt' =>'<---select gender--->'])->label(false);?>

          </p>

				<p class="form-row form-row-wide">
				
				
				<div class="form-group">
				  <h5>Date Of Birth</h5>
				<?=$form->field ( $model, 'dateofbirth' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter birth date ...' ],'pluginOptions' => [ 'autoclose' => true ] ] )->label(false);?>
          </p>

					<p class="form-row form-row-wide">
                     
                      <h5>Mobile Number</h5>
                  <?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true])->label(false);?>
           
          </p>
          
       

				
					<p class="form-row">
               <?= Html::submitButton('Signup', ['class' => 'button border fw margin-top-10', 'name' => 'signup-button'])?>
          </p>

          <?php ActiveForm::end(); ?>
        </div>
			</div>
	</div>

	