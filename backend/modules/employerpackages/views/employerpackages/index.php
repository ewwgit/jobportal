<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployerPackagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employer Packages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div
	class="employer-packages-index">

	
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employer Packages', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'employer_pid',
            'userId',
            'mem_id',
            'startDate',
            'endDate',
            // 'status',
            // 'createdDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
