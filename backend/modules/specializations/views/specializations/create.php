<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Specializations */

$this->title = 'Create Specializations';
$this->params['breadcrumbs'][] = ['label' => 'Specializations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div
	class="specializations-create">

	

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
