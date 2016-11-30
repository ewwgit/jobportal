<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Employerjobpostings;


/* @var $this yii\web\View */
/* @var $model backend\models\Membershipdetails */

$this->title = 'Job posting Details view';
$this->params['breadcrumbs'][] = ['label' => 'Cancel Membership Details', 'url' => ['jobgrid']];
$this->params['breadcrumbs'][] = $this->title;

 	
?>
<div class="">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        		
           
        		[
        		
        		'attribute' => 'id',
        		'label' => 'Post Id',
        		'format'=>'raw',
        				
        		 
        	        		],
        		
        		[
        		'attribute' => 'company_name',
        		'label' => 'Company Name',
        		'format'=>'raw',
        				'options' => [
        						'class' => 'box',
        				],
        		        		],
        		
        		[
        		'attribute' => 'company_type',
        		'label' => 'CompanyType',
        		'format'=>'raw',
        	        		],
           
             	'rolecategory',
        		'skills',
        		'designation',
        		'experience',
        		'Description',
        		'jobtype',
        		'gender',
        		'address',
        		'industry_type',
        		'dateofestablishment',
                'country',
                'state',
                'city',
                'zipcode',
        	
        		
        		
        		]
    ]) ?>

</div>
    <div class="form-group" >
       <?= Html::a('Back', ['/employercompany/empcommon/jobpostingslist'], ['class'=>'btn btn-primary']) ?>
    </div>
   
   <style>
   .box {
	border-bottom-style: ridge;
	height:100px;                                   
	background-color: #8a2121;
}
   </style>
    
    

