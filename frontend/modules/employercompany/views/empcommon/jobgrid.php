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

$this->title = 'JOB Posting List';
$this->params ['breadcrumbs'] [] = $this->title;
?>
<div class="coachingvideoapi-index">

   
<section class="invoice">

		<p>
        <?= Html::a('Create postings', ['create'], ['class' => 'button'])?>
      
        
  <?php $form = ActiveForm::begin([
        'action' => Url::to(['jobpostingslist']),
        'method' => 'get',
        'options' => ['class' => 'form-inline form-group form-group-sm col-xs-12'],
        'fieldConfig' => [
            'template' => "{input}",
        ],
    ]); ?>
  
    <nobr>
        Designation:<?= $form->field($searchModel, 'designation')->dropDownList(ArrayHelper::map(EmployerJobpostings::find()->all(), 'designation','designation'), ['prompt'=>Yii::t('yii', 'search designation...')])  ?>
        Experience:<?= $form->field($searchModel, 'Min_Experience')->dropDownList(ArrayHelper::map(EmployerJobpostings::find()->all(), 'Min_Experience','Min_Experience'), ['prompt'=>Yii::t('yii', 'search Experience...')])  ?>
        Skills:<?= $form->field($searchModel, 'skills')->dropDownList(ArrayHelper::map(EmployerJobpostings::find()->all(), 'skills','skills'), ['prompt'=>Yii::t('yii', 'search 	skills...')])  ?>
        <?= Html::submitButton(Yii::t('app', 'search'), ['class' => 'btn btn-warning']) ?>
    </nobr>
         <?php ActiveForm::end(); ?>
 
    </p> 
	</section>

	<div class="sixteen columns">
    <p class="margin-bottom-25">Your listings are shown in the table
      below. Expired listings will be automatically removed after 30 days.</p>
    <table class="manage-table responsive-table stacktable large-only">
      <tbody>
        <tr>
          <th><i class="fa fa-file-text"></i> Title</th>
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

