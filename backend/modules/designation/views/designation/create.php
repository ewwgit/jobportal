<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Designation */

$this->title = 'Create Designation';
$this->params['breadcrumbs'][] = ['label' => 'Designations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designation-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
