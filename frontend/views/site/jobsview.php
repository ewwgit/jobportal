<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use frontend\models\EmployeeJobapplied;
?>

<tr>
	<td class="title"><?= $model['designation'];?></td>
	<td class="title"><?= $model['skills'];?></td>	
	<td class="title"><?= $model['Min_Experience'];?></td>	
	<td class="centered">-</td>
	<td class="title"><?= $model['startDate'];?></td>
	<?php $userId = \Yii::$app->user->id;
				      $memberJoin = EmployeeJobapplied::getUsersjoined($model->id,$userId);?>
				      <?php if($memberJoin ==0){?>
				     <td class="centered">
				      
							      <?= Html::a(' Apply this Job', ['apply','id'=>$model->id], [
											          'data' => [
											            'confirm' => 'Are you sure you want to apply this job? then login?',
											            'method' => 'post',
											          		
											          ],
											 ])?>
							 </td>	
							 <?php }
							 else {
							 ?>	
							   <td class="centered"> Applied</td>
							 <?php }?>
</tr>	
	