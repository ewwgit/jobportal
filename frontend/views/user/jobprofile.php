<?php 

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


?>



<html>
<body>
<h1>Your Job Preferences Details</h1>

<table>
<tr><td>FunctionalArea:</td><td><?php echo  $jobmodel->functionalarea ;?></td></tr>
<tr><td>JobRole:</td><td><?php echo  $jobmodel->jobrole;  ?></td></tr>
<tr><td>PreferdLocation:</td><td><?php echo  $jobmodel->joblocation;  ?></td></tr>
<tr><td>Your Selected Expeience:</td><td><?php echo  $jobmodel->experience;  ?></td></tr>
<tr><td>JobType:</td><td><?php echo  $jobmodel->jobtype;  ?></td></tr>
<tr><td>Your Expected Salary:</td><td><?php echo  $jobmodel->expectedsalary;  ?></td></tr>





</table>



<div class="col-md-6">
<a href="<?= Url::to(['user/preferupdate'])?>"><i class="fa fa-edit"></i> <?= Html::submitButton(  'Update', [ 'btn btn-success' , 'btn btn-primary'])?></a>
</div>
</body>






</html>

