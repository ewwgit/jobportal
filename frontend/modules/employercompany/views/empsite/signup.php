<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\frontend\models\SignupForm;
use yii\helpers\Url;

$this->title = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;
?>

 <div class="my-account">
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

     <div class="tabs-container"> 
       <div class="tab-content" id="tab1" >

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
            	 <p class="form-row form-row-wide">
              <label for="username">name: <i class="fa fa-user"></i>
              <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label(false) ?>
              </label>
            </p>
            

             	 <p class="form-row form-row-wide">
              <label for="username">Username: <i class="fa fa-user"></i>
              <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false) ?>
              </label>
            </p>

             	 <p class="form-row form-row-wide">
              <label for="username">Mobilenumber: <i class="fa fa-user"></i>
              <?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true])->label(false) ?>
              </label>
            </p>
                
               <p class="form-row form-row-wide">
              <label for="username">Email: <i class="fa fa-user"></i>
              <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label(false) ?>
              </label>
            </p>

            <p class="form-row form-row-wide">
              <label for="username">Password: <i class="fa fa-user"></i>
              <?= $form->field($model, 'password')->passwordInput() ->label(false) ?>
              </label>
            </p>

            <p class="form-row form-row-wide">
              <label for="username">Dateofbirth: <i class="fa fa-user"></i>
              <?= $form->field($model, 'dateofbirth')->textInput(['type' => 'date']) ->label(false) ?>
              </label>
            </p>
                
               <p class="form-row form-row-wide">
              <label for="username">Gender: <i class="fa fa-user"></i>
              <?= $form->field($model, 'gender')->radioList(['male' =>'male' , 'female' =>'female'],['prompt' =>'<---select gender--->']) ?>
              </label>
            </p>
                
              <p class="form-row form-row-wide">
              <label for="username">Designation: <i class="fa fa-user"></i>
              <?= $form->field($model, 'designation')->dropDownList(['Java Developer' =>'Java Developer' , 'Tester' =>'Tester', 'Designer' =>'Designer' , 'Administrator' =>'Administrator' , 'Software Engineer' =>'Software Engineer' , 'Web Developer' =>'Web Developer' , 'Php Developer' =>'Php Developer'],['prompt' =>'select designation']) ?>                  
       
              </label>
            </p>
                
                <p class="form-row form-row-wide">
              <label for="username">Address: <i class="fa fa-user"></i>
              <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>
       
              </label>
            </p>
             
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                     <a href="<?= Url::to(['/employercompany/empsite/login'])?>" title="viewprofile">login</a>
                </div>
               

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
 </div>