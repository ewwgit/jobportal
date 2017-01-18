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


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
