<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
use frontend\models\EmployeeJobapplied;
use frontend\models\JobSkills;
use frontend\models\JobLocations;

$this->title = 'Job Complete Details';

$jobskills = JobSkills::find()->select('skill_name')->asArray()->where(['jobid' => $jobinfo->id])->all();

$skills = '';
if(!empty($jobskills) )
{
	foreach ($jobskills as $skill)
	{
		$skills .= $skill['skill_name'].', ';
	}
}
$joblocations = JobLocations::find()->select('location')->asArray()->where(['jobid' => $jobinfo->id])->all();

$locations = '';
if(!empty($joblocations) )
{
	foreach ($joblocations as $locationnew)
	{
		$locations .= $locationnew['location'].', ';
	}
}
?>

<div id="titlebar">
	<div class="container">
		<div class="ten columns">
			<span><a href="#"> <?php echo isset($jobinfo -> rolecategory) ? $jobinfo -> rolecategory : '' ;  ?> Category </a></span>
			<h2><?php  echo $skills; ?> Developers<span class="full-time"><?php echo  isset($jobinfo -> jobtype) ? $jobinfo -> jobtype:'';  ?></span></h2>
		</div>

		<div class="six columns">
			<a href="#" class="button dark"><i class="fa fa-star"></i> Bookmark This Job</a>
		</div>

	</div>
</div>


 
 
 
 
 
 
 
 
 
 <div class="container">
<div class="row">
<div class="col-md-4">
<p class="form-row form-row-wide">Social Share buttons :</p>
<?= \bl\socialShare\widgets\SocialShareWidget::widget([
        'componentId' => 'socialShare',
        'url' => Url::toRoute(['empcommon/facebook'], true),
        'title' => 'Job Portal',
        'description' => 'Job seekers can browse through job openings posted by employers and apply for positions through the Job Portal....',
        'image' => Url::toRoute(['frontend/web/images/logo.png'], true)
    ]) ?>
</div>
</div>
</div>
    
 
 
 
 
 
 
 
 <div class="container">
	
	<!-- Recent Jobs -->
	<div class="eleven columns">
	<div class="padding-right">
		
		<!-- Company Info -->
		<div class="company-info">
			<img src="<?php
							if($jobinfo->imagenew){
													
							echo isset( $jobinfo->imagenew)? Url::base().$jobinfo->imagenew : '' ;
							}else {
									  echo Url::base()."/frontend/web/images/user-iconnew.png" ;
								      }
								?>" alt="company image">
			<div class="content">
				<h4><?php  echo isset($jobinfo -> company_name) ? $jobinfo -> company_name : '' ?></h4>
				<span><a href="#"><i class="fa fa-link"></i> Website</a></span>
				<span><a href="#"><i class="fa fa-twitter"></i> @kingrestaurants</a></span>
			</div>
			<div class="clearfix"></div>
		</div>

		<p class="margin-reset">
			<strong>Job Description</strong>
		</p>

		<br>
		

		<p><?php echo  isset( $jobinfo -> Description) ? $jobinfo -> Description : '';  ?></p>
		<p class="margin-reset">
			<strong>Experience</strong>
		</p>
		
		<p><?php  echo isset($jobinfo -> Min_Experience) ? $jobinfo -> Min_Experience : ''?> - 
    <?php echo $jobinfo -> Max_Experience?> Years</p>
		
		<br>

		<h4 class="margin-bottom-10">Key Skills</h4>
		<?php  echo $skills;  ?> 
		
		
			<h4 class="margin-bottom-10">Job Posting Date</h4>

		    	<?php  echo isset($jobinfo -> createdDate)? date('Y-m-d',strtotime( $jobinfo -> createdDate)) : '' ?> 
		
		    
	</div>
	</div>


	<!-- Widgets -->
	<div class="five columns">

		<!-- Sort by -->
		<div class="widget">
			<h4>Overview</h4>

			<div class="job-overview">
				
				<ul>
					<li>
						<i class="fa fa-map-marker"></i>
						<div>
							<strong> Job Location:</strong>
							<span><?php echo  $locations;  ?></span>
						</div>
					</li>
					<li>
						<i class="fa fa-user"></i>
						<div>
							<strong>Job Title:</strong>
							<span><?php echo   isset( $jobinfo -> rolecategory) ? $jobinfo -> rolecategory:'';  ?></span>
						</div>
					</li>
					<li>
						<i class="fa fa-user"></i>
						<div>
							<strong>Industry Type:</strong>
							<span><?php echo  isset( $jobinfo -> industry_type) ?  $jobinfo -> industry_type:'';  ?></span>
						</div>
					</li>
					<li>
					<li>
						<i class="fa fa-user"></i>
						<div>
							<strong>Company Type:</strong>
							<span><?php echo  isset( $jobinfo -> company_type) ? $jobinfo -> company_type:'' ;  ?></span>
						</div>
					</li>
					<li>
						<i class="fa fa-clock-o"></i>
						<div>
							<strong>Establishment Date:</strong>
							<span><?php echo isset( $jobinfo -> dateofestablishment) ? $jobinfo -> dateofestablishment : '' ;  ?></span>
						</div>
					</li>
					<li>
						<i class="fa fa-money"></i>
						<div>
							<strong>Salary:</strong>
							<span><?php echo  isset( $jobinfo -> currency) ? $jobinfo -> currency : '';  ?>
							<?php echo  isset( $jobinfo -> min_salary) ? $jobinfo -> min_salary : '';  ?> - 
							<?php echo  isset( $jobinfo -> CTC) ? $jobinfo -> CTC : '';  ?> 
							<?php echo  isset( $jobinfo -> sal_type) ? $jobinfo -> sal_type : '';  ?></span>
						</div>
					</li>
				</ul>
				
				
				 <?php
	$userId = Yii::$app->emplyoee->emplyoeeid;
	$memberJoin = EmployeeJobapplied::getUsersjoined ( $jobinfo->id, $userId );
	?>
	<?php if($memberJoin ==0){?>
	<td class="centered">
	<button class="btn btn-primary apply_job" id="needtoapply<?=  $jobinfo->id; ?>" apljobid="<?php echo $jobinfo->id;?>">Apply This Job</button>
	
	</td>
	<?php
	}
	else {
		?>
	<td class="centered">
	<button class="btn btn-primary applied">Applied</button>
	</td>
	<?php }?>
 


				<!--  <a href="#small-dialog" class="popup-with-zoom-anim button">Apply For This Job</a>

				<div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
					<div class="small-dialog-headline">
						<h2>Apply For This Job</h2>
					</div>-->

					
					
				</div>

			</div>

		</div>

	</div>
	<!-- Widgets / End -->


</div>
								
							
<?php $applyjoburl = Yii::$app->urlManager->createUrl(['site/applyjobajax'])?>
 
<?php 

$this->registerJs ( "
		
		$(document.body).on('click', '.apply_job' ,function(){
		 var jbid = $(this).attr('apljobid');
		
		$.ajax({
        url: '$applyjoburl',
        type: 'get',
        dataType : 'json',
		data:{jbid : jbid},
		success : function(data){	
	
		   if(data.status == 0)
           {
               $.growl({ title: '<span data-notify=\"icon\" class=\"fa fa-exclamation scicon\"></span>Warning!<hr class=\"successseperator\">', message: 'Already Applied this job.',duration:50000,location:'tc',style:'warning',size:'large' });
           }
           if(data.status == 1)
           {
		
        	$('[id=\"needtoapply'+jbid+'\"]').html('Applied');
		    $('[id=\"needtoapply'+jbid+'\"]').addClass('applied');
		    $('[id=\"needtoapply'+jbid+'\"]').removeClass('apply_job');
		    $.growl({ title: '<span data-notify=\"icon\" class=\"fa fa-check scicon\"></span>Success!<hr class=\"successseperator\">', message: 'Successfully Applied this job',duration:50000,location:'tc',style:'notice',size:'large' });
		    //console.log($('[id=\"needtoapply4\"]').html());
           }
		
      } 
        
    }); 
		});
		
		$(document.body).on('click', '.applied' ,function(){
		 $.growl({ title: '<span data-notify=\"icon\" class=\"fa fa-exclamation scicon\"></span>Warning!<hr class=\"successseperator\">', message: 'Already Applied this job.',duration:50000,location:'tc',style:'warning' });
		});

		", View::POS_READY, 'my-options2' );
?>




