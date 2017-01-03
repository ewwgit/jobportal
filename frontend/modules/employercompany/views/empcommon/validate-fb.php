<?php
use yii\helpers\Html;
?>
 
<div class="panel panel-body">
    <div class="page-header">
        <h1>Facebook API Test Results <small><a href="http://demos.krajee.com/social">yii2-social</a></small></h1>
    </div>
    <?= $out ?>    
    <hr>
    <?= Html::a('« Return', ['/site/social', '#' => 'facebook-api-example'], ['class'=>'btn btn-success']) ?>
</div>