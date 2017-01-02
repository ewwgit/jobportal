<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Degrees */

$this->title = 'Create Degrees';
$this->params['breadcrumbs'][] = ['label' => 'Degrees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="degrees-create">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
