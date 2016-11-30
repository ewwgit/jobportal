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
<body>
<div class="box">
 <h2>EmployerPersonal Profile</h2>
 <table id="vertical-1">
<tr><th>Username:</th><td><?php echo  $model->username ;?></td></tr>
<tr><th>Your Email:</th><td><?php  echo $model->email;?></td></tr>

<tr><th>Your Name:</th><td><?php echo  $employemodel->name;  ?></td></tr>
<tr><th>Your designation:</th><td><?php echo  $employemodel->designation;  ?></td></tr>

<tr><th>Gender:</th><td><?php echo  $employemodel->gender;  ?></td></tr>
<tr><th>Mobile Number:</th><td><?php echo  $employemodel->mobilenumber;  ?></td></tr>
<tr><th>Dateof Birth:</th><td><?php echo  $employemodel->dateofbirth;  ?></td></tr>
<tr><th>address:</th><td><?php echo  $employemodel->address;  ?></td></tr>

 </table>
 </div>
 <div class="box">
  <h2>Employer Education:</h2>
 <table id="vertical-1">
<tr><th>Highest Degree:</th><td><?php echo  $edumodel->higherdegree ;?></td></tr>
<tr><th>Highest Degree Specialization:</th><td><?php echo  $edumodel->specialization;  ?></td></tr>
<tr><th>Your University:</th><td><?php echo  $edumodel->university;  ?></td></tr>
<tr><th>Your College Name:</th><td><?php echo  $edumodel->collegename;  ?></td></tr>
<tr><th>Passing Year:</th><td><?php echo  $edumodel->passingyear;  ?></td></tr>

</table>
</div>
<div class="box">
<h2>Employer Company Profile</h2>
<table >           
      
            <tr>
               <th>Company name:</th>
                 <td><?php echo $jobmodel->company_name; ?></td>
            </tr>
            <tr>
                <th>Company type:</th>
                <td><?php echo $jobmodel->company_type; ?></td>
            </tr>
              
            <tr>
                <th>Industry type:</th>
                <td><?php echo $jobmodel->industry_type; ?></td>
            </tr>
            <tr>
                <th>Dateofestablishment:</th>
                <td><?php echo $jobmodel->dateofestablishment; ?></td>
            </tr>
            <tr>
               <th>Location:</th>
               <td><?php echo $jobmodel->location; ?></td>
            </tr>
            <tr>
                <th>Country:</th>
                <td><?php echo $jobmodel->country; ?></td>
            </tr>
            <tr>
               <th>State:</th>
                <td><?php echo $jobmodel->state; ?></td>
            </tr>
            <tr>
                <th>City:</th>
               <td><?php echo $jobmodel->city; ?></td>
            </tr>
            <tr>
                <th>Zipcode:</th>
               <td><?php echo $jobmodel->zipcode; ?></td>
            </tr>
            
          
            
        </table>
 
 </div>
 <div class="box">
  <h2>EmployerPreferencess</h2>
 <table id="vertical-1">
<tr><th>Expected salary:</th><td><?php echo  $preferencesmodel->expected_salary ;?></td></tr>
<tr><th>Job location:</th><td><?php echo  $preferencesmodel->job_location;  ?></td></tr>
<tr><th>Job role:</th><td><?php echo  $preferencesmodel->job_role;  ?></td></tr>

</table>
</div>
<div class="box">
  <h2>Employer Skills</h2>
 <table id="vertical-1">
<tr><th>Requirment:</th><td><?php echo  $skillsmodel->requirment ;?></td></tr>
<tr><th>Companytype:</th><td><?php echo  $skillsmodel->companytype;  ?></td></tr>
<tr><th>Jobtype:</th><td><?php echo  $skillsmodel->jobtype;  ?></td></tr>

</table>
</div>
<div class="box">
  <h1>Employer employment</h1>
 <table id="vertical-1">
<tr><th>Job title:</th><td><?php echo  $employmentmodel->job_title ;?></td></tr>
<tr><th>Job type:</th><td><?php echo  $employmentmodel->job_type;  ?></td></tr>
<tr><th>Job description:</th><td><?php echo  $employmentmodel->job_description;  ?></td></tr>
<tr><th>Experience:</th><td><?php echo  $employmentmodel->experience ;?></td></tr>
<tr><th>No of openings:</th><td><?php echo  $employmentmodel->no_of_openings;  ?></td></tr>
<tr><th>Work location:</th><td><?php echo  $employmentmodel->work_location;  ?></td></tr>
<tr><th>Shift timings:</th><td><?php echo  $employmentmodel->shift_timings ;?></td></tr>
<tr><th>Weekly days:</th><td><?php echo  $employmentmodel->weekly_days;  ?></td></tr>
<tr><th>Salary:</th><td><?php echo  $employmentmodel->salary;  ?></td></tr>

</table>
</div>
 
 

<div class="form-group" >
       <?= Html::a('update', ['/employercompany/empcommon/employer'], ['class'=>'btn btn-primary']) ?>
    </div>	

</body></html>


