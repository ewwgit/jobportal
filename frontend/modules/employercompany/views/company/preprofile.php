<?php 


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>



<html>
<body>
<h1>Set Preferences</h1>

<table>
<tr><td>Expected Salary:</td><td><?php echo  $empmodel->expected_salary ;?></td></tr>
<tr><td>Job Role:</td><td><?php echo  $empmodel->job_role;  ?></td></tr>
<tr><td>Job Location:</td><td><?php echo  $empmodel->job_location;  ?></td></tr>

</table>



<div class="col-md-6">
<a href="<?= Url::to(['user/preupdate'])?>"><i class="fa fa-edit"></i> <?= Html::submitButton(  'Update', [ 'btn btn-success' , 'btn btn-primary'])?></a>
</div>
</body>






</html>
