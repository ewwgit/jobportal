<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'Postings View';
use frontend\models\JobSkills;
use frontend\models\JobLocations;



$jobskills = JobSkills::find()->select('skill_name')->asArray()->where(['jobid' => $postings->id])->all();

$skills = '';
if(!empty($jobskills) )
{
	foreach ($jobskills as $skill)
	{
		$skills .= $skill['skill_name'].', ';
	}
}
$joblocations = JobLocations::find()->select('location')->asArray()->where(['jobid' => $postings->id])->all();

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
			<span><a href="#"> <?php echo isset($postings -> rolecategory) ? $postings -> rolecategory : '' ;  ?> Category </a></span>
			<h2><?php  echo $skills; ?> Developers<span class="full-time"><?php echo  isset($postings -> jobtype) ? $postings -> jobtype:'';  ?></span></h2>
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
							if($postings->imagenew){
													
							echo isset( $postings->imagenew)? Url::base().$postings->imagenew : '' ;
							}else {
									  echo Url::base()."/frontend/web/images/user-iconnew.png" ;
								      }
								?>" alt="company image">
			<div class="content">
				<h4><?php  echo isset($postings -> company_name) ? $postings -> company_name : '' ?></h4>
				<span><a href="#"><i class="fa fa-link"></i> Website</a></span>
				<span><a href="#"><i class="fa fa-twitter"></i> @kingrestaurants</a></span>
			</div>
			<div class="clearfix"></div>
		</div>

		<p class="margin-reset">
			<strong>Job Description</strong>
		</p>

		<br>
		

		<p><?php echo  isset( $postings -> Description) ? $postings -> Description : '';  ?></p>
		
		<p class="margin-reset">
			<strong>Experience</strong>
		</p>
		<p><?php  echo isset($postings -> Min_Experience) ? $postings -> Min_Experience : ''?> - 
    <?php echo $postings -> Max_Experience?> Years</p>
		
		<br>

		<h4 class="margin-bottom-10">Key Skills</h4>
		<?php  echo $skills;  ?> 
		
		
			<h4 class="margin-bottom-10">Job Posting Date</h4>

		    	<?php  echo isset($postings -> createdDate)? date('Y-m-d',strtotime( $postings -> createdDate)) : '' ?> 
		
		    
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
							<span><?php echo   isset( $postings -> rolecategory) ? $postings -> rolecategory:'';  ?></span>
						</div>
					</li>
					<li>
						<i class="fa fa-user"></i>
						<div>
							<strong>Industry Type:</strong>
							<span><?php echo  isset( $postings -> industry_type) ?  $postings -> industry_type:'';  ?></span>
						</div>
					</li>
					<li>
					<li>
						<i class="fa fa-user"></i>
						<div>
							<strong>Company Type:</strong>
							<span><?php echo  isset( $postings -> company_type) ? $postings -> company_type:'' ;  ?></span>
						</div>
					</li>
					<li>
						<i class="fa fa-clock-o"></i>
						<div>
							<strong>Establishment Date:</strong>
							<span><?php echo isset( $postings -> dateofestablishment) ? $postings -> dateofestablishment : '' ;  ?></span>
						</div>
					</li>
					<li>
						<i class="fa fa-money"></i>
						<div>
							<strong>Salary:</strong>
							<span><?php echo  isset( $postings -> currency) ? $postings -> currency : '';  ?>
							<?php echo  isset( $postings -> min_salary) ? $postings -> min_salary : '';  ?> - 
							<?php echo  isset( $postings -> CTC) ? $postings -> CTC : '';  ?> 
							<?php echo  isset( $postings -> sal_type) ? $postings -> sal_type : '';  ?></span>
						</div>
					</li>
				</ul>
				
				
 


				<!--  <a href="#small-dialog" class="popup-with-zoom-anim button">Apply For This Job</a>

				<div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
					<div class="small-dialog-headline">
						<h2>Apply For This Job</h2>
					</div>-->

					
					
				</div>

			</div>

		</div>

	
	<!-- Widgets / End -->
	<div class="clearfix"></div>
			<div class="divider margin-top-0 padding-reset"></div>
          <?= Html::a('Back', ['/employercompany/empcommon/jobpostingslist'], ['class'=>'btn btn-primary button border fw margin-top-10'])?>
			

		</div>	
							
							

			
			
		
	
</div>


   


