<?php
use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Employerjobpostings;
use frontend\models\EmployerSkills;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;
use frontend\models\JobpostSearch;

use yii\bootstrap\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;

$this->title = 'JOB Posting List';
$this->params ['breadcrumbs'] [] = $this->title;
$userid=Yii::$app->employer->employerid;
?>
<div class="container"> 
<div class="coachingvideoapi-index">

   
<section class="invoice">

		<p>
		
        <?= Html::a('Create postings', ['create','userid'=>$userid], ['class' => 'button'],[])?></p>
     <div >
  <?php $form = ActiveForm::begin([
        'action' => Url::to(['jobpostingslist']),
        'method' => 'get',
        'options' => ['class' => '  form-inline form-group  col-xs-12'],/* form-group-sm*/
        'fieldConfig' => [
            'template' => "{input}",
        		
        ],
    ]); ?>
  
    <div>
     
      
      <?php  echo $form->field($searchModel, 'company_name')->widget(TypeaheadBasic::classname(), [
       		'data' => $companynameinfo,
       		'options' => ['placeholder' => 'Search CompanyNam','class'=>'desine'],
       		'pluginOptions' => ['highlight'=>true],]);?>
       		
     
     <?php   echo $form->field($searchModel, 'designation')->widget(TypeaheadBasic::classname(), [
       		'data' => $designationinfo,
       		'options' => ['placeholder' => 'Search Designation' ,'class'=>''],
       		'pluginOptions' => ['highlight'=>true],]);?>
    	
    
     <?php      echo $form->field($searchModel, 'Min_Experience')->widget(TypeaheadBasic::classname(), [
            'data' =>$MinExperienceinfo,
            'options' => ['placeholder' => 'Search Experience'],
            'pluginOptions' => ['highlight'=>true],]);?>
     
     
      <?php echo  $form->field($searchModel, 'skills')->widget(TypeaheadBasic::classname(), [
            'data' =>$skillsInfo,
          	
            'options' => ['placeholder' => 'Search skills'],
            'pluginOptions' => ['highlight'=>true],] ); ?>
 	 
       <?= Html::submitButton(Yii::t('app', 'search'), ['class' => 'btn btn-warning']) ?>
    
         <?php ActiveForm::end(); ?>
         </div>
 
    </div> 
	</section>

	<div class="sixteen columns">
   

		<p class="margin-bottom-25" style="float: left;">Total job postings are : <b style= "color:green;"><?php ?></b></p>


	
    <table class="manage-table responsive-table stacktable large-only">
      <tbody>
        <tr>
          <th><i class="fa fa-file-text"></i> Designation</th>
          <th><i class="fa fa-file-text"></i> Skills</th>
          <th><i class="fa fa-calendar"></i> Experience</th>
          <th><i class="fa fa-check-square-o"></i> Applicants</th>
          <th><i class="fa fa-calendar"></i> Date Posted</th>
          <th><i class="fa fa-user"></i> Applications</th>
          <th></th>
        </tr>
        <?php 
			echo ListView::widget( [
					'dataProvider' => $dataProvider,
					'itemView' => '_jobslist',
					'viewParams' => [Yii::$app->employer->employerid],
					'pager' => [
							 
							'prevPageLabel' => 'PREV',
							'nextPageLabel' => 'NEXT',
							'maxButtonCount' => 5,
							 
					],
					'layout' => "{items}\n{pager}",
			] );
			?>
      </tbody>
    </table>
  </div>
</div>
</div>


