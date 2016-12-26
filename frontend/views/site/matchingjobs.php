<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\MatchingJobsearch;

use frontend\models\Employerjobpostings;

$this->title = 'Matching Jobs Page';
$this->params['breadcrumbs'][] = $this->title;
?>
  <?php $form = ActiveForm::begin([
        'action' => Url::to(['matchingjobs']),
        'method' => 'get',
        'options' => ['class' => 'form-inline form-group col-xs-12'],
        'fieldConfig' => [
            'template' => "{input}",
        ],
    ]); ?>

  
  <div class="container">
     
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
          <th><i class="fa fa-calendar"></i>Joblocation</th>
          <th><i class="fa fa-user"></i> Applications</th>
        </tr>
        <?php 
			echo ListView::widget( [
					'dataProvider' => $dataProvider,
					'itemView' => 'matchingjobsview',
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

       






