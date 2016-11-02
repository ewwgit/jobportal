<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'IT Skills';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please Add  your  IT Skills Details</p>

            
            <?php $form = ActiveForm::begin(['id' => 'form-skills','action' => Yii::$app->getUrlManager()->createUrl('user/skills')]); ?>
            
            
               
          <?= $form->field($model, 'skillname')->textInput(['autofocus' => true]) ?>
             
             <?= $form->field($model, 'lastused')->dropDownList(['2016' => '2016', '2015' => '2015','2014' => '2014','2013' =>'2013',
          		'2012' => '2012','2011' =>'2011','2010' => '2010', '2009'=>'2009','2008' => '2008','2007' =>'2007','2006' =>'2006',
          		'2005' => '2005','2004' => '2004','2003' => '2003', '2002'=>'2002','2001'=>'2001','2000'=>'2000','1999'=>'1999',
             		 '1998' => '1998', '1997' => '1997','1996'=>'1996', '1995' =>'1995',]) ?>
             		 
            
             <?= $form->field($model, 'experience')->dropDownList(['0 year' => '0 year', '< 1 year' => '< 1 year','1 year' => '1 year','< 2 years' =>'< 2 years',
          		'2 years' => '2 years','< 3 years' =>'< 3 years','3 years' => '3 years', '< 4 years'=>'< 4 years','4 years' => '4 years','< 5 years' =>'< 5 years',
          		
             		 '5 years' => '5 years', '< 6 years' => '< 6 years','6 years'=>'6 years', '7 years' =>'7 years',]) ?>
            
            
            
                <div class="form-group">
                
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>

                </div>
                   
               
<?php ActiveForm::end(); ?>
       



       


