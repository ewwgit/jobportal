<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeesList */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employees Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-list-view">

    

    <p>
        <?= Html::a('Update', ['employerupdate', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php if($model->employer->profileimage != ''){?>
  <?php $imgeurl = str_replace("backend","frontend",Yii::getAlias('@web')).$model->employer->profileimage;?>
						 		
						 		<?php  } ?>
						 	
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
        	 'username',
            'email:email',
        		['attribute'=>'profileimage',
        		'format' => 'html',
         		'value'=>Html::img($model->employer->profileimage ? $imgeurl : '@web/images/user-iconnew.png',['width' => '150px','height' => '150px']),
        			
         		//'htmlOptions'=>array('width'=>'40px'),
         		],
        		'employer.profileimage',
        		'employer.first_name',
        		'employer.last_name',
        		'employer.mobilenumber',
        		'employer.address',
        		'employer.gender',
        		'employer.dateofbirth',
        		'employer.designation',
        		
        		'employer.skills',
        		'employer.gender',
        		'status',
                'created_at',
                'updated_at',
        		[
        		'attribute'=>'employer.updatedDate',
        		'label' => 'Updated Date',
        		'format' =>  ['date', 'php:m/d/Y H:i:s'],
        		
        		],
        		[
        				'attribute'=>'employer.createdDate',
        				'label' => 'Created Date',
        				'format' =>  ['date', 'php:m/d/Y H:i:s'],
        		
        		],
            'roleid',
        ],
    ]) ?>

</div>
