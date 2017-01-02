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
       <script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
       <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<style>

label.radio-inline{display:inline-block;}
label.upload-btn i{color:#fff !important; margin-right:20px !important;}


</style>

  <!-- Header
================================================== -->
  <header class="sticky-header">
    <div class="container">
      <div class="sixteen columns"> 
        
        <!-- Logo -->
        <div id="logo">
          <h1><a href="<?=Yii::$app->getHomeUrl(); ?>"><img src="<?php echo Yii::getAlias('@web');?>/frontend/web/images/logo.png" alt="Work Scout" /></a></h1>
          
        </div>
      
         <nav id="navigation" class="menu" >
         
         <ul class="float-right">
		  <?php  if ((Yii::$app->user->isGuest)||(Yii::$app->employer->employerroleid !=2) )  {?>
            <li><a href="<?= Url::to(['/employercompany/empsite/signup'])?>"><i class="fa fa-user"></i> Sign Up</a></li>
            <li><a href="<?= Url::to(['/employercompany/empsite/login'])?>"><i class="fa fa-lock"></i> Log In</a></li>
            <li><a  href="<?= Url::to(['/employercompany/empsite/login'])?>"><i class="fa fa-user"></i>Employer Zone</a></li>
			
	       
	        <?php }else { ?>
	        
	         <li><a href="<?= Url::to(['/employercompany/empcommon/jobpostingslist'])?>" title="viewprofile">Employer JobPosting</a></li>
			    <li><a href="<?= Url::to(['/employercompany/empcommon/employercommonview'])?>" title="viewprofile">Employer Details</a></li>
               <li><a href="<?= Url::to(['empsite/logout'])?>"data-method="post" title="">Logout</a></li>
                 
		    <?php } ?>
		     </ul>
          </nav>
        <!-- Navigation -->
        <div id="mobile-navigation"> <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a> </div>
      </div>
    </div>
  </header>
  
  <div class="clearfix"></div>
  <div class="container" style="width: 100%;" >
  <div id="titlebar" class="single">
    <div class="container">
      <div class="twelve columns">
      <h1><?=  $this->params ['breadcrumbs'] [] = $this->title;?></h1>
      
         <?= 
   Breadcrumbs::widget([

      'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [''],
   ]) 
?> 
          <?= Alert::widget() ?>
      </div>
      
    </div>
  </div>
               <?= $content ?>
    </div>

	
	
	
  <!-- Footer
================================================== -->
  <div class="margin-top-30"></div>
  <div id="footer"> 
    <!-- Main -->
    <div class="container">
      <div class="seven columns">
        <h4>About</h4>
        <p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
        <a href="#" class="button">Get Started</a> </div>
      <div class="three columns">
        <h4>Company</h4>
        <ul class="footer-links">
          <li><a href="#">About Us</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Our Blog</a></li>
          <li><a href="#">Terms of Service</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Hiring Hub</a></li>
        </ul>
      </div>
      <div class="three columns">
        <h4>Press</h4>
        <ul class="footer-links">
          <li><a href="#">In the News</a></li>
          <li><a href="#">Press Releases</a></li>
          <li><a href="#">Awards</a></li>
          <li><a href="#">Testimonials</a></li>
          <li><a href="#">Timeline</a></li>
        </ul>
      </div>
      <div class="three columns">
        <h4>Browse</h4>
        <ul class="footer-links">
          <li><a href="#">Freelancers by Category</a></li>
          <li><a href="#">Freelancers in USA</a></li>
          <li><a href="#">Freelancers in UK</a></li>
          <li><a href="#">Freelancers in Canada</a></li>
          <li><a href="#">Freelancers in Australia</a></li>
          <li><a href="#">Find Jobs</a></li>
        </ul>
      </div>
    </div>
    
    <!-- Bottom -->
    <div class="container">
      <div class="footer-bottom">
        <div class="sixteen columns">
          <h4>Follow Us</h4>
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
            <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
            <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
          </ul>
          <div class="copyrights">©  Copyright 2015 by <a href="#">Work Scout</a>. All Rights Reserved.</div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Back To Top Button -->
  <div id="backtotop"><a href="#"></a></div>

<!-- Wrapper / End --> 

<!-- Scripts
================================================== --> 


<!-- Style Switcher
================================================== --> 

<div id="style-switcher">
  <h2>Style Switcher <a href="#"></a></h2>
  <div>
    <h3>Predefined Colors</h3>
    <ul class="colors" id="color1">
      <li><a href="#" class="green" title="Green"></a></li>
      <li><a href="#" class="blue" title="Blue"></a></li>
      <li><a href="#" class="orange" title="Orange"></a></li>
      <li><a href="#" class="navy" title="Navy"></a></li>
      <li><a href="#" class="yellow" title="Yellow"></a></li>
      <li><a href="#" class="peach" title="Peach"></a></li>
      <li><a href="#" class="beige" title="Beige"></a></li>
      <li><a href="#" class="purple" title="Purple"></a></li>
      <li><a href="#" class="celadon" title="Celadon"></a></li>
      <li><a href="#" class="pink" title="Pink"></a></li>
      <li><a href="#" class="red" title="Red"></a></li>
      <li><a href="#" class="brown" title="Brown"></a></li>
      <li><a href="#" class="cherry" title="Cherry"></a></li>
      <li><a href="#" class="cyan" title="Cyan"></a></li>
      <li><a href="#" class="gray" title="Gray"></a></li>
      <li><a href="#" class="olive" title="Olive"></a></li>
    </ul>
    <h3>Layout Style</h3>
    <div class="layout-style">
      <select id="layout-style">
        <option value="2">Wide</option>
        <option value="1">Boxed</option>
      </select>
    </div>
    <h3>Header Style</h3>
    <div class="layout-style">
      <select id="header-style">
        <option value="1">Style 1</option>
        <option value="2">Style 2</option>
        <option value="3">Style 3</option>
      </select>
    </div>
    <h3>Background Image</h3>
    <ul class="colors bg" id="bg">
      <li><a href="#" class="bg1"></a></li>
      <li><a href="#" class="bg2"></a></li>
      <li><a href="#" class="bg3"></a></li>
      <li><a href="#" class="bg4"></a></li>
      <li><a href="#" class="bg5"></a></li>
      <li><a href="#" class="bg6"></a></li>
      <li><a href="#" class="bg7"></a></li>
      <li><a href="#" class="bg8"></a></li>
      <li><a href="#" class="bg9"></a></li>
      <li><a href="#" class="bg10"></a></li>
      <li><a href="#" class="bg11"></a></li>
      <li><a href="#" class="bg12"></a></li>
      <li><a href="#" class="bg13"></a></li>
      <li><a href="#" class="bg14"></a></li>
      <li><a href="#" class="bg15"></a></li>
      <li><a href="#" class="bg16"></a></li>
    </ul>
    <h3>Background Color</h3>
    <ul class="colors bgsolid" id="bgsolid">
      <li><a href="#" class="green-bg" title="Green"></a></li>
      <li><a href="#" class="blue-bg" title="Blue"></a></li>
      <li><a href="#" class="orange-bg" title="Orange"></a></li>
      <li><a href="#" class="navy-bg" title="Navy"></a></li>
      <li><a href="#" class="yellow-bg" title="Yellow"></a></li>
      <li><a href="#" class="peach-bg" title="Peach"></a></li>
      <li><a href="#" class="beige-bg" title="Beige"></a></li>
      <li><a href="#" class="purple-bg" title="Purple"></a></li>
      <li><a href="#" class="red-bg" title="Red"></a></li>
      <li><a href="#" class="pink-bg" title="Pink"></a></li>
      <li><a href="#" class="celadon-bg" title="Celadon"></a></li>
      <li><a href="#" class="brown-bg" title="Brown"></a></li>
      <li><a href="#" class="cherry-bg" title="Cherry"></a></li>
      <li><a href="#" class="cyan-bg" title="Cyan"></a></li>
      <li><a href="#" class="gray-bg" title="Gray"></a></li>
      <li><a href="#" class="olive-bg" title="Olive"></a></li>
    </ul>
  </div>
  <div id="reset"><a href="#" class="button color">Reset</a></div>
</div>
</body>
<!-- <script type="text/javascript">
//     $(function () {
//         $('#datetimepicker8').datetimepicker({
// 			 useCurrent: false
// 			});
   

		
//     });
	

		
		
				

<!-- </script> -->

<?php $this->endBody() ?>


<?php $this->endPage() ?>

    