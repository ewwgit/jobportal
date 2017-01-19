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






          <div class="highlighted newlicls"> 
          <a
		href="<?= $jobUrl;?>"><img src="<?php
							if($model->imagenew){
													
							echo isset( $model->imagenew)? Url::base().$model->imagenew : '' ;
							}else {
									  echo Url::base()."/frontend/web/images/user-iconnew.png" ;
								      }
								?>" alt="">
								</a>
            <div class="job-list-content">
              <h4> <a
		href="<?= $jobUrl;?>"> <?php echo isset( $model->designation) ? $model['designation']:'';?> </a> <span class="full-time">
<?= $model->jobtype; ?></span></h4>
		 <div class="job-icons"> <span><i class="fa fa-briefcase"></i> <?php echo isset( $model->company_name) ? $model['company_name']:'';?> </span></div>
		     <div class="job-icons"> Keyskills: <span><?php echo $skills;?> </span></div>
		     <div class="job-icons"> RoleCategory: <span><?php echo isset($model -> rolecategory) ? $model -> rolecategory : '' ;  ?> </span></div>
		      <div class="job-icons"> Experience: <span><?php  echo isset($model -> Min_Experience) ? $model -> Min_Experience : ''?> - 
    <?php echo $model -> Max_Experience?> Years </span></div>
    
    <div class="job-icons"> Salary: <span><?php echo  isset( $model -> currency) ? $model -> currency : '';  ?>
							<?php echo  isset( $model -> min_salary) ? $model -> min_salary : '';  ?> - 
							<?php echo  isset( $model -> CTC) ? $model -> CTC : '';  ?> 
							<?php echo  isset( $model -> sal_type) ? $model -> sal_type : '';  ?></span></div>
              <div class="job-icons">  <span><i class="fa fa-map-marker"></i>    <?php echo $locations1 ?>  </span> 
              <span><i class="fa fa-money"></i> <?php echo isset( $model->createdDate) ? date('Y-m-d',strtotime( $model['createdDate'])):''?>  </span>
              <?php
	$userId = Yii::$app->emplyoee->emplyoeeid;
	$memberJoin = EmployeeJobapplied::getUsersjoined ( $model->id, $userId );
	?>
	<?php if($memberJoin ==0){?>
	
	<a href="<?= $jobUrl;?>" class="btn btn-primary apply_jobnew" style ="float:right;" id="needtoapply<?=  $model->id; ?>" apljobid="<?php echo $model->id;?>">Apply this Job</a>
	
	
	<?php
	}
	else {
		?>
	
	<a href="<?= $jobUrl;?>" class="btn btn-primary appliednew" style ="float:right;">Applied</a>
	
	<?php }?>
	</div>
            
            </div>
          
            				
            
          
          </div>
              
	
				
			

	
	
