<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Industrytype */

$this->title = 'Update Industrytype: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Industrytypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->industrytype_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="industrytype-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
