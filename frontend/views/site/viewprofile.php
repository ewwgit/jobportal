<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'UserProfile';
$this->params ['breadcrumbs'] [] = [
		'label' => 'Signup',
		'url' => [ 'index' ] ];
$this->params ['breadcrumbs'] [] = $this->title;
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
<body>

<div class="box">
 <h1>Personal Profile</h1>
 <table>
<tr><td>Regid</td><td><?php echo  $empmodel->userid ;?></td></tr>
<tr><td>Your Name:</td><td><?php echo  $empmodel->name;  ?></td></tr>
<tr><td>Your Surname:</td><td><?php echo  $empmodel->surname;  ?></td></tr>
<tr><td>Your Email:</td><td><?php  echo $umodel->email;?></td></tr>
<tr><td>Gender:</td><td><?php echo  $empmodel->gender;  ?></td></tr>
<tr><td>Mobile Number:</td><td><?php echo  $empmodel->mobilenumber;  ?></td></tr>
<tr><td>Dateof Birth:</td><td><?php echo  $empmodel->dateofbirth;  ?></td></tr>
 </table>
 </div>
 
 <div class="box">
<h1>Education Details</h1>
<table>
<tr><td>Highest Degree</td><td><?php echo  $edumodel->highdegree ;?></td></tr>
<tr><td>Highest Degree Specialization:</td><td><?php echo  $edumodel->specialization;  ?></td></tr>
<tr><td>Your University:</td><td><?php echo  $edumodel->university;  ?></td></tr>
<tr><td>Your College Name:</td><td><?php echo  $edumodel->collegename;  ?></td></tr>
<tr><td>Passing Year:</td><td><?php echo  $edumodel->passingyear;  ?></td></tr>
</table>
</div>


<div class="box">
<h1>Your Job Preferences Details</h1>
<table>
<tr><td>FunctionalArea:</td><td><?php echo  $jobmodel->functionalarea ;?></td></tr>
<tr><td>JobRole:</td><td><?php echo  $jobmodel->jobrole;  ?></td></tr>
<tr><td>PreferdLocation:</td><td><?php echo  $jobmodel->joblocation;  ?></td></tr>
<tr><td>Your Selected Expeience:</td><td><?php echo  $jobmodel->experience;  ?></td></tr>
<tr><td>JobType:</td><td><?php echo  $jobmodel->jobtype;  ?></td></tr>
<tr><td>Your Expected Salary:</td><td><?php echo  $jobmodel->expectedsalary;  ?></td></tr>
</table>
</div>

<div  class="box">
<h1>Your Job Skills Details</h1>
 
<table border=1>
<tr><td>Your SkillName:</td><td><?php echo  $skillmodel->skillname ;?></td></tr>
<tr><td>Lastused:</td><td><?php echo  $skillmodel->lastused;  ?></td></tr>
<tr><td>Your Skillexperience:</td><td><?php echo  $skillmodel->skillexperience;  ?></td></tr>

</table>

</div>

<div class="box">
<h1>Your Project Details</h1>
<table>
<tr><td>ProjectTitle:</td><td><?php echo  $projectmodel->prjtitle ;?></td></tr>
<tr><td>Project Startting Date:</td><td><?php echo  $projectmodel->prjstartdate;  ?></td></tr>
<tr><td>Project Ending Date:</td><td><?php echo  $projectmodel->prjenddate;  ?></td></tr>
<tr><td>Project Location:</td><td><?php echo  $projectmodel->prjlocation;  ?></td></tr>
<tr><td>Project Employement Type:</td><td><?php echo  $projectmodel->emptype;  ?></td></tr>
<tr><td>Project Description:</td><td><?php echo  $projectmodel->prjdescription;  ?></td></tr>
<tr><td>Project Role:</td><td><?php echo  $projectmodel->prjrole;  ?></td></tr>
<tr><td>Role Description:</td><td><?php echo  $projectmodel->prjroledescription;  ?></td></tr>
<tr><td>Project Team Size:</td><td><?php echo  $projectmodel->teamsize;  ?></td></tr>
<tr><td>Skills Used In Project:</td><td><?php echo  $projectmodel->prjskills;  ?></td></tr>
</table>
</div>


<div class="box">
<h1>Your Employer Details</h1>
<table>
<tr><td>Your Employer:</td><td><?php echo  $employermodel->employername ;?></td></tr>
<tr><td>Employer Type:</td><td><?php echo  $employermodel->employertype;  ?></td></tr>
<tr><td>Employer Designation:</td><td><?php echo  $employermodel->designation;  ?></td></tr>

</table>

</div>

<div class="box" >
<h1>Your Known Language Details</h1>
<table>
<tr><td>Language:</td><td><?php echo  $languagemodel->language ;?></td></tr>
<tr><td>Proficiency Level:</td><td><?php echo  $languagemodel->proficiencylevel;  ?></td></tr>

<tr><td>Your Language Ability:</td><td><?php echo  $languagemodel->ability;  ?></td></tr>



</table>

</div>
<div>
<h1>Resume</h1>



</div>












<div class="form-group" >
       <?= Html::a('update', ['/common/employee'], ['class'=>'btn btn-primary']) ?>
    </div>	

</body></html>

