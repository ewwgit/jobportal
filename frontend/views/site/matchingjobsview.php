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
	<td class="title"><?= $model['city'];?></td>
	<?php
	$userId = \Yii::$app->user->id;
	$memberJoin = EmployeeJobapplied::getUsersjoined ( $model->id, $userId );
	?>
	<?php if($memberJoin ==0){?>
	<td class="centered">
	<button class="btn btn-primary apply_job" apljobid="<?php echo $model->id;?>">Apply this Job</button>
	</td>
	<?php
	}
	else {
		?>
	<td class="centered">
	<button class="btn btn-primary applied">Applied</button>
	</td>
	<?php }?>
</tr>	
	