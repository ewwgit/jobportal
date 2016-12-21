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
?>
<div class="coachingvideoapi-index">

   
<section class="invoice">

		<p>
        <?= Html::a('Create postings', ['create'], ['class' => 'button'])?></p>
     <div>
  <?php $form = ActiveForm::begin([
        'action' => Url::to(['jobpostingslist']),
        'method' => 'get',
        'options' => ['class' => 'form-inline form-group form-group-sm col-xs-12'],
        'fieldConfig' => [
            'template' => "{input}",
        ],
    ]); ?>
  
    <div>
        
    <?php   $data =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'company_name','company_name');
       if($data){$data =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'company_name','company_name'); }
       else {$data = [''];}
       echo $form->field($searchModel, 'company_name')->widget(TypeaheadBasic::classname(), [
       		'data' => $data,
       		'options' => ['placeholder' => 'Search CompanyNam'],
       		'pluginOptions' => ['highlight'=>true],]);?>
       		
     <?php   $data =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'designation','designation');
       if($data){$data =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'designation','designation'); }
       else {$data = [''];}
       echo $form->field($searchModel, 'designation')->widget(TypeaheadBasic::classname(), [
       		'data' => $data,
       		'options' => ['placeholder' => 'Search Designation'],
       		'pluginOptions' => ['highlight'=>true],]);?>
    	
     <?php  $data =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'Min_Experience','Min_Experience');
        if($data){$data =  ArrayHelper::map(EmployerJobpostings::find()->all(), 'Min_Experience','Min_Experience');}
        else {$data =[''];}
        echo $form->field($searchModel, 'Min_Experience')->widget(TypeaheadBasic::classname(), [
            'data' =>$data,
            'options' => ['placeholder' => 'Search Experience ...'],
            'pluginOptions' => ['highlight'=>true],]);?>
            
     <?php 
        echo $form->field($searchModel, 'skills')->widget(TypeaheadBasic::classname(), [
            'data' =>$skillsInfo,
            'options' => ['placeholder' => 'Search skills ...'],
            'pluginOptions' => ['highlight'=>true],]);?>
 	 
      <?= Html::submitButton(Yii::t('app', 'search'), ['class' => 'btn btn-warning']) ?>
    
         <?php ActiveForm::end(); ?>
         </div>
 
    </div> 
	</section>

	<div class="sixteen columns">
    <p class="margin-bottom-25">Your listings are shown in the table
      below. Expired listings will be automatically removed after 30 days.</p>
    <table class="manage-table responsive-table stacktable large-only">
      <tbody>
        <tr>
          <th><i class="fa fa-file-text"></i> Designation</th>
          <th><i class="fa fa-file-text"></i> Skills</th>
          <th><i class="fa fa-calendar"></i> Experience</th>
          <th><i class="fa fa-check-square-o"></i> Filled?</th>
          <th><i class="fa fa-calendar"></i> Date Posted</th>
          <th><i class="fa fa-user"></i> Applications</th>
          <th></th>
        </tr>
        <?php 
			echo ListView::widget( [
					'dataProvider' => $dataProvider,
					'itemView' => '_jobslist',
					'viewParams' => [],
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

