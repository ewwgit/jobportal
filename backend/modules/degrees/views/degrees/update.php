<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Degrees */

$this->title = 'Update Degrees: ' . $model->degree_id;
$this->params['breadcrumbs'][] = ['label' => 'Degrees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->degree_id, 'url' => ['view', 'id' => $model->degree_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="degrees-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
