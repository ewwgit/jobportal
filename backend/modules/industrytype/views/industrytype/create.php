<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Industrytype */

$this->title = 'Create Industrytype';
$this->params['breadcrumbs'][] = ['label' => 'Industrytypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industrytype-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
