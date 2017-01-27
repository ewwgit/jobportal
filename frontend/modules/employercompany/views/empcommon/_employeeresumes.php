<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use frontend\models\EmployeeSkills;
use frontend\models\EmployeeEmployer;
use frontend\models\EmployeePreferences;
use frontend\models\EmployeeSignup;

//print_r($model->useremployee->designation);exit();
$skillsInfo = EmployeeSkills::find()->where(['userid' => $model->userid])->all();
$designationInfo = EmployeeEmployer::find()->where(['userid' => $model->userid])->one();
$locInfo = EmployeePreferences::find()->where(['userid' => $model->userid])->one();
$descInfo = EmployeeSignup::find()->where(['userid' => $model->userid])->one();




?>

<div class="employeenewlicls">
				<a
		href="<?= Url::to(['/employercompany/empcommon/resumepage','id'=>$model->userid])?>">
				<img src="<?php
							if($model->usersignup->profileimage){
								echo isset( $model->usersignup->profileimage)? Url::base().$model->usersignup->profileimage : '' ;
							
							}else {
									 echo Url::base()."/frontend/web/images/user-iconnew.png" ;
								      }
								?>"" alt=""></a>
				<div class="resumes-list-content">
					<a href="<?= Url::to(['/employercompany/empcommon/resumepage','id'=>$model->userid])?>"><h4><?php echo isset($model->usersignup->name) ? $model->usersignup->name:''?> <?php echo isset($model->usersignup->surname) ? $model->usersignup->surname : '' ;?> <span>
					<?php if (isset($designationInfo->designation)){?>
					<?= $designationInfo->designation;?>
					<?php }else{?>
					Not Mentioned
					<?php }?>
                  </span></h4></a>
					<span><i class="fa fa-map-marker"></i> <?php  echo $locInfo -> joblocation;?></span>
					<span><i class="fa fa-money"></i> <?php  echo $locInfo -> experience;?> Years</span>
					<p><?php  echo $descInfo -> description;?></p>

					<div class="skills">
					<?php foreach($skillsInfo as $skill){?>
						<a href="<?= Url::to(['/employers-browse-resume?EmployeeJobsearch%5Bskills%5D%5B%5D='.$skill->skillname ])?>"><span><?php echo ( $skill->skillname) ? $skill->skillname:'' ;?></span></a>
						<?php } ?>
						
					</div>
					<div class="clearfix"></div>

				</div>
				</a>
				<div class="clearfix"></div>
			</div>