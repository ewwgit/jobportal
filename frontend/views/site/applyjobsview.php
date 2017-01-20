<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use frontend\models\EmployeeJobapplied;
use frontend\models\EmployerJobpostings;
use frontend\models\JobSkills;

$applied_data = EmployeeJobapplied::find()->where(['jobid' => $model->jobid])->one();

$jobmaster_data = EmployerJobpostings::find()->where(['id' => $model->jobid ])->one();



$jobskills = JobSkills::find()->select('skill_name')->asArray()->where(['jobid' => $model->jobid])->all();
$skills = '';
if(!empty($jobskills) )
{
	foreach ($jobskills as $skill)
	{
		$skills .= $skill['skill_name'].', ';
	}
}


?>

<tr>
	<td class="title"><?php echo $skills;?></td>
	<td class="title"><?php echo isset( $jobmaster_data['designation']) ?  $jobmaster_data['designation'] : '' ;?></td>	
	<td class="title"><?php echo isset( $jobmaster_data['company_name']) ? $jobmaster_data['company_name'] : '' ;?></td>	
	
	<td class="title"><?php echo isset( $applied_data['appliedDate']) ? $applied_data['appliedDate'] : '' ;?></td>
	</tr>
