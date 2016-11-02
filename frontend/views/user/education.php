
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Education Details';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out your Education Details</p>

            
            <?php $form = ActiveForm::begin(['id' => 'form-education','action' => Yii::$app->getUrlManager()->createUrl('user/education')]); ?>
            
            
               
          <?= $form->field($model, 'highdegree')->dropDownList(['B-Tech/B.E.' => 'B-Tech/B.E.', 'B.Sc' => 'B.Sc',
          		'B.Ed' => 'B.Ed','BDS' =>'BDS','BFA' => 'BFA', 'B.Pharma' => 'B.Pharma',
          		'B.A' => 'B.A','B.Com' => 'B.Com','BCA' => 'BCA','Other' => 'Other'],['prompt'=>'select your Highdegree']) ?>
             
             
             <?= $form->field($model, 'specialization')->dropDownList(['Computers' => 'Computers', 'Chemical' => 'Chemical',
          		'Civil' => 'Civil','Electrical' =>'Electrical','Electronics/Telecommunication' => 'Electronics/Telecommunication', 
          		'Automobile' => 'Automobile','Agricultural' => 'Agricultural','Mechanical' => 'Mechanical', 'Mining'=>'Mining',
             		 'BioMedical' => 'BioMedical', 'Other' => 'Other'],['prompt'=>'select your Specilization']) ?>
            
             <?= $form->field($model, 'university')->textInput(['autofocus' => true]) ?>
             
              <?= $form->field($model, 'collegename')->textInput(['autofocus' => true]) ?>
              
               <?= $form->field($model, 'passingyear')->textInput(['autofocus' => true]) ?>
               
            
            
                <div class="form-group">
                
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>

                </div>
                   
               
<?php ActiveForm::end(); ?>
       



       

