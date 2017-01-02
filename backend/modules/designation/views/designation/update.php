<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Designation */

$this->title = 'Update Designation: ' . $model->designation_id;
$this->params['breadcrumbs'][] = ['label' => 'Designations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->designation_id, 'url' => ['view', 'id' => $model->designation_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="designation-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
