<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use frontend\models\EmployeeJobapplied;
use frontend\models\JobSkills;
use frontend\models\JobLocations;

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

$joblocations = JobLocations::find()->select('location')->asArray()->where(['jobid' => $model->id])->all();

$locations1 = '';
if(!empty($joblocations) )
{
	foreach ($joblocations as $locationnew)
	{
		$locations1 .= $locationnew['location'].', ';
	}
}
?>
<?php $jobUrl =  Url::to([str_replace(" ","-",$model->designation).'-'.str_replace(" ","-",$model->rolecategory).'-'.str_replace(" ","-",$model->company_name).str_replace(" ","-",$locations).'-'.str_replace(" ","-",$model->Min_Experience).'-to-'.str_replace(" ","-",$model->Max_Experience).'-years'.'/employees-job-details-'.$model->id]);?>
 <li>
                <div class="job-spotlight"> <a href="#">
                 <h4> <a
		href="<?= $jobUrl; ?>"> <?php echo isset( $model->designation) ? $model['designation']:'';?> </a> <span class="full-time"><?php echo isset( $model->jobtype) ? $model['jobtype']:'';?></span></h4>
                  </a> <span><i class="fa fa-briefcase"></i>  <?php echo isset( $model->company_name) ? $model['company_name']:'';?></span>
                  <div><span><i class="fa fa-map-marker"></i><?php  echo $locations1;?> </span></div> <span><i class="fa fa-money"></i>
                  <?php echo  isset( $model -> currency) ? $model -> currency : '';  ?>
							<?php echo  isset( $model -> min_salary) ? $model -> min_salary : '';  ?> - 
							<?php echo  isset( $model -> CTC) ? $model -> CTC : '';  ?> 
							<?php echo  isset( $model -> sal_type) ? $model -> sal_type : '';  ?> </span>
                  <p><?php echo BaseStringHelper::truncate($model->Description, 116,'')?></p>
                  <a href="<?= $jobUrl; ?>" class="button">Apply For This Job</a> </div>
              </li>