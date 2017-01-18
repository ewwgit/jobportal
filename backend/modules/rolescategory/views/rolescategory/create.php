<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RolesCategory */

$this->title = 'Create Roles Category';
$this->params['breadcrumbs'][] = ['label' => 'Roles Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div
	class="roles-category-create">

	<h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
