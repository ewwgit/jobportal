<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'EmployerProfile';
$this->params ['breadcrumbs'] [] = [ 
		'label' => 'Signup',
		'url' => [ 
				'index' 
		] 
];
$this->params ['breadcrumbs'] [] = $this->title;
?>
<style>
.table > thead > tr > th, 
.table > tbody > tr > th, 
.table > tfoot > tr > th, 
.table > thead > tr > td, 
.table > tbody > tr > td, 
.table > tfoot > tr > td
{
	border: none;
	/* width: 100%; */
}
</style>
  <!-- Titlebar
================================================== -->
  <div class="col-md-3 right_side_buttons" style="float: right; margin-top: -158px;">
       <div class="row">
		<a href="<?= Url::to(['/employercompany/empcommon/employer'])?>">
		<i title="Edit your profile"class="fa fa-edit" style="font-size: 18px; margin-top: 25px;">
		</i> Edit Employer Profile</a>
			
		</ul>
	</div>
	</div>
  
  <!-- Content
================================================== -->
<div class="container">

	<!-- Submit Page -->
	<div class="sixteen columns">
		<div class="submit-page" style="padding: 0px;">
			<div class="container">
				<div class="col-md-3 col-sm-3 col-xs-3 profile_img">
					<div class="resume-titlebar">
						<img
							src="<?php echo isset( $employemodel->profileimage)? Yii::getAlias('/jobportal').$employemodel->profileimage : '' ;  ?>"
							alt="">
					</div>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>EmployerPersonal Profile</h4>
								</div>
								<table class="table table-user-information ">
									<tbody>
										<tr>
											<td>Username:</td>
											<td><?php echo isset($model->username) ? $model->username : ' Not Mentioned' ;?></td>
										</tr>
										<tr>
											<td>Your Email:</td>
											<td><a href="#" style="color: #000;"><?php echo isset($model->email) ? $model->email : ' Not Mentioned' ;?></a></td>
										</tr>

										<tr>
											<td>Your Name:</td>
											<td><?php echo isset($employemodel->name) ? $employemodel->name : ' Not Mentioned' ;?></td>
										</tr>
										<tr>
											<td>Your designation:</td>
											<td><?php echo isset($employemodel->designation) ? $employemodel->designation : ' Not Mentioned' ;?></td>
										</tr>

										<tr>
											<td>Gender:</td>
											<td><?php echo isset($employemodel->gender) ? $employemodel->gender : ' Not Mentioned' ;?></td>
										</tr>
										<tr>
											<td>Mobile Number:</td>
											<td><?php echo isset($employemodel->mobilenumber) ? $employemodel->mobilenumber : ' Not Mentioned' ;?></td>
										</tr>
										<tr>
											<td>Dateof Birth:</td>
											<td><?php echo isset($employemodel->dateofbirth) ? $employemodel->dateofbirth : ' Not Mentioned' ;?></td>
										</tr>
										<tr>
											<td>address:</td>
											<td><?php echo isset($employemodel->address) ? $employemodel->address : ' Not Mentioned' ;?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Employer Education:</h4>
								</div>
								<table class="table table-user-information ">
									<tbody>
										<tr>
											<td>Highest Degree:</td>
											<td><?php echo isset($edumodel->higherdegree) ? $edumodel->higherdegree : ' Not Mentioned' ;?></td>
										</tr>
										<tr>
											<td>Specialization:</td>
											<td><?php echo isset($edumodel->specialization) ? $edumodel->specialization : 'Not Mentioned ';?></td>
										</tr>
										<tr>
											<td>Your University:</td>
											<td><?php echo isset($edumodel->university) ? $edumodel->university : 'Not Mentioned ';?></td>
										</tr>
										<tr>
											<td>Your College Name:</td>
											<td><?php echo isset($edumodel->collegename) ? $edumodel->collegename : 'Not Mentioned ';?></td>
										</tr>
										<tr>
											<td>Passing Year:</td>
											<td><?php echo isset($edumodel->passingyear) ? $edumodel->passingyear : 'Not Mentioned ';?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
								<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Employer employment</h4>
								</div>
								<table class="table table-user-information ">
									<tbody>
									<tr>
											<td>Job title:</td>
											<td><?php echo isset($employmentmodel->company_name) ? $employmentmodel->company_name  : 'Not Mentioned';?></td>
										</tr>
										<tr>
											<td>Job title:</td>
											<td><?php echo isset($employmentmodel->job_title) ? $employmentmodel->job_title  : 'Not Mentioned';?></td>
										</tr>
										<tr>
											<td>Job type:</td>
											<td><?php echo isset($employmentmodel->job_type) ? $employmentmodel->job_type  : 'Not Mentioned';?></td>
										</tr>
										<tr>
											<td>Job description:</td>
											<td><?php echo isset($employmentmodel->job_description) ? $employmentmodel->job_description  : 'Not Mentioned';?></td>
										</tr>
										<tr>
											<td>Experience:</td>
											<td><?php echo isset($employmentmodel->experience) ? $employmentmodel->experience  : 'Not Mentioned';?></td>
										</tr>
										
										<tr>
											<td>Work location:</td>
											<td><?php echo isset($employmentmodel->work_location) ? $employmentmodel->work_location  : 'Not Mentioned';?></td>
										</tr>
										<tr>
											<td>Shift timings:</td>
											<td><?php echo isset($employmentmodel->shift_timings) ? $employmentmodel->shift_timings  : 'Not Mentioned';?></td>
										</tr>
										<tr>
											<td>Weekly days:</td>
											<td><?php echo isset($employmentmodel->weekly_days) ? $employmentmodel->weekly_days  : 'Not Mentioned';?></td>
										</tr>
										<tr>
											<td>Salary:</td>
											<td><?php echo isset($employmentmodel->salary) ? $employmentmodel->salary  : 'Not Mentioned';?></td>
										</tr>

									</tbody>
								</table>
							</div>
						</div>
					
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>EmployerPreferencess</h4>
								</div>
								<table class="table table-user-information ">
									<tbody>
										<tr>
											<td>Expected salary:</td>
											<td><?php echo isset($preferencesmodel->expected_salary) ? $preferencesmodel->expected_salary : 'Not Mentioned';?></td>
										</tr>
										<tr>
											<td>Job location:</td>
											<td><?php echo isset($preferencesmodel->job_location) ? $preferencesmodel->job_location : 'Not Mentioned';?></td>
										</tr>
										<tr>
											<td>Job role:</td>
											<td><?php echo isset($preferencesmodel->job_role) ? $preferencesmodel->job_role : 'Not Mentioned';?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Employer Skills</h4>
								</div>
								<table class="table table-user-information ">
									<tbody>
									
									<tr>
											<td>skill's:</td>
											<td><?php echo isset($employemodel->skills) ? $employemodel->skills : 'Not Mentioned';?></td>
											<td></td>
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
			
					</div>
				</div>
			</div>
		</div>
	</div>
</div>











