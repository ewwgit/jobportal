<?php 

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


?>
<html>
<body>


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
<h1>Education Details</h1>

<table>

<tr><td>Highest Degree</td><td><?php echo  $edumodel->highdegree ;?></td></tr>
<tr><td>Highest Degree Specialization:</td><td><?php echo  $edumodel->specialization;  ?></td></tr>
<tr><td>Your University:</td><td><?php echo  $edumodel->university;  ?></td></tr>
<tr><td>Your College Name:</td><td><?php echo  $edumodel->collegename;  ?></td></tr>
<tr><td>Passing Year:</td><td><?php echo  $edumodel->passingyear;  ?></td></tr>




</table>



<h1>Your Job Preferences Details</h1>

<table>
<tr><td>FunctionalArea:</td><td><?php echo  $jobmodel->functionalarea ;?></td></tr>
<tr><td>JobRole:</td><td><?php echo  $jobmodel->jobrole;  ?></td></tr>
<tr><td>PreferdLocation:</td><td><?php echo  $jobmodel->joblocation;  ?></td></tr>
<tr><td>Your Selected Expeience:</td><td><?php echo  $jobmodel->experience;  ?></td></tr>
<tr><td>JobType:</td><td><?php echo  $jobmodel->jobtype;  ?></td></tr>
<tr><td>Your Expected Salary:</td><td><?php echo  $jobmodel->expectedsalary;  ?></td></tr>



</table>


<h1>Your Job Skills Details</h1>

<table>



<tr><td>Your SkillName:</td><td><?php echo  $skillmodel->skillname ;?></td></tr>
<tr><td>Lastused:</td><td><?php echo  $skillmodel->lastused;  ?></td></tr>
<tr><td>Experience on Skills:</td><td><?php echo  $skillmodel->experience;  ?></td></tr>










</table>
















</body></html>