<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use frontend\models\EmployeeJobapplied;
?>







          <div class="highlighted newlicls"> 
          <img src="<?php echo Yii::getAlias('@web');?>/frontend/web/images/all-categories-photo.jpg" alt="">
            <div class="job-list-content">
              <h4> <a
		href="<?= Url::to(['/site/jobdetails','id'=>$model->id])?>"> <?= $model['rolecategory'];?> </a> <span class="full-time">Full-Time</span></h4>
		     <div class="job-icons"> Keyskills: <span> <?= $model['skills'];?> </span></div>
              <div class="job-icons"> <span><i class="fa fa-briefcase"></i> <?= $model['company_name'];?> </span> <span><i class="fa fa-map-marker"></i>    <?= $model['Min_Experience'];?>  </span> 
              <span><i class="fa fa-money"></i>  <?= date('Y-m-d',strtotime( $model['createdDate']))?>  </span>
              <?php
	$userId = Yii::$app->emplyoee->emplyoeeid;
	$memberJoin = EmployeeJobapplied::getUsersjoined ( $model->id, $userId );
	?>
	<?php if($memberJoin ==0){?>
	
	<button class="btn btn-primary apply_job" style ="margin-left : 260px;" id="needtoapply<?=  $model->id; ?>" apljobid="<?php echo $model->id;?>">Apply this Job</button>
	
	
	<?php
	}
	else {
		?>
	
	<button class="btn btn-primary applied" style ="margin-left : 260px;">Applied</button>
	
	<?php }?>
	</div>
            
            </div>
          
            				
            
          
          </div>
              
	
				
			

	
	
