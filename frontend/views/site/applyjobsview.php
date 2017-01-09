<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use frontend\models\EmployeeJobapplied;
use frontend\models\EmployerJobpostings;


$applied_data = EmployeeJobapplied::find()->where(['userid' => $model->userid])->one();
$jobmaster_data = EmployerJobpostings::find()->where(['id' => $model->jobid])->one();


?>

<tr>
	<td class="title"><?php echo isset( $jobmaster_data['skills']) ? $jobmaster_data['skills'] : '' ;?></td>
	<td class="title"><?php echo isset( $jobmaster_data['designation']) ?  $jobmaster_data['designation'] : '' ;?></td>	
	<td class="title"><?php echo isset( $jobmaster_data['company_name']) ? $jobmaster_data['company_name'] : '' ;?></td>	
	
	<td class="title"><?php echo isset( $applied_data['appliedDate']) ? $applied_data['appliedDate'] : '' ;?></td>
	</tr>
