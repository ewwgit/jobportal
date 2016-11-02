<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="meta">																																																																																																																					<div class="inner_copy"><a href="http://ecommercebuilders.blogspot.com/2015/10/best-free-ecommerce-website-builders.html">http://ecommercebuilders.blogspot.com/2015/10/best-free-ecommerce-website-builders.html</a></div>
		<div class="metalinks">
			<a href="#"><img src="images/meta1.gif" alt="" width="15" height="14"></a>
			<a href="#"><img src="images/meta2.gif" alt="" width="17" height="14"></a>
			<a href="#"><img src="images/meta3.gif" alt="" width="17" height="14"></a>
			<a href="#"><img src="images/meta4.gif" alt="" width="15" height="14"></a>
		</div>
		<p>Recruiters: <a href="#">Log in</a> or <a href="#">Find out more</a></p>																																															
	</div>
	<div id="header">
		<a href="index.html" class="logo"><img src="images/logo.jpg" alt="setalpm" width="149" height="28" /></a>                                                                                                                                                                                                                                      
		<span class="slogan">Your Key to Success</span>
		<ul id="menu">
		
		     <?php  if (Yii::$app->user->isGuest) { ?> 
			<li><a href="<?php echo Yii::$app->getHomeUrl(); ?>">Home</a></li>
					
			<li><a href="<?= Url::to(['/site/signup'])?>" title="sign in">Employee-register</a></li>
			
			<li><a href="<?= Url::to(['/site/login'])?>" title="login">Employee-login</a></li>
			<?php }else { ?>
			<li><a href="<?= Url::to(['/common/employee'])?>" title="viewprofile">EmployeeProfile</a></li>
			
			<!--  <li><a href="<?= Url::to(['/user/profile'])?>" title="profile">Profile</a></li>
            <li><a href="<?= Url::to(['/user/education'])?>" title="education">Education</a></li>
              
             
              <li><a href="<?= Url::to(['/user/eduprofile'])?>" title="education">EduProfile</a></li>
               <li><a href="<?= Url::to(['/user/preferences'])?>" title="preferences">Preferences</a></li>
               <li><a href="<?= Url::to(['/user/jobprofile'])?>" title="jobprofile">PreProfile</a></li>-->
                
               
                <li><a href="<?= Url::to(['/site/viewprofile'])?>" title="viewprofile">View</a></li>
               <li><a href="<?= Url::to(['/site/logout'])?>"
            data-method="post" title="">Logout</a></li>
            <?php } ?>
			
			
		</ul>
		</div>
	
	<div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
      <div class="container">
    <footer class="footer">
  
       <div id="footer">																																																																																																																							<div class="inner_copy"><a href="https://www.engadget.com/2015/12/04/top-10-website-builders-for-small-business/">top 10 website builders for small business</a></div>
		Copyright &copy;. All rights reserved. Design by <a href="http://www.bestfreetemplates.info" target="_blank" title="Free CSS templates">BFT</a> 																																																						 
	

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
  
</footer>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
    