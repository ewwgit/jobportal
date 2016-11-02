<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Update Education';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please Update Your Education Details</p>

            
            <?php $form = ActiveForm::begin(['id' => 'form-education','action' => Yii::$app->getUrlManager()->createUrl('user/eduupdate')]); ?>
            
            
            
            <?= $form->field($model, 'highdegree')->dropDownList(['B-Tech/B.E.' => 'B-Tech/B.E.', 'B.Sc' => 'B.Sc',
          		'B.Ed' => 'B.Ed','BDS' =>'BDS','BFA' => 'BFA', 'B.Pharma' => 'B.Pharma',
          		'B.A' => 'B.A','B.Com' => 'B.Com','BCA' => 'BCA','Other' => 'Other'],['value' => $model->highdegree]) ?>
             
             <?= $form->field($model, 'specialization')->dropDownList(['Computers' => 'Computers', 'Chemical' => 'Chemical',
          		'Civil' => 'Civil','Electrical' =>'Electrical','Electronics/Telecommunication' => 'Electronics/Telecommunication', 
          		'Automobile' => 'Automobile','Agricultural' => 'Agricultural','Mechanical' => 'Mechanical', 'Mining'=>'Mining',
             		 'BioMedical' => 'BioMedical', 'Other' => 'Other'],['value' => $model->specialization]) ?>
            
             <?= $form->field($model, 'university')->textInput(['value' => $model->university]) ?>
              <?= $form->field($model, 'collegename')->textInput(['value' => $model->collegename]) ?>
              
               <?= $form->field($model, 'passingyear')->textInput(['value' => $model->passingyear]) ?>
               
            
            
                <div class="form-group">
                
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>

                </div>
                   
               
<?php ActiveForm::end(); ?>
       


