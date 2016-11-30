<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
$this->title = 'Profile Information';
$this->params['breadcrumbs'][] = $this->title;
?>



<html>
<head>
<title>Seeking an Job Portal Category Flat Bootstarp Resposive Website Template | Login :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Seeking Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!----font-Awesome----->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->
</head>
</html>

 <h1><?= Html::encode($this->title) ?></h1>
 <p>Please fill out your Additional Profile Information</p>
       
<?php $form = ActiveForm::begin(['id' => 'form-employee','action' => Yii::$app->getUrlManager()->createUrl('common/employee')]); ?>

<!--Image Form  -->
<div>
<h1>Upload Your Profileimage</h1>

   
    <img class='image' src="<?php echo Yii::getAlias('/jobportal').$model->profileimage; ?>" width="100" height="100">
    </img>
 <?= $form->field($model, 'profileimage')->fileInput(['maxlength' => true]) ?>


</div>


<!--Personal Details Form  -->

<div >

 <h1>Add Your Personal Details </h1>
        
                 <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                 <?= $form->field($model, 'surname')->textInput(['autofocus' => true]) ?>
                 <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                 <?= $form->field($model, 'gender')->radioList(['male'=>'male','female'=>'female'],['prompt' =>'<---select gender--->'])?>
                 <?= $form->field($model, 'dateofbirth')->widget(
              DatePicker::className(), [
                'inline' => true, 
           		'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy' ]
    		                 ]);?>
                 <?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true]) ?>
               
</div>
   
   
 <!--Educational Details Form   -->  
   
<div>

   <h1> Add Your Educational Details</h1>
                 <?= $form->field($model, 'highdegree')->dropDownList(['B-Tech/B.E.' => 'B-Tech/B.E.', 'B.Sc' => 'B.Sc',
          		              'B.Ed' => 'B.Ed','BDS' =>'BDS','BFA' => 'BFA', 'B.Pharma' => 'B.Pharma',
          		              'B.A' => 'B.A','B.Com' => 'B.Com','BCA' => 'BCA','Other' => 'Other'],
                              ['prompt'=>'select your Highdegree']) ?>
                 <?= $form->field($model, 'specialization')->dropDownList(['Computers' => 'Computers', 'Chemical' => 'Chemical',
          		'Civil' => 'Civil','Electrical' =>'Electrical','Electronics/Telecommunication' => 'Electronics/Telecommunication', 
          		'Automobile' => 'Automobile','Agricultural' => 'Agricultural','Mechanical' => 'Mechanical', 'Mining'=>'Mining',
                'BioMedical' => 'BioMedical', 'Other' => 'Other'],['prompt'=>'select your Specilization']) ?>
                 <?= $form->field($model, 'university')->textInput(['autofocus' => true]) ?>
                 <?= $form->field($model, 'collegename')->textInput(['autofocus' => true]) ?>
                 <?= $form->field($model, 'passingyear')->textInput(['autofocus' => true]) ?>
                 
                
</div>
     
     
  <!-- Job Preference Detalis Form -->   
     
     
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


<!-- Project Details Form -->


<div>
     
     
     <h1>Add Your Project Details</h1>
     
     
     <?= $form->field($model, 'projecttitle')->textInput(['autofocus' => true]) ?>
     
     
     
     <?= $form->field($model, 'projectstartdate')->widget(
              DatePicker::className(), [
                'inline' => true, 
           		'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy' ]
    		                 ]);?>
               
                 
                 
                 <?= $form->field($model, 'projectenddate')->widget(
              DatePicker::className(), [
                'inline' => true, 
           		'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy' ]
    		                 ]);?>
               
        
          		
          		
            <?= $form->field($model, 'projectlocation')->textInput(['autofocus' => true]) ?>  
       
          
          
            <?= $form->field($model, 'employementtype')->radioList(['FullTime'=>'FullTime','PartTime'=>'PartTime','ContractualProject' =>'ContractualProject'])?>
          
            <?= $form->field($model, 'projectdescription')->textArea(['rows' => '3']) ?>
          
          
             <?= $form->field($model, 'role')->dropDownList(['Domain Expert' =>'Domain Expert','Sr project leader' => 'Sr project leader','solution architect' => 'solution architect','quality analyst' => 'quality analyst',
          		'databse architect' => 'databse architect','system admin' =>'system admin','project leader' => 'project leader','Programmer' => 'Programmer','test engineer'=>'test engineer','Other' =>'Other'],['prompt'=>'Select']) ?>
          
          
             <?= $form->field($model, 'roledescription')->textArea(['rows' => '3']) ?>
            
              <?= $form->field($model, 'teamsize')->dropDownList(['1' =>'1','2' => '2','3' => '3','4' => '4','5' => '5','6' =>'6','7'=>'7',
          		'8' => '8','9' =>'9','10' => '10','11' => '11','12'=>'12'],['prompt'=>'Select']) ?> 
          		
             <?= $form->field($model, 'skillsused')->textInput(['autofocus' => true]) ?>  
          	
</div>
     
 
 <!-- Skills Details Form -->
 
 <div> 
     
      
      <h1>Add Your Skills Details</h1>
    
      <table class="form-table" id="customFields1">
          <tr><td><?= $form->field($model, 'skillname[]')->textInput(['autofocus' => true]) ?></td>
            
          <td> <?= $form->field($model, 'lastused[]')->dropDownList(['2016' => '2016', '2015' => '2015','2014' => '2014','2013' =>'2013',
          		'2012' => '2012','2011' =>'2011','2010' => '2010', '2009'=>'2009','2008' => '2008','2007' =>'2007','2006' =>'2006',
          		'2005' => '2005','2004' => '2004','2003' => '2003', '2002'=>'2002','2001'=>'2001','2000'=>'2000','1999'=>'1999',
                '1998' => '1998', '1997' => '1997','1996'=>'1996', '1995' =>'1995'],['prompt' => 'select your skill lastused year ']) ?></td>
           <td><?= $form->field($model, 'skillexperience[]')->dropDownList(['0 year' => '0 year', '< 1 year' => '< 1 year','1 year' => '1 year','< 2 years' =>'< 2 years',
          		'2 years' => '2 years','< 3 years' =>'< 3 years','3 years' => '3 years', '< 4 years'=>'< 4 years','4 years' => '4 years','< 5 years' =>'< 5 years',
          		
             		 '5 years' => '5 years', '< 6 years' => '< 6 years','6 years'=>'6 years', '7 years' =>'7 years',],['prompt' => 'select your skillexperience ']) ?> </td>
             		 
             		 
          <td><a href="javascript:void(0);" class="addCF1">AddSkill</a></td></tr>
          
     </table>
    
    
    <div id="dynamiccontent" style="display: none;">
    
       <table class="form-table" id="customFields1">
         <tr><td><?= $form->field($model, 'skillname[]')->textInput(['autofocus' => true]) ?></td>
            
             <td> <?= $form->field($model, 'lastused[]')->dropDownList(['2016' => '2016', '2015' => '2015','2014' => '2014','2013' =>'2013',
          		'2012' => '2012','2011' =>'2011','2010' => '2010', '2009'=>'2009','2008' => '2008','2007' =>'2007','2006' =>'2006',
          		'2005' => '2005','2004' => '2004','2003' => '2003', '2002'=>'2002','2001'=>'2001','2000'=>'2000','1999'=>'1999',
                '1998' => '1998', '1997' => '1997','1996'=>'1996', '1995' =>'1995'],['prompt' => 'select your skill lastused year ']) ?></td>
             <td><?= $form->field($model, 'skillexperience[]')->dropDownList(['0 year' => '0 year', '< 1 year' => '< 1 year','1 year' => '1 year','< 2 years' =>'< 2 years',
          		'2 years' => '2 years','< 3 years' =>'< 3 years','3 years' => '3 years', '< 4 years'=>'< 4 years','4 years' => '4 years','< 5 years' =>'< 5 years',
          		
             		 '5 years' => '5 years', '< 6 years' => '< 6 years','6 years'=>'6 years', '7 years' =>'7 years',],['prompt' => 'select your skillexperience ']) ?> </td>
             		 
             <td><a href="javascript:void(0);" class="remCF">Remove</a></td> 		 
        </tr></table>   		 
    </div>
    
    
     
    <script src="js/jquery.js" type="text/javascript"></script>
   <script type="text/javascript">
     $(document).ready(function(){
	$(".addCF1").on('click',function(){
		var dync = $('#dynamiccontent').html();
		//console.log(dync);
		$("#customFields1").append(dync);
	});
    $("#customFields1").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
});
	</script>

            		        
         
 </div>
	 
 <!-- Employer Details Form -->         
            
<div>
    
    
    <h1>Add Your Employer Details</h1>
    
        
        
      <?= $form->field($model, 'employername')->textInput(['autofocus' => true]) ?>
      <?= $form->field($model, 'employertype')->radioList(['CurrentEmployer'=>'CurrentEmployer','PreviousEmployer'=>'PreviousEmployer','OtherEmployer' =>'OtherEmployer'])?>
         
      <?= $form->field($model, 'designation')->textInput(['autofocus' => true]) ?>
    
    
    
</div>
    
    
        
        
<div>


    <h1>Add Your Other Details or Known Languages</h1>
    
      <table class="form-table" id="customFields">
     <tr><td> <?= $form->field($model, 'language')->textInput(['autofocus' => true]) ?></td>
      <td><?= $form->field($model, 'proficiencylevel')->dropDownList(['Beginner' =>'Beginner','Proficient' => 'Proficient','Expert' => 'Expert',
          ],['prompt'=>'Select']) ?></td>
          
       <td><?= $form->field($model, 'ability')->checkboxList(['Read' => 'Read','Write' => 'Write',
		   'Speak' => 'Speak',])?>   </td>
          
       <td><a href="javascript:void(0);" class="addCF">AddMore</a></td></tr>
       </table>
       
       
          <div id="dynamiccon" style="display: none;">
       
       
           <table class="form-table" id="customFields">
     <tr><td> <?= $form->field($model, 'language')->textInput(['autofocus' => true]) ?></td>
      <td><?= $form->field($model, 'proficiencylevel')->dropDownList(['Beginner' =>'Beginner','Proficient' => 'Proficient','Expert' => 'Expert',
          ],['prompt'=>'Select']) ?></td>
          
       <td><?= $form->field($model, 'ability')->checkboxList(['Read' => 'Read','Write' => 'Write',
		   'Speak' => 'Speak',])?>   </td>
          
        <td><a href="javascript:void(0);" class="remCF">Remove</a></td> 	
       </table>
       
       </div>
        <script src="js/jquery.js" type="text/javascript"></script>
   <script type="text/javascript">
     $(document).ready(function(){
	$(".addCF").on('click',function(){
		var dync = $('#dynamiccon').html();
		//console.log(dync);
		$("#customFields").append(dync);
	});
    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
});
	</script>
       
       
       
       
</div>


<div>
 <h1>Upload  Your Resume </h1>
  
  
  <?= $form->field($model, 'resume')->fileInput(['maxlength' => true]) ?>
  <lable>Support File Format .doc,.pdf upto 5 mb.</lable><br>
  <lable> Note:This Resume only visible to Milstone Profiles to Employers.</lable>
        


</div>
    

    
    
    
            
            
            
    <div class="form-group">
                
    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    
    </div>
    
    
   
    
    
                   
               
<?php ActiveForm::end(); ?>







       






       


