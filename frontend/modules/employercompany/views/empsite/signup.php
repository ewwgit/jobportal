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
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
             <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

               <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                
                <?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
                
                <?= $form->field($model, 'dateofbirth')->textInput(['type' => 'date']) ?>
                
                <?= $form->field($model, 'gender')->radioList(['male' =>'male' , 'female' =>'female'],['prompt' =>'<---select gender--->']) ?>
                
                <?= $form->field($model, 'designation')->dropDownList(['Java Developer' =>'Java Developer' , 'Tester' =>'Tester', 'Designer' =>'Designer' , 'Administrator' =>'Administrator' , 'Software Engineer' =>'Software Engineer' , 'Web Developer' =>'Web Developer' , 'Php Developer' =>'Php Developer'],['prompt' =>'select designation']) ?>                  
       
                <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>
                               
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                     <a href="<?= Url::to(['/employercompany/empsite/login'])?>" title="viewprofile">login</a>
                </div>
               

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
