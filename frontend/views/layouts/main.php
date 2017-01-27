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

   <header class="transparent sticky-header full-width">
  <!-- <header class="sticky-header">  -->
    <div class="container">
      <div class="sixteen columns"> 
        
        <!-- Logo -->
        <div id="logo">
          <h1><a href="<?php echo Yii::$app->getHomeUrl(); ?>"><img src="<?php echo Url::base();?>/frontend/web/images/logo2.png" alt="Work Scout" /></a></h1>
        </div>
        
        <!-- Menu -->
        <nav id="navigation" class="menu">
         
            <?php  if ((Yii::$app->user->isGuest)|| (Yii::$app->emplyoee->emplyoeeroleid !=3))  {?>
          <ul id="responsive">
         
            <li><a href="<?php echo Yii::$app->getHomeUrl(); ?>">Home</a> </li>
            <li><a href="#">About Us</a> </li>
            
            <!--<li><a href="#">Pages</a>
					<ul>
						<li><a href="job-page.html">Job Page</a></li>
						<li><a href="job-page-alt.html">Job Page Alternative</a></li>
						<li><a href="resume-page.html">Resume Page</a></li>
						<li><a href="shortcodes.html">Shortcodes</a></li>
						<li><a href="icons.html">Icons</a></li>
						<li><a href="pricing-tables.html">Pricing Tables</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</li>
-->
           <!-- <li><a href="#">Candidates</a>
              <ul>
                <li><a href="browse-jobs.html">Browse Jobs</a></li>
                <li><a href="browse-categories.html">Browse Categories</a></li>
                <li><a href="add-resume.html">Add Resume</a></li>
                <li><a href="manage-resumes.html">Manage Resumes</a></li>
                <li><a href="job-alerts.html">Job Alerts</a></li>
              </ul>
            </li>
            
            <!--<li><a href="#">For Employers</a>
					<ul>
						<li><a href="add-job.html">Add Job</a></li>
						<li><a href="manage-jobs.html">Manage Jobs</a></li>
						<li><a href="manage-applications.html">Manage Applications</a></li>
						<li><a href="browse-resumes.html">Browse Resumes</a></li>
					</ul>
				</li>-->
            
          </ul>
          <ul class="float-right">
       
      
            <li><a href="<?= Url::to(['/site/signup'])?>" title="signup"><i class="fa fa-user"></i> Sign Up</a></li>
            <li><a href="<?= Url::to(['/site/login'])?>" title="login"><i class="fa fa-lock"></i> Log In</a></li>
            <li><a href="<?= Url::to(['/employercompany/empsite/login'])?>" target="_blank"><i class="fa fa-user"></i>Employer Zone</a></li>
                 
          </ul>
            
 <?php }else { ?>
               <ul id="responsive" class="float-right">
               
               <li><a href="<?= Url::to(['site/viewprofile'])?>" title="viewprofile">Profile Information</a></li>
                <li><a href="<?= Url::to(['site/myjobs'])?>" title="applicationhistory">Application History</a></li>
                 <li><a href="<?= Url::to(['/site/logout'])?>"
            data-method="post" title="">Log Out</a></li>
            </ul>
               <?php } ?>
             
        </nav>
        
        <!-- Navigation -->
        <div id="mobile-navigation"> <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a> </div>
      </div>
    </div>
  </header>
   <div class="clearfix"></div>
   
	<div class="container" style="width: 100%;" >
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?php //echo Alert::widget() ?>
        <?= $content ?>
    </div>
    
    
    
    
<div class="margin-top-15"></div>
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
            <li><a class="facebook-footer" href="https://www.facebook.com/jobportal-1159301224119499"
								target="_blank" title="Facebook"><i class="icon-facebook"></i></a></li>
            <li><a class="twitter-footer" href="https://twitter.com/jobportal" target="_blank"
								title="Twitter"><i class="icon-twitter"></i></a></li>
             <li><a class="gplus" href="https://plus.google.com/jobportal-604006204304-vjl6qpcvb32fb1dsufoh1sjujpijdvfq.apps.googleusercontent.com"
								target="_blank" title="Google+"><i class="icon-gplus"></i></a></li>
            <li><a class="linkedin-footer" href="https://www.linkedin.com/jobportal-81b871j1q04ctq"
								target="_blank" title="Linkedin"><i class="icon-linkedin"></i></a></li>
          </ul>
          <div class="copyrights">&copy; Copyright 2016 by <a href="#">Anaghasoftech</a>. All Rights Reserved.</div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Back To Top Button -->
  <div id="backtotop"><a href="#"></a></div>
</div>
<!-- Wrapper / End --> 

<!-- Scripts-->
<!-- Scripts-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
    