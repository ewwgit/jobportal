<?php
use kartik\social\FacebookPlugin;
use yii\helpers\Url;


echo FacebookPlugin::widget(['type'=>FacebookPlugin::SHARE, 'settings' => []]);
?>

<?= \bl\socialShare\widgets\SocialShareWidget::widget([
        'componentId' => 'socialShare',
        'url' => Url::toRoute(['empcommon/facebook'], true),
        'title' => 'Job Portal',
        'description' => 'Job seekers can browse through job openings posted by employers and apply for positions through the Job Portal....',
        'image' => Url::toRoute(['frontend/web/images/logo.png'], true)
    ]) ?>