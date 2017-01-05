<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use frontend\models\EmployeeJobapplied;
?>






<ul class="job-list">
          <li class="highlighted"> 
            <div class="job-list-content">
              <h4> <a
		href="<?= Url::to(['/site/jobdetails','id'=>$model->id])?>"><?= $model['rolecategory'];?> <span class="full-time">Full-Time</span></h4>
		     <div class="job-icons"> Keyskills: <span><?= $model['skills'];?></span></div>
              <div class="job-icons"> <span><i class="fa fa-briefcase"></i><?= $model['company_name'];?></span> <span><i class="fa fa-map-marker"></i><?= $model['Min_Experience'];?></span> 
              <span><i class="fa fa-money"></i><?= date('Y-m-d',strtotime( $model['createdDate']))?></span>
              <?php
	$userId = Yii::$app->emplyoee->emplyoeeid;
	$memberJoin = EmployeeJobapplied::getUsersjoined ( $model->id, $userId );
	?>
	<?php if($memberJoin ==0){?>
	<td class="centered">
	<button class="btn btn-primary apply_job" id="needtoapply<?=  $model->id; ?>" apljobid="<?php echo $model->id;?>">Apply this Job</button>
	
	</td>
	<?php
	}
	else {
		?>
	<td class="centered">
	<button class="btn btn-primary applied">Applied</button>
	</td>
	<?php }?>
	</div>
            
            </div>
            </a>
            				
            
          
          </li>
              
	
				
			</ul>

	
	
