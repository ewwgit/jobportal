<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\frontend\models\SignupForm;
use yii\helpers\Url;
use kartik\date\DatePicker;

$this->title = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;
?>
<style>
select {
	height: 40px !important;
}
</style>
 <div class="my-account">
<div class="site-signup">
    <ul class="tabs-nav">
			<li class="in-active"><a href="<?= Url::to(['/employercompany/empsite/login'])?>" title="login">Login</a></li>
			<li class="active"><a href="<?= Url::to(['/employercompany/empsite/signup'])?>" title="signup">Register</a></li>
		</ul>
     <div class="tabs-container"> 
       <div class="tab-content" id="tab1" >

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
            	 <p class="form-row form-row-wide">
              <label for="username">Name: 
              <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Name', 'class' => 'fa fa-user'])->label(false) ?>
              </label>
            </p>
            

             	 <p class="form-row form-row-wide">
              <label for="username">Username: 
              <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username',])->label(false) ?>
              </label>
            </p>

             	 <p class="form-row form-row-wide">
              <label for="username">Mobilenumber:
              <?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true,'placeholder' => 'Mobilenumber',])->label(false) ?>
              </label>
            </p>
                
               <p class="form-row form-row-wide">
              <label for="username">Email: 
              <?= $form->field($model, 'email')->textInput(['autofocus' => true,'placeholder' => 'Email',])->label(false) ?>
              </label>
            </p>

            <p class="form-row form-row-wide">
              <label for="username">Password: 
              <?= $form->field($model, 'password')->passwordInput() ->label(false) ?>
              </label>
            </p>

            <p class="form-row form-row-wide">
              <label for="username">Dateofbirth:
              <?=$form->field ( $model, 'dateofbirth' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter birth date ...' ],'pluginOptions' => [ 'autoclose' => true ] ] )->label(false);?>
              </label>
            </p>
                
               <p class="form-row form-row-wide">
              <label for="username">Gender:
              <?= $form->field($model, 'gender')->inline()->radioList(['male' =>'Male' , 'female' =>'Female'],['prompt' =>'<---select gender--->'])->label(false) ?>
              </label>
            </p>
                
              <p class="form-row form-row-wide">
              <label for="username">Designation:
              <?= $form->field($model, 'designation')->dropDownList(['Java Developer' =>'Java Developer' , 'Tester' =>'Tester', 'Designer' =>'Designer' , 'Administrator' =>'Administrator' , 'Software Engineer' =>'Software Engineer' , 'Web Developer' =>'Web Developer' , 'Php Developer' =>'Php Developer'],['prompt' =>'select designation'])->label(false) ?>                 
       
              </label>
            </p>
                
                <p class="form-row form-row-wide">
              <label for="username">Address: 
              <?= $form->field($model, 'address')->textarea(['rows' => 4])->label(false) ?>
       
              </label>
            </p>
             <p class="form-row form-row-wide">
           <div class="form">
			 <label for="password2">Profileimage</label>
				<label class="upload-btn"><i class="fa fa-upload"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				    <input type="file" multiple />
				     Browse
				</label>
				<span class="fake-input">No file selected</span>
			</div>
          
          </p>
          <p class="form-row">
          <?= Html::submitButton('Signup', ['class' => 'button border fw margin-top-10', 'name' => 'register']) ?>
          </p>
               

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
 </div>