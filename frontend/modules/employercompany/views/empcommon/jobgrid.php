<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Employerjobpostings;
use frontend\models\EmployerSkills;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->title = 'JOB Posting List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coachingvideoapi-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<section class="invoice">
 <h2><i class="fa fa-dashboard"></i> <?= Html::encode($this->title) ?></h2>
     <p>
        <?= Html::a('Create postings', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
 
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
        		
        		'rolecategory',
         		'skills',
        		'designation',
        		'experience',
        		//'Description',
        		//'jobtype',
        		'gender',
        	     //'address',
        		//'company_name',
        		'company_type',
        		'industry_type',
        		'dateofestablishment',
                 //	'country',
                 //	'state',
                 //	'city',
                 //	'zipcode',
          		['class' => 'yii\grid\ActionColumn',
        		'template' => '{view} {update} {delete} {POST}',
        		'buttons' => [
        				'view' => function ($url,$data) {
        					$url = Url::to(['empcommon/view','id'=>$data->id]);
        					return Html::a(
        							'<span class="glyphicon glyphicon-eye-open"></span>',
        							$url);
        				},
        				'update' => function ($url,$data) {
        				$url = Url::to(['empcommon/update','id'=>$data->id]);
        				return Html::a(
        						'<span class="glyphicon glyphicon-pencil"></span>',
        						$url);
        				},
        				'delete' => function ($url,$data) {
        				$url = Url::to(['empcommon/delete','id'=>$data->id]);
        				return Html::a(
        						'<span class="glyphicon glyphicon-trash"></span>',
        						$url);
        				},
        				'POST'=> function ($url,$data) {
        				$url = Url::to(['empcommon/jobpostingsview','id'=>$data->id]);
        				return Html::a(
        						'<span>post</span>',
        						$url);
        				},
        		
        				],
        				],
        ],
    ]); ?>

</section>
</div>

