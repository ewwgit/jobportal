<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeslistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-list-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Employees List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            //'auth_key',
           // 'password_hash',
           // 'password_reset_token',
             'email:email',
             //'status',
//              'created_at',
//              'updated_at',
        		'createdDate',
             'updatedDate',
        		

           ['class' => 'yii\grid\ActionColumn',
            		'template' => ' {view}{update}{delete} ',
            		'buttons' => [
            			
            				'update' => function ($url,$data) {
            				$url = Url::to(['/employees/employees/employeeupdate','id'=>$data->id]);
            				return Html::a(
            						'<span class="glyphicon glyphicon-pencil"></span>',
            						$url);
            				},
            				
            		
            				],
    ],
        ],
    ]); ?>
</div>
