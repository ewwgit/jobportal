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

          <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
         
          <p class="form-row form-row-wide">
            
              <?= $form->field($model, 'name')->textInput(['autofocus' => true])?>
           
           
             <?= $form->field($model, 'surname')->textInput(['autofocus' => true])?>
                
            
              <?= $form->field($model, 'username')->textInput(['autofocus' => true])?>
           
          </p>
				<p class="form-row form-row-wide">
           
             <?= $form->field($model, 'email')->textInput(['autofocus' => true])?>
            
          </p>
				<p class="form-row form-row-wide">
           
             <?= $form->field($model, 'password')->passwordInput()?>
            
          </p>
				<p class="form-row form-row-wide">
            
               <?= $form->field($model, 'confirmpassword')->passwordInput()?>
           
          </p>
				<p class="form-row form-row-wide">   
          
                 <?= $form->field($model, 'gender')->inline()->radioList(['male'=>'Male','female'=>'Female'],['prompt' =>'<---select gender--->'])?>

          </p>

				<p class="form-row form-row-wide">
				
				
				<div class="form-group">
				<?=$form->field ( $model, 'dateofbirth' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter birth date ...' ],'pluginOptions' => [ 'autoclose' => true ] ] )?>
          </p>

					<p class="form-row form-row-wide">
           
                  <?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true])?>
           
          </p>

					<p class="form-row form-row-wide">				
					
					<div class="form">
						<label for="password2">Profileimage</label> 
				    <?= $form->field($model, 'profileimage')->fileInput(['maxlength' => true])->label(false)?>
				   
				
					</div>
					</p>
					<p class="form-row">
               <?= Html::submitButton('Signup', ['class' => 'button border fw margin-top-10', 'name' => 'signup-button'])?>
          </p>

          <?php ActiveForm::end(); ?>
        </div>
			</div>
	</div>

	