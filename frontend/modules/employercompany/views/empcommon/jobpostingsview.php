<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'Postings View';

?>
<style>
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td,
	.table>tbody>tr>td, .table>tfoot>tr>td {
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
					<div class="resume-titlebar"></div>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Job posting detail view</h4>
								</div>
								<table class="table table-user-information ">
									<tbody>
										<tr>
											<td>Company Name:</td>
											<td><?php echo  $postings->company_name;  ?></td>
										</tr>
										<tr>
											<td>Company Type:</td>
											<td><?php echo  $postings->company_type;  ?></td>
										</tr>

										<tr>
											<td>Industry Type:</td>
											<td><?php echo  $postings->industry_type;  ?></td>
										</tr>
										<tr>
											<td>Establishment Date:</td>
											<td><?php echo  $postings->dateofestablishment;  ?></td>
										</tr>

										<tr>
											<td>Country:</td>
											<td><?php echo  $postings->country;  ?></td>
										</tr>
										<tr>
											<td>State:</td>
											<td><?php echo  $postings->state;  ?></td>
										</tr>
										<tr>
											<td>City:</td>
											<td><?php echo  $postings->city;  ?></td>
										</tr>
										<tr>
											<td>Zipcode:</td>
											<td><?php echo  $postings->zipcode;  ?></td>
										</tr>
										<tr>
											<td>Address:</td>
											<td><?php echo  $postings->address;  ?></td>
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-6">
							<div class="margin-bottom-20"style="margin-top: 36px;">
								<div class="title-underlined">
									<h4></h4>
								</div>
								<table class="table table-user-information " >
									<tbody>
										<tr>
											<td>Skills:</td>
											<td><?php echo  $postings->skills;  ?></td>
										</tr>
										<tr>
											<td>Designation</td>
											<td><?php echo  $postings->designation;  ?></td>
										</tr>
										<tr>
											<td>Max Experience:</td>
											<td><?php echo  $postings->Max_Experience;  ?></td>
										</tr>
										<tr>
											<td>Min Experience:</td>
											<td><?php echo  $postings->Min_Experience;  ?></td>
										</tr>
										<tr>
											<td>RoleCategory:</td>
											<td><?php echo  $postings->rolecategory;  ?></td>
										</tr>
										<tr>
											<td>Description:</td>
											<td><?php echo  $postings->Description;  ?></td>
										</tr>
										<tr>
											<td>Job Type:</td>
											<td><?php echo  $postings->jobtype;  ?></td>
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			<div class="divider margin-top-0 padding-reset"></div>
          <?= Html::a('Back', ['/employercompany/empcommon/jobpostingslist'], ['class'=>'btn btn-primary button border fw margin-top-10'])?>
			</div>
		</div>
	</div>
</div>


   


