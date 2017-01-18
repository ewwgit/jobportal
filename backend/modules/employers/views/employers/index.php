<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployerslistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employers Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employers-list-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employers List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'employerid',
            'first_name',
        	'last_name',
            'mobilenumber',
            'dateofbirth',
            'gender:ntext',
            // 'designation',
            // 'address:ntext',
            // 'userid',
            // 'profileimage',
            // 'create_date',
            // 'updated_date',
            // 'skills',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
