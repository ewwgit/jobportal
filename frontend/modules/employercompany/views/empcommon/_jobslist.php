<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use frontend\models\EmployeeJobapplied;

$applied_data = EmployeeJobapplied::find()->where(['userid' => $model->userid])->one();


//$userid = Yii::$app->employer->employerid;

$query = EmployeeJobapplied::find()->where("jobid = $model->id AND 	application_status != 'Deleted'")->count();
		 $total_list=$query;
	
		
?>


<tr>
	<td class="title"><?= $model['designation'];?></td>
	<td class="title"></td>	
	<td class="title"><?= $model['Min_Experience'];?></td>	
	<td class="centered"><a
		href="<?= Yii::$app->urlManager->createUrl ( ['employers-job-applied-employees-'.$model->id.'-All'] );?>"> Employees</a><b style= "color:#ec971f;"><?php echo '(' . $total_list .')' ?></b></td>
		
	<td class="title"><?= date('Y-m-d',strtotime( $model['createdDate']))?></td>	
	
	<td class="centered"><a
		href="<?= Url::to(['/employercompany/empcommon/jobpostingsview','id'=>$model->id])?>"
		class="button">view</a></td>
	<td class="action"><a
		href="<?= Url::to(['/employercompany/empcommon/update','id'=>$model->id])?>"><i
			class="fa fa-pencil"></i> Edit</a>  <a
		href="<?= Url::to(['/employercompany/empcommon/delete','id'=>$model->id])?>"
		class="delete"><i class="fa fa-trash"></i> Delete</a></td>
</tr>

<style>
.pagination {
       margin-left: 760px;
  }
</style>