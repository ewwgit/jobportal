
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
<div class="col-md-6">
<a href="<?= Url::to(['user/update'])?>"><i class="fa fa-edit"></i> <?= Html::submitButton(  'Update', [ 'btn btn-success' , 'btn btn-primary'])?></a>
</div>
</body>






</html>
