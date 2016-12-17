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
<div class="container">

	<!-- Submit Page -->
	<div class="sixteen columns">
		<div class="submit-page" style="padding: 0px;">
			<div class="container">
				<div class="col-md-3 col-sm-3 col-xs-3 profile_img">
					<div class="resume-titlebar">
						<img
							src="<?php echo Yii::getAlias('/jobportal').$employemodel->profileimage; ?>"
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
											<td><?php echo  $model->username ;?></td>
										</tr>
										<tr>
											<td>Your Email:</td>
											<td><a href="#" style="color: #000;"><?php  echo $model->email;?></a></td>
										</tr>

										<tr>
											<td>Your Name:</td>
											<td><?php echo  $employemodel->name;  ?></td>
										</tr>
										<tr>
											<td>Your designation:</td>
											<td><?php echo  $employemodel->designation;  ?></td>
										</tr>

										<tr>
											<td>Gender:</td>
											<td><?php echo  $employemodel->gender;  ?></td>
										</tr>
										<tr>
											<td>Mobile Number:</td>
											<td><?php echo  $employemodel->mobilenumber;  ?></td>
										</tr>
										<tr>
											<td>Dateof Birth:</td>
											<td><?php echo  $employemodel->dateofbirth;  ?></td>
										</tr>
										<tr>
											<td>address:</td>
											<td><?php echo  $employemodel->address;  ?></td>
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
											<td><?php echo isset($edumodel->higherdegree) ? $edumodel->higherdegree : '';?></td>
										</tr>
										<tr>
											<td>Highest Degree Specialization:</td>
											<td><?php echo isset($edumodel->specialization) ? $edumodel->specialization : '';?></td>
										</tr>
										<tr>
											<td>Your University:</td>
											<td><?php echo isset($edumodel->university) ? $edumodel->university : '';?></td>
										</tr>
										<tr>
											<td>Your College Name:</td>
											<td><?php echo isset($edumodel->collegename) ? $edumodel->collegename : '';?></td>
										</tr>
										<tr>
											<td>Passing Year:</td>
											<td><?php echo isset($edumodel->passingyear) ? $edumodel->passingyear : '';?></td>
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
									<h4>Employer Company Profile</h4>
								</div>
	<table class="table table-user-information ">
									<tbody>
										<tr>
											<td>Company name:</td>
											<td><?php echo isset($jobmodel->company_name) ? $jobmodel->company_name : '';?></td>
										</tr>
										<tr>
											<td>Employer type:</td>
											<td><?php echo isset($jobmodel->employer_type) ? $jobmodel->employer_type : '';?></td>
										</tr>

										<tr>
											<td>Industry type:</td>
											<td><?php echo isset($jobmodel->industry_type) ? $jobmodel->industry_type : '';?></td>
										</tr>
										<tr>
											<td>Dateofestablishment:</td>
											<td><?php echo isset($jobmodel->dateofestablishment) ? $jobmodel->dateofestablishment : '';?></td>
										</tr>
										<tr>
											<td>Location:</td>
											<td><?php echo isset($jobmodel->location) ? $jobmodel->location : '';?></td>
										</tr>
										<tr>
											<td>Country:</td>
											<td><?php echo isset($jobmodel->country) ? $jobmodel->country : '';?></td>
										</tr>
										<tr>
											<td>State:</td>
											<td><?php echo isset($jobmodel->state) ? $jobmodel->state : '';?></td>
										</tr>
										<tr>
											<td>City:</td>
											<td><?php echo isset($jobmodel->city) ? $jobmodel->city : '';?></td>
										</tr>
										<tr>
											<td>Zipcode:</td>
											<td><?php echo isset($jobmodel->zipcode) ? $jobmodel->zipcode : '';?></td>
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
											<td><?php echo isset($preferencesmodel->expected_salary) ? $preferencesmodel->expected_salary : '';?></td>
										</tr>
										<tr>
											<td>Job location:</td>
											<td><?php echo isset($preferencesmodel->job_location) ? $preferencesmodel->job_location : '';?></td>
										</tr>
										<tr>
											<td>Job role:</td>
											<td><?php echo isset($preferencesmodel->job_role) ? $preferencesmodel->job_role : '';?></td>
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
											<td><?php echo isset($employemodel->skills) ? $employemodel->skills : '';?></td>
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Employer employment</h4>
								</div>
								<table class="table table-user-information ">
									<tbody>
										<tr>
											<td>Job title:</td>
											<td><?php echo isset($employmentmodel->job_title) ? $employmentmodel->job_title  : '';?></td>
										</tr>
										<tr>
											<td>Job type:</td>
											<td><?php echo isset($employmentmodel->job_type) ? $employmentmodel->job_type  : '';?></td>
										</tr>
										<tr>
											<td>Job description:</td>
											<td><?php echo isset($employmentmodel->job_description) ? $employmentmodel->job_description  : '';?></td>
										</tr>
										<tr>
											<td>Experience:</td>
											<td><?php echo isset($employmentmodel->experience) ? $employmentmodel->experience  : '';?></td>
										</tr>
										
										<tr>
											<td>Work location:</td>
											<td><?php echo isset($employmentmodel->work_location) ? $employmentmodel->work_location  : '';?></td>
										</tr>
										<tr>
											<td>Shift timings:</td>
											<td><?php echo isset($employmentmodel->shift_timings) ? $employmentmodel->shift_timings  : '';?></td>
										</tr>
										<tr>
											<td>Weekly days:</td>
											<td><?php echo isset($employmentmodel->weekly_days) ? $employmentmodel->weekly_days  : '';?></td>
										</tr>
										<tr>
											<td>Salary:</td>
											<td><?php echo isset($employmentmodel->salary) ? $employmentmodel->salary  : '';?></td>
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











