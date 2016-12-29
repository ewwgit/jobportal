<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
$this->title = 'Job Complete Details';
use frontend\models\EmployeeJobapplied;
?>
<div id="titlebar" class="single">
		<div class="container">
			<div class="sixteen columns">
				<h2>Candidates Login</h2>
				<nav id="breadcrumbs">
					<ul>
						<li>You are here:</li>
						<li><a href="#">Home</a></li>
						<li>Job Complete Information</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>

<h3>Urget Openings of Job Complete Information</h3>
<div class="container">
<p> <?php  echo $jobinfo -> skills ?> Developers</p>
<div><p> <?php  echo $jobinfo -> company_name?> Private Limited</p></div>
<div><p><?php  echo $jobinfo -> Min_Experience?> - 
    <?php echo $jobinfo -> Max_Experience?></p></div>
 <div><p> <?php  echo $jobinfo -> city?> </p></div>
 
 </div>
 
 <table class="table table-user-information ">
									<tbody>
										<tr>
											<td>Job Description:</td>
											<td><?php echo  $jobinfo -> Description;  ?></td>
										</tr>
										<tr>
											<td>Salry:</td>
											<td><?php echo   $jobinfo -> CTC;  ?></td>
										</tr>

										<tr>
											<td>Industry Type:</td>
											<td><?php echo   $jobinfo -> industry_type;  ?></td>
										</tr>
										<tr>
											<td>Role Category:</td>
											<td><?php echo   $jobinfo -> rolecategory;  ?></td>
										</tr>
										<tr>
											<td>Company Type:</td>
											<td><?php echo   $jobinfo -> company_type;  ?></td>
										</tr>
										<tr>
											<td>Job Type:</td>
											<td><?php echo   $jobinfo -> jobtype;  ?></td>
										</tr>
										<tr>
											<td>Establishment Date:</td>
											<td><?php echo  $jobinfo -> dateofestablishment;  ?></td>
										</tr>

										<tr>
											<td>Country:</td>
											<td><?php echo  $jobinfo -> country;  ?></td>
										</tr>
										<tr>
											<td>State:</td>
											<td><?php echo  $jobinfo -> state;  ?></td>
										</tr>
										<tr>
											<td>City:</td>
											<td><?php echo  $jobinfo -> city;  ?></td>
										</tr>
										<tr>
											<td>Zipcode:</td>
											<td><?php echo  $jobinfo -> zipcode;  ?></td>
										</tr>
										<tr>
											<td>Address:</td>
											<td><?php echo  $jobinfo -> address;  ?></td>
										</tr>
										
									</tbody>
								</table>
								
								
								 <?= Html::a('Back', ['/site/index'], ['class'=>'btn btn-primary button border fw margin-top-10'])?>






