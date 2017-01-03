<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Memberships */

$this->title = 'Create Memberships';
$this->params['breadcrumbs'][] = ['label' => 'Memberships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div
	class="memberships-create">

	

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
