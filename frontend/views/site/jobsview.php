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







          <div class="highlighted newlicls"> 
          <img src="<?php
							if($model->imagenew){
													
							echo isset( $model->imagenew)? Url::base().$model->imagenew : '' ;
							}else {
									  echo Url::base()."/frontend/web/images/user-iconnew.png" ;
								      }
								?>" alt="">
            <div class="job-list-content">
              <h4> <a
		href="<?= Url::to([$model->designation.'-'.$model->rolecategory.'-'.$model->company_name.$locations.'-'.$model->Min_Experience.'-to-'.$model->Max_Experience.'-years'.'/employees-job-details-'.$model->id])?>"> <?php echo isset( $model->designation) ? $model['designation']:'';?> </a> <span class="full-time">Full-Time</span></h4>
		     <div class="job-icons"> Keyskills: <span><?php echo $skills;?> </span></div>
              <div class="job-icons"> <span><i class="fa fa-briefcase"></i> <?php echo isset( $model->company_name) ? $model['company_name']:'';?> </span> <span><i class="fa fa-map-marker"></i>    <?= $model['Min_Experience'];?>  </span> 
              <span><i class="fa fa-money"></i> <?php echo isset( $model->createdDate) ? date('Y-m-d',strtotime( $model['createdDate'])):''?>  </span>
              <?php
	$userId = Yii::$app->emplyoee->emplyoeeid;
	$memberJoin = EmployeeJobapplied::getUsersjoined ( $model->id, $userId );
	?>
	<?php if($memberJoin ==0){?>
	
	<button class="btn btn-primary apply_job" style ="float: right;" id="needtoapply<?=  $model->id; ?>" apljobid="<?php echo $model->id;?>">Apply this Job</button>
	
	
	<?php
	}
	else {
		?>
	
	<button class="btn btn-primary applied" style ="float: right;">Applied</button>
	
	<?php }?>
	</div>
            
            </div>
          
            				
            
          
          </div>
              
	
				
			

	
	
