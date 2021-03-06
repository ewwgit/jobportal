<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use frontend\models\EmployeeSkills;
use frontend\models\EmployeeEmployer;
use frontend\models\EmployeeSignup;


$skillsInfo = EmployeeSkills::find()->where(['userid' => $userdata->id])->all();


//$skillsInfo = EmployeeSkills::find()->where(['userid' => $model->userid])->all();
//print_r($skillsInfo);exit;
?>
<div id="titlebar" class="resume">
	<div class="container">
		<div class="ten columns">
			<div class="resume-titlebar">
				<img src="/jobportal/<?php echo isset( $userdata->usersignup->profileimage)? $userdata->usersignup->profileimage : 'Not Mentioned' ;  ?>">
				<div class="resumes-list-content">
					<h4><?= $userdata->username?> <span>
					
</span></h4>
					<span class="icons"><i class="fa fa-map-marker"></i> <?php echo isset( $userdata->usersignup->state)? $userdata->usersignup->state : '' ;  ?>, <?php echo isset( $userdata->usersignup->city)? $userdata->usersignup->city : '' ;  ?></span>
					 <span class="icons"><i class="fa fa-money"></i> <?php echo ( $userdata->useremployeepreference->experience) ?  $userdata->useremployeepreference->experience : ''; ?> Years</span> 
					<span class="icons"><a href="#"><i class="fa fa-link"></i>Website</a></span>
					
					<span class="icons"><a href="">
					<i class="fa fa-envelope"></i> <?php echo isset( $userdata->email)? $userdata->email : 'Not Mentioned' ;  ?>
					</a>
					
					
					<div class="skills">
					<?php foreach($skillsInfo as $skill){?>
						<span><?= $skill->skillname;?></span>
						<?php } ?>
						
						
					</div>
					<div class="clearfix"></div>

				</div>
			</div>
		</div>

		<div class="six columns">
			<div class="two-buttons">

				<!-- <a href="#small-dialog" class="popup-with-zoom-anim button"><i class="fa fa-envelope"></i> Send Message</a> -->

				<div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
					<div class="small-dialog-headline">
						<!-- <h2>Send Message to John Doe</h2> -->
					</div>

					<div class="small-dialog-content">
						<form action="#" method="get" >
							<input type="text" placeholder="Full Name" value=""/>
							<input type="text" placeholder="Email Address" value=""/>
							<textarea placeholder="Message"></textarea>

							<button class="send">Send Application</button>
						</form>
					</div>
					
				</div>
				<!-- <a href="#" class="button dark"><i class="fa fa-star"></i> Bookmark This Resume</a> -->


			</div>
		</div>

	</div>
</div>
<div class="container">
	<!-- Recent Jobs -->
	<div class="eight columns">
	<div class="padding-right">

		<h3 class="margin-bottom-15">About Me</h3>

		<p class="margin-reset">
	 Description</p>

		<br>

		<p><?php echo  ($userdata->usersignup->description) ? $userdata->usersignup->description : '' ;?></p>

		

	</div>
	</div>


	<!-- Widgets -->
	<div class="eight columns">

		<h3 class="margin-bottom-20">Education</h3>

		<!-- Resume Table -->
		<dl class="resume-table">
			<dt>
				<small class="date"><?php echo ( $userdata->education->passingyear) ?  $userdata->education->passingyear : '' ?></small>
				<strong> <?= $userdata->education->highdegree?></br><?php echo ($userdata->education->collegename) ? $userdata->education->collegename : ''?></strong>
			</dt>
			<!-- <dd>
				<p>Captain, why are we out here chasing comets? Maybe we better talk out here; the observation lounge has turned into a swamp. Ensign Babyface!</p>
			</dd>

		
			<dt>
				<small class="date">2006 - 2010</small>
				<strong></strong>
			</dt>
			<dd>
				<p>Captain, why are we out here chasing comets? Maybe we better talk out here; the observation lounge has turned into a swamp. Ensign Babyface!</p>
			</dd>


			<dt>
				<small class="date">2004 - 2006</small>
				<strong>Test 2 at Test</strong>
			</dt>
			<dd>
				<p>Phasellus vestibulum metus orci, ut facilisis dolor interdum eget. Pellentesque magna sem, hendrerit nec elit sit amet, ornare efficitur est.</p>
			</dd> -->

		</dl>

	</div>

</div>