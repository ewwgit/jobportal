<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'My Yii Application';
?>
<div class="container">
    <div class="my-account">
      <ul class="tabs-nav">
        <li class=""><a href="#tab1">Login</a></li>
        <li><a href="#tab2">Register</a></li>
      </ul>
      <div class="tabs-container"> 
        <!-- Login -->
        <div class="tab-content" id="tab1" style="display: none;">
          <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <p class="form-row form-row-wide">
              <label for="username">Username: <i class="fa fa-user"></i>
                 <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                
              </label>
            </p>
            <p class="form-row form-row-wide">
              <label for="password">Password: <i class="fa fa-lock"></i>
                  <?= $form->field($model, 'rememberMe')->checkbox() ?>
                
              </label>
            </p>
            <p class="form-row">
             <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
              <label for="rememberme" class="rememberme">
                  <?= $form->field($model, 'rememberMe')->checkbox() ?>
                Remember Me</label>
            </p>
            <p class="lost_password"> <a href="#" >Lost Your Password?</a> </p>
         <?php ActiveForm::end(); ?>
        </div>
         </div>
    </div>
  </div>