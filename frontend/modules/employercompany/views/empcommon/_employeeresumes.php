<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use frontend\models\EmployeeSkills;
use frontend\models\EmployeeEmployer;
//print_r($model->useremployee->designation);exit();
$skillsInfo = EmployeeSkills::find()->where(['userid' => $model->userid])->all();
$designationInfo = EmployeeEmployer::find()->where(['userid' => $model->userid])->one();
?>

<li><a href="resume-page.html">
				<img src="<?= $model->usersignup->profileimage;?>" alt="">
				<div class="resumes-list-content">
					<h4><?= $model->usersignup->name. ' '.$model->usersignup->surname;?> <span>
					<?php if (isset($designationInfo->designation)){?>
					<?= $designationInfo->designation;?>
					<?php }else{?>
					Not Mentioned
					<?php }?>
</span></h4>
					<span><i class="fa fa-map-marker"></i> Melbourne</span>
					<span><i class="fa fa-money"></i> $100 / hour</span>
					<p>Over 8000 hours on oDesk (only Drupal related). Highly motivated, goal-oriented, hands-on senior software engineer with extensive technical skills and over 15 years of experience in software development</p>

					<div class="skills">
					<?php foreach($skillsInfo as $skill){?>
						<span><?= $skill->skillname;?></span>
						<?php } ?>
						
					</div>
					<div class="clearfix"></div>

				</div>
				</a>
				<div class="clearfix"></div>
			</li>