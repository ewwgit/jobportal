<?php
use kartik\social\FacebookPlugin;
use yii\helpers\Url;

$this->title = 'Social Share';
$this->params ['breadcrumbs'] [] = $this->title;
//echo FacebookPlugin::widget(['type'=>FacebookPlugin::SHARE, 'settings' => []]);
?>
<div class="container">
<div class="row">
<div class="col-md-4">
<p class="form-row form-row-wide">Social Share buttons :</p>
<?= \bl\socialShare\widgets\SocialShareWidget::widget([
        'componentId' => 'socialShare',
        'url' => Url::toRoute(['empcommon/facebook'], true),
        'title' => 'Job Portal',
        'description' => 'Job seekers can browse through job openings posted by employers and apply for positions through the Job Portal....',
        'image' => Url::toRoute(['frontend/web/images/logo.png'], true)
    ]) ?>
</div>
</div>
</div>
    