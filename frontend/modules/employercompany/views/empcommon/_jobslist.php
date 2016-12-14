<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
?>

<tr>
	<td class="title"><?= $model['designation'];?></td>
	<td class="title"><?= $model['skills'];?></td>	
	<td class="title"><?= $model['Min_Experience'];?></td>	
	<td class="centered">-</td>
	<td class="title"><?= $model['startDate'];?></td>	
	
	<td class="centered"><a
		href="<?= Url::to(['/employercompany/empcommon/jobpostingsview','id'=>$model->id])?>"
		class="button">view</a></td>
	<td class="action"><a
		href="<?= Url::to(['/employercompany/empcommon/update','id'=>$model->id])?>"><i
			class="fa fa-pencil"></i> Edit</a> <a href="#"><i
			class="fa  fa-check "></i> Mark Filled</a> <a
		href="<?= Url::to(['/employercompany/empcommon/delete','id'=>$model->id])?>"
		class="delete"><i class="fa fa-trash"></i> Delete</a></td>
</tr>
