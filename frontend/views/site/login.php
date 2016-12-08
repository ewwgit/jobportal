<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';

?>

<div id="wrapper">

	<div class="clearfix"></div>

	<div id="titlebar" class="single">
		<div class="container">
			<div class="sixteen columns">
				<h2>Candidates Login</h2>
				<nav id="breadcrumbs">
					<ul>
						<li>You are here:</li>
						<li><a href="#">Home</a></li>
						<li>Candidates Login</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<!-- Container -->
	<div class="container">
		<div class="my-account">
			<ul class="tabs-nav">
				<li class=""><a href="<?= Url::to(['/site/login'])?>" title="login">Login</a></li>
				<li><a href="<?= Url::to(['/site/signup'])?>" title="signup">Register</a></li>
			</ul>
			<div class="tabs-container">
				<!-- Login -->
				<div class="tab-content" id="tab1" style="display: none;">
					<form method="post" class="login">
           <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <p class="form-row form-row-wide">

							<label for="username">Username: 
                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false)?>
              </label>
						</p>
						<p class="form-row form-row-wide">
							<label for="password">Password: 
             <?= $form->field($model, 'password')->passwordInput() ->label(false)?>
              </label>
						</p>
						<p class="form-row">
              
             
                    <?= $form->field($model, 'rememberMe')->checkbox()?>
               
            </p>

						<p class="form-row">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button','class' => 'button border fw margin-top-10'])?>

						
						<div style="color: #999; margin: 1em 0">
           <?= Html::a('Lost Your Password?', ['site/request-password-reset'])?>
                </div>
						</p>

            <?php ActiveForm::end(); ?>

          </form>
				</div>
			</div>
		</div>
	</div>
</div>







