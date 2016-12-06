<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>

<!-- Basic Page Needs
================================================== -->
<meta charset="utf-8">
<title>Work Scout</title>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/green.css" id="colors">

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
label.radio-inline {
	display: inline-block;
}
label.upload-btn i {
	color: #fff !important;
}
</style>
</head>

<body>
<div id="wrapper"> 

<div id="titlebar" class="single">
    <div class="container">
      <div class="sixteen columns">
        <h2>Profile Information</h2>
        <nav id="breadcrumbs">
          <ul>
            <li>You are here:</li>
            <li><a href="#">Home</a></li>
            <li>Profile Information</li>
          </ul>
        </nav>
      </div>
    </div>
  </div>





<div class="container"> 
    
    <!-- Submit Page -->
    <div class="sixteen columns">
      <div class="submit-page" style="padding:0px;">
        <div class="container">
          <div class="col-md-3 col-sm-3 col-xs-3 profile_img">
            <div class="form">
              <h5>Upload Your Profile image</h5>
              
    <img class='image' src="<?php echo Yii::getAlias('/jobportal').$model->profileimage; ?>" width="100" height="100">
    </img>
 <?= $form->field($model, 'profileimage')->fileInput(['maxlength' => true]) ?>
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div class="title-underlined">
                    <h4>Add Your Personal Details</h4>
                  </div>
                  <!-- Email -->
                  <div class="form">
                    <h5> Name</h5>
                   <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label(false) ?>
                  </div>
                  
                  <!-- Email -->
                  <div class="form">
                    <h5>Surname</h5>
                    <?= $form->field($model, 'surname')->textInput(['autofocus' => true])->label(false) ?>
                  </div>
                  
                  <!-- Title -->
                  <div class="form">
                    <h5>Email</h5>
                      <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label(false) ?>
                  </div>
                  
                  <!-- Location -->
                  <div class="form">
                    <h5> Gender</h5>
                    <form role="form">
                      <?= $form->field($model, 'gender')->radioList(['male'=>'male','female'=>'female'],['prompt' =>'<---select gender--->'])->label(false)?>
                    </form>
                  </div>
                  <div class="form-group">
                    <h5>Date of Birth</h5>
                     <?= $form->field($model, 'dateofbirth')->widget(
              DatePicker::className(), [
                'inline' => true, 
           		'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy' ]
    		                 ])->label(false);?>
                  </div>
                  <div class="form">
                    <h5>Mobile No</h5>
                     <?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true])->label(false) ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div class="title-underlined">
                    <h4>Add Your Educational Details</h4>
                  </div>
                  <div class="form">
                    <h5>Highdegree</h5>
                     <?= $form->field($model, 'highdegree')->dropDownList(['B-Tech/B.E.' => 'B-Tech/B.E.', 'B.Sc' => 'B.Sc',
          		              'B.Ed' => 'B.Ed','BDS' =>'BDS','BFA' => 'BFA', 'B.Pharma' => 'B.Pharma',
          		              'B.A' => 'B.A','B.Com' => 'B.Com','BCA' => 'BCA','Other' => 'Other'],
                              ['prompt'=>'select your Highdegree'])->label(false) ?>
                  </div>
                  
                  <!-- Email -->
                  <div class="form">
                    <h5> Specialization</h5>
                    <?= $form->field($model, 'specialization')->dropDownList(['Computers' => 'Computers', 'Chemical' => 'Chemical',
          		'Civil' => 'Civil','Electrical' =>'Electrical','Electronics/Telecommunication' => 'Electronics/Telecommunication', 
          		'Automobile' => 'Automobile','Agricultural' => 'Agricultural','Mechanical' => 'Mechanical', 'Mining'=>'Mining',
                'BioMedical' => 'BioMedical', 'Other' => 'Other'],['prompt'=>'select your Specilization'])->label(false) ?>
                  </div>
                  
                  <!-- Email -->
                  <div class="form">
                    <h5>University</h5>
                     <?= $form->field($model, 'university')->textInput(['autofocus' => true])->label(false) ?>
                  </div>
                  
                  <!-- Title -->
                  <div class="form">
                    <h5>Collegename</h5>
                     <?= $form->field($model, 'collegename')->textInput(['autofocus' => true])->label(false) ?>
                  </div>
                  <div class="form">
                    <h5>Passingyear</h5>
                   <?= $form->field($model, 'passingyear')->textInput(['autofocus' => true])->label(false) ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div class="title-underlined">
                    <h4>Add Your Job Preferences Details</h4>
                  </div>
                  <div class="form">
                    <h5>Functional Area</h5>
                    <?= $form->field($model, 'functionalarea')->dropDownList(['IT Software-ApplicationProgramming' => 'IT Software-ApplicationProgramming',
          		'IT Software-Mainframe' => 'IT Software-Mainframe','IT Software-Mobile' =>'IT Software-Mobile','IT Software-System Programming' => 'IT Software-System Programming',
          		'IT Software-Telecom' => 'IT Software-Telecom','IT Hardware' => 'IT Hardware'],['prompt'=>'select your functionalArea'])->label(false) ?>
                  </div>
                  <div class="form">
                    <h5>Jobrole</h5>
                     <?= $form->field($model, 'jobrole')->dropDownList(['Software Developer' => 'Software Developer','System Analyst' => 'System Analyst',
          		'Project Lead' => 'Project Lead','Testing Engineer' =>'Testing Engineer','Database Designer' => 'Database Designer',
          		'Product Manager' => 'Product Manager','System Admin' => 'System Admin'],['prompt'=>'select your jobrole'])->label(false) ?>
                  </div>
                  <div class="form">
                    <h5>Job Location</h5>
                     <?= $form->field($model, 'joblocation')->dropDownList(['Hyderabad/Secundrabad' => 'Hyderabad/Secundrabad','Banglore' => 'Banglore',
          		'Chennai' => 'Chennai','Mumbai' =>'Mumbai','Pune' => 'Pune',
          		'Gurgon' => 'Gurgon','Delhi' => ' Delhi'],['prompt'=>'select your joblocation'])->label(false) ?>
                  </div>
                  <div class="form">
                    <h5>Experience</h5>
                   <?= $form->field($model, 'experience')->dropDownList(['Fresher' => 'Fresher','1 year' => '1 year',
          		'2 year' => '2 year','3 year' =>'3 year','4 year' => '4 year',
          		'5 year' => '5 year','6 year' => ' 6 year'],['prompt'=>'select your experience'])->label(false) ?>
                  </div>
                  <div class="form">
                    <h5> Job Type</h5>
                    	<?= $form->field($model, 'jobtype')->radioList(['fulltime'=>'fulltime','parttime'=>'parttime'],['prompt' =>'<---select jobtype--->'])->label(false) ?>
                  </div>
                  <div class="form">
                    <h5>Expected Salary</h5>
                   <?= $form->field($model, 'expectedsalary')->textInput(['autofocus' => true])->label(false) ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div class="title-underlined">
                    <h4>Add Your Project Details</h4>
                  </div>
                  <div class="form">
                    <h5>Project Title</h5>
                     <?= $form->field($model, 'projecttitle')->textInput(['autofocus' => true])->label(false) ?>
     
                  </div>
                  
                  <!-- Email -->
                  <div class="form">
                    <h5> Project Start Date</h5>
                      <?= $form->field($model, 'projectstartdate')->widget(
              DatePicker::className(), [
                'inline' => true, 
           		'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy' ]
    		                 ])->label(false);?>
               
                 
                  </div>
                  
                  <!-- Email -->
                  <div class="form">
                    <h5> Project End Date</h5>
                     <?= $form->field($model, 'projectenddate')->widget(
              DatePicker::className(), [
                'inline' => true, 
           		'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy' ]
    		                 ])->label(false);?>
               
                  </div>
                  
                  <!-- Title -->
                  <div class="form">
                    <h5>Project Location</h5>
                     <?= $form->field($model, 'projectlocation')->textInput(['autofocus' => true])->label(false) ?>  
                  </div>
                  <div class="form">
                    <h5> Employement Type</h5>
                     <?= $form->field($model, 'employementtype')->radioList(['FullTime'=>'FullTime','PartTime'=>'PartTime','ContractualProject' =>'ContractualProject'])->label(false)?>
                    </form>
                  </div>
                  <div class="form">
                    <h5> Project Description</h5>
                   <?= $form->field($model, 'projectdescription')->textArea(['rows' => '3']) ?>
                  </div>
                  <div class="form">
                    <h5>Role</h5>
                      <?= $form->field($model, 'role')->dropDownList(['Domain Expert' =>'Domain Expert','Sr project leader' => 'Sr project leader','solution architect' => 'solution architect','quality analyst' => 'quality analyst',
          		'databse architect' => 'databse architect','system admin' =>'system admin','project leader' => 'project leader','Programmer' => 'Programmer','test engineer'=>'test engineer','Other' =>'Other'],['prompt'=>'Select']) ?>
                  </div>
                  <div class="form">
                    <h5> Role Description</h5>
                     <?= $form->field($model, 'roledescription')->textArea(['rows' => '3']) ?>
                  </div>
                  <div class="form">
                    <h5>Teamsize</h5>
                   <?= $form->field($model, 'teamsize')->dropDownList(['1' =>'1','2' => '2','3' => '3','4' => '4','5' => '5','6' =>'6','7'=>'7',
          		'8' => '8','9' =>'9','10' => '10','11' => '11','12'=>'12'],['prompt'=>'Select']) ?> 
                  </div>
                  <div class="form">
                    <h5>Skills Used</h5>
                   <?= $form->field($model, 'skillsused')->textInput(['autofocus' => true]) ?>  
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div class="title-underlined">
                    <h4>Add Your Skills Details</h4>
                  </div>
                  <div class="form">
                   
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
              <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div class="title-underlined">
                    <h4>Add Your Employer Details</h4>
                  </div>
                  <div class="form">
                    <h5>Employer Name</h5>
                   <?= $form->field($model, 'employername')->textInput(['autofocus' => true]) ?>
                  </div>
                  <div class="form">
                    <h5> Employer Type</h5>
                    <form role="form" style="margin-top:1.3em;">
                       <?= $form->field($model, 'employertype')->radioList(['CurrentEmployer'=>'CurrentEmployer','PreviousEmployer'=>'PreviousEmployer','OtherEmployer' =>'OtherEmployer'])?>
                    </form>
                  </div>
                  <div class="form">
                    <h5>Designation</h5>
                 <?= $form->field($model, 'designation')->textInput(['autofocus' => true]) ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div class="title-underlined">
                    <h4>Add Your Other Details or Known Languages</h4>
                  </div>
                  <div class="form">
                    <h5>Language</h5>
                   <?= $form->field($model, 'language')->textInput(['autofocus' => true]) ?>
                  </div>
                  <div class="form">
                    <h5> Proficiencylevel</h5>
                   <?= $form->field($model, 'proficiencylevel')->dropDownList(['Beginner' =>'Beginner','Proficient' => 'Proficient','Expert' => 'Expert',
          ],['prompt'=>'Select']) ?>
          
                  </div>
                  <div class="form">
                    <h5> Ability</h5>
                    <form role="form" style="">
                       <?= $form->field($model, 'ability')->checkboxList(['Read' => 'Read','Write' => 'Write',
		   'Speak' => 'Speak',])?>   
          
                    </form>
                  </div>
                  <a href="#" class="button gray " style="text-decoration:none; margin-top:1em;"><i class="fa fa-plus-circle"></i> Add Skills</a> </div>
              </div>
              <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div class="title-underlined">
                    <h4>Upload Your Resume</h4>
                  </div>
                  <div class="form">
                    <h5>Resume</h5>
                   <?= $form->field($model, 'resume')->fileInput(['maxlength' => true])->label(false) ?>
  <lable>Support File Format .doc,.pdf upto 5 mb.</lable><br>
  <lable> Note:This Resume only visible to Milstone Profiles to Employers.</lable>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="divider margin-top-0 padding-reset"></div>
         <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
    </div>
  </div>
  
  <!-- Footer
================================================== -->
  <div class="margin-top-60"></div>
  <div id="footer"> 
    <!-- Main -->
    <div class="container">
      <div class="seven columns">
        <h4>About</h4>
        <p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
        <a href="#" class="button">Get Started</a> </div>
      <div class="three columns">
        <h4>Company</h4>
        <ul class="footer-links">
          <li><a href="#">About Us</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Our Blog</a></li>
          <li><a href="#">Terms of Service</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Hiring Hub</a></li>
        </ul>
      </div>
      <div class="three columns">
        <h4>Press</h4>
        <ul class="footer-links">
          <li><a href="#">In the News</a></li>
          <li><a href="#">Press Releases</a></li>
          <li><a href="#">Awards</a></li>
          <li><a href="#">Testimonials</a></li>
          <li><a href="#">Timeline</a></li>
        </ul>
      </div>
      <div class="three columns">
        <h4>Browse</h4>
        <ul class="footer-links">
          <li><a href="#">Freelancers by Category</a></li>
          <li><a href="#">Freelancers in USA</a></li>
          <li><a href="#">Freelancers in UK</a></li>
          <li><a href="#">Freelancers in Canada</a></li>
          <li><a href="#">Freelancers in Australia</a></li>
          <li><a href="#">Find Jobs</a></li>
        </ul>
      </div>
    </div>
    
    <!-- Bottom -->
    <div class="container">
      <div class="footer-bottom">
        <div class="sixteen columns">
          <h4>Follow Us</h4>
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
            <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
            <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
          </ul>
          <div class="copyrights">©  Copyright 2015 by <a href="#">Work Scout</a>. All Rights Reserved.</div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Back To Top Button -->
  <div id="backtotop"><a href="#"></a></div>
</div>
<!-- Wrapper / End --> 

<!-- Scripts
================================================== --> 
<script src="scripts/jquery-2.1.3.min.js"></script> 
<script src="scripts/custom.js"></script> 
<script src="scripts/jquery.superfish.js"></script> 
<script src="scripts/jquery.themepunch.tools.min.js"></script> 
<script src="scripts/jquery.themepunch.revolution.min.js"></script> 
<script src="scripts/jquery.themepunch.showbizpro.min.js"></script> 
<script src="scripts/jquery.flexslider-min.js"></script> 
<script src="scripts/chosen.jquery.min.js"></script> 
<script src="scripts/jquery.magnific-popup.min.js"></script> 
<script src="scripts/waypoints.min.js"></script> 
<script src="scripts/jquery.counterup.min.js"></script> 
<script src="scripts/jquery.jpanelmenu.js"></script> 
<script src="scripts/stacktable.js"></script> 
<script src="scripts/headroom.min.js"></script> 
<script src="scripts/vendor-datepicker.js"></script> 
<script src="scripts/vendor-date.js"></script> 

<!-- WYSIWYG Editor --> 
<script type="text/javascript" src="scripts/jquery.sceditor.bbcode.min.js"></script> 
<script type="text/javascript" src="scripts/jquery.sceditor.js"></script> 

<!-- Style Switcher
================================================== --> 
<script src="scripts/switcher.js"></script>
<div id="style-switcher">
  <h2>Style Switcher <a href="#"></a></h2>
  <div>
    <h3>Predefined Colors</h3>
    <ul class="colors" id="color1">
      <li><a href="#" class="green" title="Green"></a></li>
      <li><a href="#" class="blue" title="Blue"></a></li>
      <li><a href="#" class="orange" title="Orange"></a></li>
      <li><a href="#" class="navy" title="Navy"></a></li>
      <li><a href="#" class="yellow" title="Yellow"></a></li>
      <li><a href="#" class="peach" title="Peach"></a></li>
      <li><a href="#" class="beige" title="Beige"></a></li>
      <li><a href="#" class="purple" title="Purple"></a></li>
      <li><a href="#" class="celadon" title="Celadon"></a></li>
      <li><a href="#" class="pink" title="Pink"></a></li>
      <li><a href="#" class="red" title="Red"></a></li>
      <li><a href="#" class="brown" title="Brown"></a></li>
      <li><a href="#" class="cherry" title="Cherry"></a></li>
      <li><a href="#" class="cyan" title="Cyan"></a></li>
      <li><a href="#" class="gray" title="Gray"></a></li>
      <li><a href="#" class="olive" title="Olive"></a></li>
    </ul>
    <h3>Layout Style</h3>
    <div class="layout-style">
      <select id="layout-style">
        <option value="2">Wide</option>
        <option value="1">Boxed</option>
      </select>
    </div>
    <h3>Header Style</h3>
    <div class="layout-style">
      <select id="header-style">
        <option value="1">Style 1</option>
        <option value="2">Style 2</option>
        <option value="3">Style 3</option>
      </select>
    </div>
    <h3>Background Image</h3>
    <ul class="colors bg" id="bg">
      <li><a href="#" class="bg1"></a></li>
      <li><a href="#" class="bg2"></a></li>
      <li><a href="#" class="bg3"></a></li>
      <li><a href="#" class="bg4"></a></li>
      <li><a href="#" class="bg5"></a></li>
      <li><a href="#" class="bg6"></a></li>
      <li><a href="#" class="bg7"></a></li>
      <li><a href="#" class="bg8"></a></li>
      <li><a href="#" class="bg9"></a></li>
      <li><a href="#" class="bg10"></a></li>
      <li><a href="#" class="bg11"></a></li>
      <li><a href="#" class="bg12"></a></li>
      <li><a href="#" class="bg13"></a></li>
      <li><a href="#" class="bg14"></a></li>
      <li><a href="#" class="bg15"></a></li>
      <li><a href="#" class="bg16"></a></li>
    </ul>
    <h3>Background Color</h3>
    <ul class="colors bgsolid" id="bgsolid">
      <li><a href="#" class="green-bg" title="Green"></a></li>
      <li><a href="#" class="blue-bg" title="Blue"></a></li>
      <li><a href="#" class="orange-bg" title="Orange"></a></li>
      <li><a href="#" class="navy-bg" title="Navy"></a></li>
      <li><a href="#" class="yellow-bg" title="Yellow"></a></li>
      <li><a href="#" class="peach-bg" title="Peach"></a></li>
      <li><a href="#" class="beige-bg" title="Beige"></a></li>
      <li><a href="#" class="purple-bg" title="Purple"></a></li>
      <li><a href="#" class="red-bg" title="Red"></a></li>
      <li><a href="#" class="pink-bg" title="Pink"></a></li>
      <li><a href="#" class="celadon-bg" title="Celadon"></a></li>
      <li><a href="#" class="brown-bg" title="Brown"></a></li>
      <li><a href="#" class="cherry-bg" title="Cherry"></a></li>
      <li><a href="#" class="cyan-bg" title="Cyan"></a></li>
      <li><a href="#" class="gray-bg" title="Gray"></a></li>
      <li><a href="#" class="olive-bg" title="Olive"></a></li>
    </ul>
  </div>
  <div id="reset"><a href="#" class="button color">Reset</a></div>
</div>
</body>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker9,#datetimepicker10,#datetimepicker11').datetimepicker({
			 useCurrent: false
			});
   

		
    });
	
</script>
</html>






       






       


