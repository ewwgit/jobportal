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
<div class="container">

	<!-- Submit Page -->
	<div class="sixteen columns">
		<div class="submit-page" style="padding: 0px;">
			<div class="container">
				<div class="col-md-3 col-sm-3 col-xs-3 profile_img">
					<div class="resume-titlebar">
						<img src="images/recent-post-03.jpg" alt="">
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
											<td><?php echo  $edumodel->higherdegree ;?></td>
										</tr>
										<tr>
											<td>Highest Degree Specialization:</td>
											<td><?php echo  $edumodel->specialization;  ?></td>
										</tr>
										<tr>
											<td>Your University:</td>
											<td><?php echo  $edumodel->university;  ?></td>
										</tr>
										<tr>
											<td>Your College Name:</td>
											<td><?php echo  $edumodel->collegename;  ?></td>
										</tr>
										<tr>
											<td>Passing Year:</td>
											<td><?php echo  $edumodel->passingyear;  ?></td>
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
											<td><?php echo $jobmodel->company_name; ?></td>
										</tr>
										<tr>
											<td>Company type:</td>
											<td><?php echo $jobmodel->company_type; ?></td>
										</tr>

										<tr>
											<td>Industry type:</td>
											<td><?php echo $jobmodel->industry_type; ?></td>
										</tr>
										<tr>
											<td>Dateofestablishment:</td>
											<td><?php echo $jobmodel->dateofestablishment; ?></td>
										</tr>
										<tr>
											<td>Location:</td>
											<td><?php echo $jobmodel->location; ?></td>
										</tr>
										<tr>
											<td>Country:</td>
											<td><?php echo $jobmodel->country; ?></td>
										</tr>
										<tr>
											<td>State:</td>
											<td><?php echo $jobmodel->state; ?></td>
										</tr>
										<tr>
											<td>City:</td>
											<td><?php echo $jobmodel->city; ?></td>
										</tr>
										<tr>
											<td>Zipcode:</td>
											<td><?php echo $jobmodel->zipcode; ?></td>
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
											<td><?php echo  $preferencesmodel->expected_salary ;?></td>
										</tr>
										<tr>
											<td>Job location:</td>
											<td><?php echo  $preferencesmodel->job_location;  ?></td>
										</tr>
										<tr>
											<td>Job role:</td>
											<td><?php echo  $preferencesmodel->job_role;  ?></td>
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
											<td>Requirment:</td>
											<td><?php echo  $skillsmodel->requirment ;?></td>
										</tr>
										<tr>
											<td>Companytype:</td>
											<td><?php echo  $skillsmodel->companytype;  ?></td>
										</tr>
										<tr>
											<td>Jobtype:</td>
											<td><?php echo  $skillsmodel->jobtype;  ?></td>
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
											<td><?php echo  $employmentmodel->job_title ;?></td>
										</tr>
										<tr>
											<td>Job type:</td>
											<td><?php echo  $employmentmodel->job_type;  ?></td>
										</tr>
										<tr>
											<td>Job description:</td>
											<td><?php echo  $employmentmodel->job_description;  ?></td>
										</tr>
										<tr>
											<td>Experience:</td>
											<td><?php echo  $employmentmodel->experience ;?></td>
										</tr>
										<tr>
											<td>No of openings:</td>
											<td><?php echo  $employmentmodel->no_of_openings;  ?></td>
										</tr>
										<tr>
											<td>Work location:</td>
											<td><?php echo  $employmentmodel->work_location;  ?></td>
										</tr>
										<tr>
											<td>Shift timings:</td>
											<td><?php echo  $employmentmodel->shift_timings ;?></td>
										</tr>
										<tr>
											<td>Weekly days:</td>
											<td><?php echo  $employmentmodel->weekly_days;  ?></td>
										</tr>
										<tr>
											<td>Salary:</td>
											<td><?php echo  $employmentmodel->salary;  ?></td>
										</tr>

									</tbody>
								</table>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="divider margin-top-0 padding-reset"></div>
			<div class="form-group">
       <?= Html::a('update', ['/employercompany/empcommon/employer'], ['class'=>'btn btn-primary'])?>
    </div>
			<a href="#" style="float: right;" class="button big margin-top-5 ">Update
				Resume <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>











