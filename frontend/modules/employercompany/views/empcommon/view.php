<?php
use kartik\social\FacebookPlugin;
use yii\helpers\Url;


echo FacebookPlugin::widget(['type'=>FacebookPlugin::SHARE, 'settings' => []]);
?>

<?= \bl\socialShare\widgets\SocialShareWidget::widget([
        'componentId' => 'socialShare',
        'url' => Url::toRoute(['site/index'], true),
        'title' => 'Black Lamp - digital agancy',
        'description' => 'Black Lamp provides a comprehensive range of services for development...',
        'image' => Url::toRoute(['/logo.png'], true)
    ]) ?>