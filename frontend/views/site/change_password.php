<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

// $this->title = 'Reset password';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div id="titlebar" class="single">
	<div class="container">
		<div class="sixteen columns">
			<h2>Reset password</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?= Yii::$app->getHomeUrl(); ?>">Home</a></li>
					<li>Reset password</li>
				</ul>
			</nav>
		</div>
	</div>
</div>
<div class="container"> 
<div class="site-reset-password">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please choose your new password:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                <?= $form->field($model, 'Oldpassword')->passwordInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'confirmPassword')->passwordInput(['autofocus' => true]) ?>
                 

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</div>
