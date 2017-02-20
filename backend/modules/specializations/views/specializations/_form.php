<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Specializations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="specializations-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group col-lg-7 col-sm-12">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true])?>
    </div>
	<div class="form-group col-lg-7 col-sm-12">
    <?= $form->field($model, 'description')->textInput(['maxlength' => true])?>
    </div>
	<div class="form-group col-lg-7 col-sm-12">
    <?= $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => ''])?>
    </div>
	<div class="form-group col-lg-7 col-sm-12">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
