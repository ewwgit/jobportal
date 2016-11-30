<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Education */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'EducationForm';
$this->params ['breadcrumbs'] [] = [
		'label' => 'Signup',
		'url' => [
				'index'
		]
];
$this->params ['breadcrumbs'] [] = $this->title;
?>
<div>




<div class="container  ">
  <div class="panel panel-default">
    <div class="panel-heading">Employer In Formation</div>
    <div class="panel-body">

 <?php $form = ActiveForm::begin(['id'=>$model->formName()],['options' => ['enctype' => 'multipart/form-data']]); ?>
 
  <h1>Employer details</h1>
                 
                 <?= $form->field($model, 'name')->textInput(['autofocus' => true])?>
                 <?= $form->field($model, 'username')->textInput(['autofocus' => true])?>
                 <?= $form->field($model, 'email')->textInput(['autofocus' => true])?>
                 <?= $form->field($model, 'address')->textInput(['autofocus' => true])?>
                 <?= $form->field($model, 'gender')->radioList(['male'=>'male','female'=>'female'],['prompt' =>'<---select gender--->'])?>
                 <?= $form->field($model, 'dateofbirth')->widget(
                 DatePicker::className(), [
                'inline' => true, 
           		'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy' ]]);?>
                 <?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true])?>
                 <?= $form->field($model, 'designation')->textInput(['autofocus' => true])?>
         



                 <h1>EmployerSkills</h1>
                 <?= $form->field($model, 'requirment')->textInput(['autofocus' => true])?>
                 <?= $form->field($model, 'companytype')->radioList(['corporate' =>'corporate' , 'consultant' =>'consultant'],['prompt' =>'<---select--->']) ?>
                 <?= $form->field($model, 'jobtype')->radioList(['full time' =>'full time' , 'part time' =>'part time'],['prompt' =>'select']) ?>
         


				<h1>EmployerEmployement</h1>
                <?= $form->field($model, 'job_title') ?>				
			    
                <?= $form->field($model, 'job_type')->radioList(['full time' =>'full time' , 'part time' =>'part time'],['prompt' =>'select']) ?>
                <?= $form->field($model, 'job_description')->textarea(['rows' => 6]) ?>
                <?= $form->field($model, 'experience')->dropDownList(['6Months' =>'6Months' , '1year' =>'1year', '2years' =>'2years' , '3years' =>'3years' , '4years' =>'4years'],['prompt' =>'select']) ?>
                <?= $form->field($model, 'no_of_openings')->dropDownList(['10' =>'10' , '20' =>'20', '20' =>'20' , '50' =>'50' , '100' =>'100'],['prompt' =>'select']) ?>
			    <?= $form->field($model, 'shift_timings')->radioList(['DayShift' =>'DayShift' , 'NightShift' =>'NightShift'])?>
                <?= $form->field($model, 'work_location')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select']) ?>
                <?= $form->field($model, 'weekly_days')->textInput(['maxlength' => true]) ?>
			    <?= $form->field($model, 'salary')->textInput(['maxlength' => true]) ?>
         


				<h1>EmployerPreferencess</h1>
				<?= $form->field($model, 'expected_salary')->dropDownList(['10,000/month' =>'10,000/month' , '25,000/month' =>'25,000/month', '35,000/month' =>'35,000/month' , '30,000/month' =>'30,000/month' , '40,000/month' =>'40,000/month' , '50,000/month' =>'50,000/month' , '17,000/month' =>'17,000/month' ,'13,000/month' =>'13,000/month'],['prompt' =>'Min Salary']) ?>
                <?= $form->field($model, 'job_role')->dropDownList(['Accountant' =>'Accountant' , 'SoftwareEngineer' =>'SoftwareEngineer' , 'Tester' =>'Tester', 'Developer' =>'Developer' , 'DTP Operater' =>'DTP Operater' , 'Data Entry' =>'Data Entry' , 'Java Developer' =>'Java Developer' , 'Admin' =>'Admin' ,'Analyst' =>'Analyst','QA Analyst' =>'QA Analyst','Business Analyst' =>'Business Analyst'],['prompt' =>'select']) ?>
                 
                <?= $form->field($model, 'job_location')->dropDownList(['Hyderabad/Secundrabad' => 'Hyderabad/Secundrabad','Banglore' => 'Banglore',
          		'Chennai' => 'Chennai','Mumbai' =>'Mumbai','Pune' => 'Pune',
          		'Gurgon' => 'Gurgon','Delhi' => ' Delhi'],['prompt'=>'select your joblocation']) ?>
				
				<h1> EmployerCompany</h1>
				<?= $form->field($model, 'company_name') ?>				
				<?= $form->field($model, 'company_type')->radioList(['corporate' =>'corporate' , 'consultant' =>'consultant'],['prompt' =>'<---select--->']) ?>
                <?= $form->field($model, 'industry_type')->dropDownList(['Accounting/Consulting/Taxation' =>'Accounting/Consulting/Taxation' , 'Advertising/Event Management/PR' =>'Advertising/Event Management/PR', 'Animation / Gaming' =>'Animation / Gaming' , 'Entertainment/Media/Publishing/Dotcom' =>'Entertainment/Media/Publishing/Dotcom' , 'Banking/FinancialServices/Broking' =>'Banking/FinancialServices/Broking' , 'Software Services' =>'Software Services' , 'Machinery/Equipment Manufacturing/Industrial Products' =>'Machinery/Equipment Manufacturing/Industrial Products' , 'Education/Training/Teaching' =>'Education/Training/Teaching'],['prompt' =>'select']) ?>
               
                <?= $form->field($model, 'dateofestablishment')->widget(
                DatePicker::className(), [
                'inline' => true, 
           		'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy' ]
    		                 ]);?>
              
                 <?= $form->field($model, 'location')->dropDownList(['Hyderabad/Secundrabad' => 'Hyderabad/Secundrabad','Banglore' => 'Banglore',
          		'Chennai' => 'Chennai','Mumbai' =>'Mumbai','Pune' => 'Pune',
          		'Gurgon' => 'Gurgon','Delhi' => ' Delhi'],['prompt'=>'select your joblocation']) ?>
                <?= $form->field($model, 'country')->dropDownList(['Afghanistan' =>'Afghanistan' , 'Brazil' =>'Brazil', 'Bulgaria' =>'Bulgaria' , 'Canada' =>'Canada' , 'India' =>'India' , 'United Kingdom' =>'United Kingdom' , 'USA' =>'USA' , 'Rome' =>'Rome'],['prompt' =>'select']) ?>
			    <?= $form->field($model, 'state')->dropDownList(['Himachal Pradesh' =>'Himachal Pradesh' , 'Andrapradesh' =>'Andrapradesh', 'Italy' =>'Italy' , 'California' =>'California' , 'Sweden' =>'Sweden' , 'Newyork' =>'Newyork' , 'parise' =>'parise'],['prompt' =>'select']) ?>
                <?= $form->field($model, 'city')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select']) ?>
                <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true]) ?>
				
				<h1>EmployerEducation</h1>
				<?= $form->field($model, 'higherdegree')->dropDownList(['B.tech' =>'B.tech' , 'Degree' =>'Degree', 'BE' =>'BE','B.Pham' =>'B.pham' , 'Biotech' =>'Biotech', 'LLB' =>'LLB','Others' =>'Others'],['prompt' =>'select degree']) ?>				
				
                <?= $form->field($model, 'specialization')->dropDownList(['Computers' => 'Computers', 'Chemical' => 'Chemical',
          		'Civil' => 'Civil','Electrical' =>'Electrical','Electronics/Telecommunication' => 'Electronics/Telecommunication', 
          		'Automobile' => 'Automobile','Agricultural' => 'Agricultural','Mechanical' => 'Mechanical', 'Mining'=>'Mining',
             		 'BioMedical' => 'BioMedical', 'Other' => 'Other'],['prompt'=>'select your Specilization']) ?>
            
                <?= $form->field($model, 'university')->dropDownList(['JNTUH' =>'JNTUH' , 'JNTUK' =>'JNTUK', 'OU' =>'OU' , 'MGU' =>'MGU' , 'KU' =>'KU' , 'others' =>'others'],['prompt' =>'university']) ?> 
                <?= $form->field($model, 'collegename') ?>
                <?= $form->field($model, 'passingyear')->dropDownList(['1990' =>'1990' , '1991' =>'1991', '1992' =>'1992' , '2000' =>'2000' , '2010' =>'2010','2011' =>'2011' , '2012' =>'2012', '2013' =>'2013' , '2014' =>'2014','2015' =>'2015' , '2008' =>'2008'],['prompt' =>'select']) ?>
 			  
				</div>

<div class="form-group">
                   <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'signup-button'])?>
                </div>
<?php ActiveForm::end(); ?>



</div>

</div>

</div>










