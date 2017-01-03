<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MembershipsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Memberships';
$this->params['breadcrumbs'][] = $this->title;
?>
<div
	class="memberships-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Memberships', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'mem_id',
            'name',
            'description:ntext',
            'duration',
            'cost',
            // 'type',
            // 'num_of_jobs_posting',
            // 'status',
            // 'createdDate',
            // 'updatedDate',
            // 'createdBy',
            // 'updatedBy',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
