<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use frontend\models\EmployeeJobapplied;
use frontend\models\JobSkills;

//print_r($model);exit();
$locations = str_replace(",","-",$model->job_location);
$jobskills = JobSkills::find()->select('skill_name')->asArray()->where(['jobid' => $model->id])->all();
$skills = '';
if(!empty($jobskills) )
{
	foreach ($jobskills as $skill)
	{
		$skills .= $skill['skill_name'].', ';
	}
}
?>

 <li>
                <div class="job-spotlight"> <a href="#">
                 <h4> <a
		href="<?= Url::to([$model->designation.'-'.$model->rolecategory.'-'.$model->company_name.$locations.'-'.$model->Min_Experience.'-to-'.$model->Max_Experience.'-years'.'/employees-job-details-'.$model->id])?>"> <?php echo isset( $model->designation) ? $model['designation']:'';?> </a> <span class="full-time"><?php echo isset( $model->jobtype) ? $model['jobtype']:'';?></span></h4>
                  </a> <span><i class="fa fa-briefcase"></i>  <?php echo isset( $model->company_name) ? $model['company_name']:'';?></span> <span><i class="fa fa-map-marker"></i> New York</span> <span><i class="fa fa-money"></i> $20 / hour</span>
                  <p><?php echo BaseStringHelper::truncate($model->Description, 116,'')?></p>
                  <a href="<?= Url::to([$model->designation.'-'.$model->rolecategory.'-'.$model->company_name.$locations.'-'.$model->Min_Experience.'-to-'.$model->Max_Experience.'-years'.'/employees-job-details-'.$model->id])?>" class="button">Apply For This Job</a> </div>
              </li>