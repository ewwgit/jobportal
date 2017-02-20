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
// $this->params['breadcrumbs'][] = $this->title;
?>
<style>
select {
	height: 40px !important;
}
#in-active {
	color: #aaa!important;
}
#active {
	color: #159ddd!important;
}
</style>
<div class="my-account">
	<div class="site-signup">
		<ul class="tabs-nav">
			<li id="in-active"><a
				href="<?= Url::to(['/employercompany/empsite/login'])?>"
				title="login">Login</a></li>
			<li id="active"><a
				href="<?= Url::to(['/employercompany/empsite/signup'])?>"
				title="signup">Register</a></li>
		</ul>
		<div class="tabs-container">
			<div class="tab-content" id="tab1">

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <p class="form-row form-row-wide">
					<label for="username">User Name: 
              <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username',])->label(false)?>
              </label>
				</p>
				
				<p class="form-row form-row-wide">
					<label for="username">Password: 
              <?= $form->field($model, 'password')->passwordInput() ->label(false)?>
              </label>
				</p>
				<p class="form-row form-row-wide">
					<label for="username">Conform Password: 
              <?= $form->field($model, 'confirmpassword')->passwordInput() ->label(false)?>
              </label>
				</p>
				
            	 <p class="form-row form-row-wide">
					<label for="username">First Name: 
              <?= $form->field($model, 'first_name')->textInput(['autofocus' => true, 'placeholder' => 'First Name',])->label(false)?>
              </label>
				</p>
				 <p class="form-row form-row-wide">
					<label for="username">Last Name: 
              <?= $form->field($model, 'last_name')->textInput(['autofocus' => true, 'placeholder' => 'Last Name', ])->label(false)?>
              </label>
				</p>
				
				<p class="form-row form-row-wide">
					<label for="username">Email: 
              <?= $form->field($model, 'email')->textInput(['autofocus' => true,'placeholder' => 'Email',])->label(false)?>
              </label>
				</p>

				<p class="form-row form-row-wide">
					<label for="username">Mobile Number:
              <?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true,'placeholder' => 'Mobilenumber',])->label(false)?>
              </label>
				</p>

				<p class="form-row form-row-wide">
					<label for="username">Date Of Birth:
              <?=$form->field ( $model, 'dateofbirth' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter birth date ...' ],'pluginOptions' => [ 'autoclose' => true ] ] )->label(false);?>
              </label>
				</p>

				<p class="form-row form-row-wide">
					<label for="username">Gender:
              <?= $form->field($model, 'gender')->inline()->radioList(['male' =>'Male' , 'female' =>'Female'],['prompt' =>'<---select gender--->'])->label(false)?>
              </label>
				</p>

				<p class="form-row">
          <?= Html::submitButton('Signup', ['class' => 'button border fw margin-top-10', 'name' => 'register'])?>
          </p>
               

            <?php ActiveForm::end(); ?>
        </div>
		</div>
	</div>
</div>
<style>
.required{
color:black;

}
</style>