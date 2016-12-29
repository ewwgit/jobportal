<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use common\models\User;
use frontend\models\EmployeeSignup;
use frontend\models\EmployeePreferences;
use frontend\models\EmployeeResume;
use frontend\models\EmployeeJobapplied;
use frontend\models\EmployerJobpostings;
use yii\bootstrap\ActiveForm;


$UserData = User::find()->where(['id' => $model->userid])->one();
$signupdata = EmployeeSignup::find()->where(['userid' => $model->userid])->one();
$emp_preference = EmployeePreferences::find()->where(['userid' => $model->userid])->one();
$emp_resume = EmployeeResume::find()->where(['userid' => $model->userid])->one();

$applied_data = EmployeeJobapplied::find()->where(['userid' => $model->userid])->one();
$jobmaster_data = EmployerJobpostings::find()->where(['id' => $model->jobid])->one();
?>
<div class="sixteen columns">

<!-- Application #1 -->
<div class="application">
<div class="app-content">

<!-- Name / Avatar -->
<div class="info">
<img src="<?php echo isset( $signupdata->profileimage)? Yii::getAlias('/jobportal').$signupdata->profileimage : '' ;  ?>" alt="">
<span><?php echo isset( $UserData->username)? $UserData->username : 'Not Mentioned' ;  ?></span>
					<ul>
					
				
						<li><a href="/jobportal/<?php echo isset( $emp_resume->resume)? $emp_resume->resume : 'Not Mentioned' ;
						             ?>"><i class="fa fa-file-text"></i> Download CV</a></li>
						
											
						<li><i class="fa fa-envelope"></i> Contact No: <a href="#"><?php echo isset ($signupdata->mobilenumber)? $signupdata->mobilenumber : 'Not Mentioned' ;    ?></a></li>
					</ul>
				</div>
				
				<!-- Buttons -->
				<div class="buttons">
					<a href="#one-1" class="button gray app-link"><i class="fa fa-pencil"></i> Edit</a>
					<a href="#two-1" class="button gray app-link"><i class="fa fa-sticky-note"></i> Add Note</a>
					<a href="#three-1" class="button gray app-link"><i class="fa fa-plus-circle"></i> Show Details</a>
				</div>
				<div class="clearfix"></div>

			</div>

			<!--  Hidden Tabs -->
			<div class="app-tabs">

				<a href="#" class="close-tab button gray"><i class="fa fa-close"></i></a>
				
				<!-- First Tab -->
			    <div class="app-tab-content" id="one-1">

					<div class="select-grid">
						<select data-placeholder="Application Status" class="chosen-select-no-single">
							<option value="">Application Status</option>
							<option value="new">New</option>
							<option value="interviewed">Interviewed</option>
							<option value="offer">Offer extended</option>
							<option value="hired">Hired</option>
							<option value="archived">Archived</option>
						</select>
					</div>

					<div class="select-grid">
						<input type="number" min="1" max="5" placeholder="Rating (out of 5)">
					</div>

					<div class="clearfix"></div>
					<a href="#" class="button margin-top-15">Save</a>
					<a href="#" class="button gray margin-top-15 delete-application">Delete this application</a>

			    </div>
			    
			    <!-- Second Tab -->
			    <div class="app-tab-content"  id="two-1">
					<textarea placeholder="Private note regarding this application"></textarea>
					<a href="#" class="button margin-top-15">Add Note</a>
			    </div>
			    
			    <!-- Third Tab -->
			  
			    <div class="app-tab-content"  id="three-1">
			    <div >
			    <?php
	$userId = \Yii::$app->user->id;
	$status = EmployeeJobapplied::getUsersjoined ($userId , $model->jobid);
	//print_r($status);exit;
	//$status = $model->status;

	
	?>
	<?php if($status == 0){?>
	<i data="<?php echo $model['jobid'];?>" class="status_checks btn 
				<?php echo ($model['status'])? 'btn-success' : 'btn-danger'?>">
				<?php echo ($model['status'])? 'Active' : 'Inactive' ?></i>
				<?php
	}
	else {?>
		<i <?php echo ($model['status'])? 'btn-success' : 'btn-danger'?>> 
		   <?php echo ($model['status'])? 'Active' : 'Inactive'?></i>
		<?php }?>
	
		    
			   
			   
			 
				
				
				
				</div>
					<i>Full Name:</i>
					<span><?php echo isset( $signupdata->name)? $signupdata->name : 'Not Mentioned' ;  ?> <?php echo isset( $signupdata->surname)? $signupdata->surname : 'Not Mentioned' ;  ?></span>

					<i>Email:</i>
					<span><?php echo  isset($UserData->email)? $UserData->email : 'Not Mentioned' ;    ?></span>
					<i>Job role:</i>
					<span><?php echo isset( $emp_preference->jobrole) ?  $emp_preference->jobrole : 'Not Mentioned'  ;  ?></span>
					<i>Job location:</i>
					<span><?php echo isset( $emp_preference->joblocation) ?  $emp_preference->joblocation : 'Not Mentioned'  ; ?></span>
					<i>Experience:</i>
					<span><?php echo isset( $emp_preference->experience) ?  $emp_preference->experience : 'Not Mentioned'  ;?></span>
					<i>Job type:</i>
					<span><?php echo isset( $emp_preference->jobtype) ?  $emp_preference->jobtype : 'Not Mentioned'  ; ?></span>
					<i>Expected Salary:</i>
					<span><?php echo  isset($emp_preference->expectedsalary) ?  $emp_preference->expectedsalary : 'Not Mentioned'  ;  ?></span>
					<i>Job Applied for:</i>
					<span><?php echo  isset($jobmaster_data->designation) ?  $jobmaster_data->designation : 'Not Mentioned'  ;  ?></span>
										

					<i>Description:</i>
					<span><?php echo  isset($jobmaster_data->Description) ?  $jobmaster_data->Description : 'Not Mentioned'  ;  ?></span>
			    </div>
			
			  
			  

			</div>
		
			

			<!-- Footer -->
			<div class="app-footer">

				<div class="rating no-stars">
					<div class="star-rating"></div>
					<div class="star-bg"></div>
				</div>

				<ul>
					<li><i class="fa fa-file-text-o"></i> New</li>
					<li><i class="fa fa-calendar"></i> <?php echo  isset($applied_data->appliedDate) ?  $applied_data->appliedDate : 'Not Mentioned'  ;  ?></li>
				</ul>
				<div class="clearfix"></div>

			</div>
		</div>
	</div>
	

<style type="text/css">

   .btn-success {
   background-color: #65B688;
   border-color: #65B688;
   }
   .btn-danger {
   color: #fff;
   background-color: #d9534f;
   border-color: #d43f3a;
   }
   .btn {
   color: white;
   display: inline-block;
   margin-bottom: 0;
   font-weight: 400;
   text-align: center;
   vertical-align: middle;
   cursor: pointer;
   background-image: none;
   border: 1px solid transparent;
   white-space: nowrap;
   padding: 6px 12px;
   font-size: 14px;
   line-height: 1.42857143;
   border-radius: 4px;
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
   width:100px;
   }
</style>
<!--  <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>  -->
<script type="text/javascript">
$('.status_checks').on('click',function(){
	//var $ = jQuery;
	//var status = ($(this).hasClass("btn-success")) ? '0' : '1';
	 var status = $(this).attr('btn-success') ? '0' : '1';
	 
// 	 if(result.indexOf("status") != -1)
// 	 {
// 		 echo "status";
// 	 }
// 	 exit();

		$.ajax({
			
		type:"GET",
		dataType:'json',
		
		data: {status : status},
		
		success: function(data)
		{
			 if(data.status == 0)
         {
              console.log('fail');
         }
         if(data.status == 1)
         {
              console.log('success');
			//location.reload();
         }
		},
		});
		
	});



</script>
