<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


$this->title = 'Profile Update';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please Update your Personal Details:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-update','action' => Yii::$app->getUrlManager()->createUrl('user/update')]); ?>

                <?= $form->field($model, 'name')->textInput(['value' => $model->name])  ?>
                <?= $form->field($model, 'surname')->textInput(['value' => $model->surname]) ?>
                
              
                 <?= $form->field($model, 'email')->textInput(['value' => $model->email]) ?>
               
                 <?= $form->field($model, 'gender')->radioList(['male'=>'male','female'=>'female'],['prompt' =>'<---select gender--->'],['value' => $model->gender]) ?>
                  <?= $form->field($model, 'dateofbirth')->textInput(['type'=>'date'],['value' => $model->dateofbirth]) ?>
                  <?= $form->field($model, 'mobilenumber')->textInput(['value' => $model->mobilenumber]) ?>
                
                   

                <div class="form-group">
                    <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'update-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>


