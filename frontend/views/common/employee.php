<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Profile Information';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>
    <p>Please fill out your Additional Profile Information</p>
    
   
<?php $form = ActiveForm::begin(['id' => 'form-employee','action' => Yii::$app->getUrlManager()->createUrl('common/employee')]); ?>

<div >
<h1>Signup Details</h1>



                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
 
                <?= $form->field($model, 'surname')->textInput(['autofocus' => true]) ?>
                
                 <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                 <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                
               
                 
                 <?= $form->field($model, 'gender')->radioList(['male'=>'male','female'=>'female'],['prompt' =>'<---select gender--->'])?>
                 
                 
                 
                 <?php 
                 use dosamigos\datepicker\DatePicker;
                 
                 ?>
                  
                <?= $form->field($model, 'dateofbirth')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => true, 
         // modify template for custom rendering
    		'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
]);?>
                  
                  <?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true]) ?>
                      
               
                  

</div>
<div>

 <h1> Add Your Educational Details</h1>
            
            
               
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
               
               
               
               
               
               
               </div>
     <div>
     <h1> Add Your Job Preferences Details</h1>
     
     
     
       
          <?= $form->field($model, 'functionalarea')->dropDownList(['IT Software-ApplicationProgramming' => 'IT Software-ApplicationProgramming',
          		'IT Software-Mainframe' => 'IT Software-Mainframe','IT Software-Mobile' =>'IT Software-Mobile','IT Software-System Programming' => 'IT Software-System Programming',
          		'IT Software-Telecom' => 'IT Software-Telecom','IT Hardware' => 'IT Hardware'],['prompt'=>'select your functionalArea']) ?>
             
              
          <?= $form->field($model, 'jobrole')->dropDownList(['Software Developer' => 'Software Developer','System Analyst' => 'System Analyst',
          		'Project Lead' => 'Project Lead','Testing Engineer' =>'Testing Engineer','Database Designer' => 'Database Designer',
          		'Product Manager' => 'Product Manager','System Admin' => 'System Admin'],['prompt'=>'select your jobrole']) ?>
            
            <?= $form->field($model, 'joblocation')->dropDownList(['Hyderabad/Secundrabad' => 'Hyderabad/Secundrabad','Banglore' => 'Banglore',
          		'Chennai' => 'Chennai','Mumbai' =>'Mumbai','Pune' => 'Pune',
          		'Gurgon' => 'Gurgon','Delhi' => ' Delhi'],['prompt'=>'select your joblocation']) ?>
          		  <?= $form->field($model, 'experience')->dropDownList(['Fresher' => 'Fresher','1 year' => '1 year',
          		'2 year' => '2 year','3 year' =>'3 year','4 year' => '4 year',
          		'5 year' => '5 year','6 year' => ' 6 year'],['prompt'=>'select your experience']) ?>
          		<?= $form->field($model, 'jobtype')->radioList(['fulltime'=>'fulltime','parttime'=>'parttime'],['prompt' =>'<---select jobtype--->']) ?>
            
             
             
              
               <?= $form->field($model, 'expectedsalary')->textInput(['autofocus' => true]) ?>
                
     </div>
     
     
     <div>
     <h1>Add Your Skills Details</h1>
     
     
     <?= $form->field($model, 'skillname')->textInput(['autofocus' => true]) ?>
             
             <?= $form->field($model, 'lastused')->dropDownList(['2016' => '2016', '2015' => '2015','2014' => '2014','2013' =>'2013',
          		'2012' => '2012','2011' =>'2011','2010' => '2010', '2009'=>'2009','2008' => '2008','2007' =>'2007','2006' =>'2006',
          		'2005' => '2005','2004' => '2004','2003' => '2003', '2002'=>'2002','2001'=>'2001','2000'=>'2000','1999'=>'1999',
             		 '1998' => '1998', '1997' => '1997','1996'=>'1996', '1995' =>'1995',]) ?>
             		 
            
             <?= $form->field($model, 'experience')->dropDownList(['0 year' => '0 year', '< 1 year' => '< 1 year','1 year' => '1 year','< 2 years' =>'< 2 years',
          		'2 years' => '2 years','< 3 years' =>'< 3 years','3 years' => '3 years', '< 4 years'=>'< 4 years','4 years' => '4 years','< 5 years' =>'< 5 years',
          		
             		 '5 years' => '5 years', '< 6 years' => '< 6 years','6 years'=>'6 years', '7 years' =>'7 years',]) ?>
     
     
      
     </div>          

            
                <div class="form-group">
                
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>

                </div>
                   
               
<?php ActiveForm::end(); ?>







       






       


