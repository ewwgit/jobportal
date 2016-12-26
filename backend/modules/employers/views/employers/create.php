<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EmployersList */

$this->title = 'Create Employers List';
$this->params['breadcrumbs'][] = ['label' => 'Employers Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employers-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
