<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>

<div class="my-account">
	<div class="site-login">
		<h1><?= Html::encode($this->title) ?></h1>

		<ul class="tabs-nav">
			<li class=""><a
				href="<?= Url::to(['/employercompany/empsite/login'])?>">Login</a></li>
			<li><a href="<?= Url::to(['/employercompany/empsite/signup'])?>">Register</a></li>
		</ul>

		<div class="tabs-container">
			<div class="tab-content" id="tab1">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

			 <p class="form-row form-row-wide">
					<label for="username">Username: 
              <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false)?>
              </label>
				</p>
				<p>
					<label for="username">Password: 

                <?= $form->field($model, 'password')->passwordInput()->label(false)?>
				 </label>
				</p>
				<p class="form-row">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button','class' => 'button border fw margin-top-10'])?>


                <?= $form->field($model, 'rememberMe')->checkbox()?>
				

                
				
				
				<div style="color: #999; margin: 1em 0">
           <?= Html::a('Lost Your Password?', ['empsite/request-password-reset']) ?>
                </div>
				</p>
            <?php ActiveForm::end(); ?>
        </div>
		</div>
	</div>
</div>

