<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'My Package';
?>
<div class="container">
<div class="row">
<div class="col-md-4">
<?php $form = ActiveForm::begin()?>
<p class="form-row form-row-wide">Package : 
<select>
<option value="500">500</option>
<option value="1000">1000</option>
<option value="1500">1500</option>
</select>
</p>
 <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>
<?php ActiveForm::end(); ?>
</div>
</div>
</div>