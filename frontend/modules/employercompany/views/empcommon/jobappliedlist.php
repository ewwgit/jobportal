<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;
use frontend\models\JobpostSearch;

use yii\bootstrap\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;
use yii\web\view;


$this->title = 'Job applied List';



?>
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
<div class="container">
	
	<!-- Table -->
	<div class="sixteen columns">

		<p class="margin-bottom-25" style="float: left;">Total job applications are : <b style= "color:green;"><?php echo  $total_list ?></b></p>


	</div>


	<div class="eight columns">
		<!-- Select -->
		<select data-placeholder="Filter by status" class="chosen-select-no-single">
			<option value="">Filter by status</option>
			<option value="new">New</option>
			<option value="interviewed">Interviewed</option>
			<option value="offer">Offer extended</option>
			<option value="hired">Hired</option>
			<option value="archived">Archived</option>
		</select>
		<div class="margin-bottom-15"></div>
	</div>

	<div class="eight columns">
		<!-- Select -->
		<select data-placeholder="Newest first" class="chosen-select-no-single">
			<option value="">Newest first</option>
			<option value="name">Sort by name</option>
			<option value="rating">Sort by rating</option>
		</select>
		<div class="margin-bottom-35"></div>
	</div>
<?php 
echo ListView::widget( [
		'dataProvider' => $dataProvider,
		'itemView' => '_jobseekerslist',
		'viewParams' => [],
		'pager' => [

				'prevPageLabel' => 'PREV',
				'nextPageLabel' => 'NEXT',
				'maxButtonCount' => 5,

		],
		'layout' => "{items}\n{pager}",
] );



?>

	<!-- Applications -->
</div>
<?php $applicationStatusurl = Yii::$app->urlManager->createUrl(['employercompany/empcommon/jobapplictionstatuschange'])?>
<?php 

$this->registerJs ( "
		
		$(document.body).on('click', '.applicationsve' ,function(){
		 var appliedid = $(this).attr('applied-id');
		 var applicationstaus = $('#selectbx'+appliedid+' option:selected').val();
		 var applicationrating = $('#ratstatus'+appliedid).val();
		 var updatestatus = 'notdelete'; 
		//console.log(applicationrating);
		//return false;
		
		$.ajax({
        url: '$applicationStatusurl',
        type: 'get',
        dataType : 'json',
		data:{appliedid : appliedid,applicationstaus : applicationstaus,applicationrating:applicationrating,updatestatus:updatestatus},
		success : function(data){	
	
		   if(data.status == 0)
           {
               $.growl({ title: '<span data-notify=\"icon\" class=\"fa fa-exclamation scicon\"></span>Warning!<hr class=\"successseperator\">', message: 'Already Applied this job.',duration:50000,location:'tc',style:'warning',size:'large' });
           }
           if(data.status == 1)
           {
        	
		    $.growl({ title: '<span data-notify=\"icon\" class=\"fa fa-check scicon\"></span>Success!<hr class=\"successseperator\">', message: 'Successfully Applied this job',duration:50000,location:'tc',style:'notice',size:'large' });
		    
           }
		
      } 
        
    }); 
		});
		
		
		
		$(document.body).on('click', '.applicationdel' ,function(){
		 var appliedid = $(this).attr('applied-id');
		 var applicationstaus = $('#selectbx'+appliedid+' option:selected').val();
		 var applicationrating = $('#ratstatus'+appliedid).val();
		 var updatestatus = 'delete'; 
		//console.log(applicationrating);
		//return false;
		
		$.ajax({
        url: '$applicationStatusurl',
        type: 'get',
        dataType : 'json',
		data:{appliedid : appliedid,applicationstaus : applicationstaus,applicationrating:applicationrating,updatestatus:updatestatus},
		success : function(data){	
	
		   if(data.status == 0)
           {
               $.growl({ title: '<span data-notify=\"icon\" class=\"fa fa-exclamation scicon\"></span>Warning!<hr class=\"successseperator\">', message: 'Already Applied this job.',duration:50000,location:'tc',style:'warning',size:'large' });
           }
           if(data.status == 1)
           {
        	
		    $.growl({ title: '<span data-notify=\"icon\" class=\"fa fa-check scicon\"></span>Success!<hr class=\"successseperator\">', message: 'Successfully Applied this job',duration:50000,location:'tc',style:'notice',size:'large' });
		    
           }
		
      } 
        
    }); 
		});
		
		

		", View::POS_READY, 'my-optionsnew' );
?>