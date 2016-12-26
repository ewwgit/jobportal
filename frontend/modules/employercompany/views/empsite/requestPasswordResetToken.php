<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\view;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out your email. A link to reset password will be sent there.</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

               
                <?=  $form->field($model, 'email')->textInput(array('placeholder' => 'Email'))->label(false);  ?>

                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php
		$this->registerJs ( "
		
		$('body').on('click', '.send-btn', function () {
		var form = $('#w0');
        if(form.find('.has-error')) {
        //$('#myModal').modal();
		
        }
      });
		function getParameterByName(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)'),
        results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ''));
}
		var reg = getParameterByName('success');
		if(reg ==1)
		{
		   $('#myModalnew').modal();
		}
		//console.log(reg);
		"
				,View::POS_READY, 'my-options'
				);
		?>