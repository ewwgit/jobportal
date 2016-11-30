<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Update Education';

?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
            
                  <?= $form->field($model, 'higherdegree')->dropDownList(['B.tech' =>'B.tech' , 'Degree' =>'Degree', 'BE' =>'BE','B.Pham' =>'B.pham' , 'Biotech' =>'Biotech', 'LLB' =>'LLB', 'Others' =>'Others'],['value' => $model->higherdegree]) ?>
                  <?= $form->field($model, 'specialization')->dropDownList(['ECE' =>'ECE' , 'CSE' =>'CSE', 'BA' =>'BA' , 'BSc' =>'Bsc' , 'B.com' =>'B.com' , 'BBA' =>'BBA' , 'Bzc' =>'Bzc' ,'IT' =>'IT'],['value' => $model->specialization]) ?>  
                  <?= $form->field($model, 'university')->dropDownList(['JNTUH' =>'JNTUH' , 'JNTUK' =>'JNTUK', 'OU' =>'OU' , 'MGU' =>'MGU' , 'KU' =>'KU' , 'others' =>'others'],['value' => $model->university] )?>                                   
                  <?= $form->field($model, 'collegename')->textInput(['value' => $model->collegename]) ?> 
                  <?= $form->field($model, 'passingyear')->dropDownList(['1990' =>'1990' , '1991' =>'1991', '1992' =>'1992' , '2000' =>'2000' , '2010' =>'2010','2011' =>'2011' , '2012' =>'2012', '2013' =>'2013' , '2014' =>'2014','2015' =>'2015' , '2008' =>'2008'],['value' => $model->passingyear]) ?>
                     
               
<div class="form-group">
                    <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>