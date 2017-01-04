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

<h3>Urgent Openings For Freshers</h3>
<div class="container">
<p> <?php  echo $jobinfo -> skills ?> Developers</p>
<div><p> <?php  echo $jobinfo -> company_name?> Private Limited</p></div>
<div><p><?php  echo $jobinfo -> Min_Experience?> - 
    <?php echo $jobinfo -> Max_Experience?></p></div>
 <div><p> <?php  echo $jobinfo -> city ?> </p></div>
 
 </div>
 
 
 
 
 <?php
	$userId = \Yii::$app->user->id;
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




