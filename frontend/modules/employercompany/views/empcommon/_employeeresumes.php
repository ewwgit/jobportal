<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use frontend\models\EmployeeSkills;
//print_r($model->usersignup->profileimage);exit();
$skillsInfo = EmployeeSkills::find()->where(['userid' => $model->userid])->all();
?>

<li><a href="resume-page.html">
				<img src="<?= $model->usersignup->profileimage;?>" alt="">
				<div class="resumes-list-content">
					<h4><?= $model->usersignup->name. ' '.$model->usersignup->surname;?> <span>UX/UI Graphic Designer</span></h4>
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