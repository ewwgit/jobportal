<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\growl\Growl;
//use yii\widgets\ListView;
$this->title = 'Application History';
use frontend\models\EmployeeJobapplied;
use frontend\models\EmployerJobpostings;






?>
 
    <div id="titlebar" class="single">
    <div class="container">
      <div class="twelve columns">
        <h2>Profile Information</h2>
        <nav id="breadcrumbs">
          <ul>
            <li>You are here:</li>
            <li><a href="#">Home</a></li>
            <li>Application Information</li>
          </ul>
        </nav>
      </div>
      
    </div>
  </div>
 
 
 
 
 
  <!--  <div class="container">
     
          <div class="sixteen columns">
    <p class="margin-bottom-25">Your listings are shown in the table
      below. Expired listings will be automatically removed after 30 days.</p>
    <table class="manage-table responsive-table stacktable large-only">
      <tbody>
        <tr>
         <th><i class="fa fa-file-text"></i> Skills</th>
         
          <th><i class="fa fa-file-text"></i> Designation</th>
         
          <th><i class="fa fa-calendar"></i> Experience</th>
      
          <th><i class="fa fa-user"></i> Applieddate</th>
        </tr>
        
			/* echo ListView::widget( [
					'dataProvider' => $dataProvider,
					'itemView' => 'applyjobsview',
					'viewParams' => [],
					'pager' => [
							 
							'prevPageLabel' => 'PREV',
							'nextPageLabel' => 'NEXT',
							'maxButtonCount' => 5,
							 
					],
					'layout' => "{items}\n{pager}",
			] ); */
			 
      </tbody>-->
      
   
      
       <tr>
	<td class="title"><?= $jobdetails['skills'];?></td>
	<td class="title"><?= $jobdetails['designation'];?></td>	
	<td class="title"><?= $jobdetails['company_name'];?></td>	
	<td class="centered">-</td>

	<!--  <td class="title"></td>-->
	</tr>
 
 
 
 
 
 
 
 

