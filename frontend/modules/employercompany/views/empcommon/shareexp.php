<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use yii\widgets\Breadcrumbs;

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use frontend\models\Employer;
use yii\helpers\Url;
use ijackua\sharelinks\ShareLinks;

$this->title = 'Employer Profile';

$this->params ['breadcrumbs'] [] = $this->title;
?>
<div class="socialShareBlock">
    <?=
    Html::a('<i class="icon-facebook-squared"></i>', $this->context->shareUrl(ShareLinks::SOCIAL_FACEBOOK),
        ['title' => 'Share to Facebook']) ?>
    <?=
    Html::a('<i class="icon-twitter-squared"></i>', $this->context->shareUrl(ShareLinks::SOCIAL_TWITTER),
        ['title' => 'Share to Twitter']) ?>
    <?=
    Html::a('<i class="icon-linkedin-squared"></i>', $this->context->shareUrl(ShareLinks::SOCIAL_LINKEDIN),
        ['title' => 'Share to LinkedIn']) ?>
    <?=
    Html::a('<i class="icon-gplus-squared"></i>', $this->context->shareUrl(ShareLinks::SOCIAL_GPLUS),
        ['title' => 'Share to Google Plus']) ?>
    <?=
    Html::a('<i class="icon-vkontakte"></i>', $this->context->shareUrl(ShareLinks::SOCIAL_VKONTAKTE),
        ['title' => 'Share to Vkontakte']) ?>
    <?=
    Html::a('<i class="icon-tablet"></i>', $this->context->shareUrl(ShareLinks::SOCIAL_KINDLE),
        ['title' => 'Send to Kindle']) ?>
</div>








