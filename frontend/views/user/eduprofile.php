
<?php 


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>



<html>
<body>
<h1>Education Details</h1>

<table>
<tr><td>Highest Degree</td><td><?php echo  $edumodel->highdegree ;?></td></tr>
<tr><td>Highest Degree Specialization:</td><td><?php echo  $edumodel->specialization;  ?></td></tr>
<tr><td>Your University:</td><td><?php echo  $edumodel->university;  ?></td></tr>
<tr><td>Your College Name:</td><td><?php echo  $edumodel->collegename;  ?></td></tr>
<tr><td>Passing Year:</td><td><?php echo  $edumodel->passingyear;  ?></td></tr>




</table>



<div class="col-md-6">
<a href="<?= Url::to(['user/eduupdate'])?>"><i class="fa fa-edit"></i> <?= Html::submitButton(  'Update', [ 'btn btn-success' , 'btn btn-primary'])?></a>
</div>
</body>






</html>
