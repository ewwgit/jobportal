 <?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\JobpostSearch;

use frontend\models\Employerjobpostings;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;

use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>

<!-- Basic Page Needs
================================================== -->
<meta charset="utf-8">
<title>Work Scout</title>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/green.css" id="colors">

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body>
<div id="wrapper"> 
  
  <!-- Header
================================================== -->
 
 
  
  <!-- Banner
================================================== -->
  <div id="banner" class="with-transparent-header parallax background" style="background-image: url(images/banner-home-02.jpg)" data-img-width="2000"     data-img-height="1330" data-diff="300">
    <div class="container" >
      <div class="sixteen columns">
        <div class="search-container"> 
          
          <!-- Form -->
          <h2>Find job</h2>
          
          
          
           <?php $form = ActiveForm::begin([
        'action' => Url::to(['index']),
        'method' => 'get',
        'options' => ['class' => 'form-inline form-group form-group-sm col-xs-12'],
        'fieldConfig' => [
            'template' => "{input}",
        ],
    ]); ?>
  
    <nobr>
       <?php 
     
     echo $form->field($searchModel, 'company_name')->widget(TypeaheadBasic::classname(), [
    'data' => ArrayHelper::map(EmployerJobpostings::find()->all(), 'company_name','company_name'),
    'options' => ['placeholder' => 'enter CompanyName ...'],
    'pluginOptions' => ['highlight'=>true],
]);
 ?>
    
	 <?php 
     
     echo $form->field($searchModel, 'designation')->widget(TypeaheadBasic::classname(), [
    'data' => ArrayHelper::map(EmployerJobpostings::find()->all(), 'designation','designation'),
    'options' => ['placeholder' => 'enter Designation ...'],
    'pluginOptions' => ['highlight'=>true],
]);
 ?>
        <?php 
     
     echo $form->field($searchModel, 'Min_Experience')->widget(TypeaheadBasic::classname(), [
    'data' => ArrayHelper::map(EmployerJobpostings::find()->all(), 'Min_Experience','Min_Experience'),
    'options' => ['placeholder' => 'enter Experience ...'],
    'pluginOptions' => ['highlight'=>true],
]);
 
     
     ?>
       
	   <?php 
     
     echo $form->field($searchModel, 'skills')->widget(TypeaheadBasic::classname(), [
    'data' => ArrayHelper::map(EmployerJobpostings::find()->all(), 'skills','skills'),
    'options' => ['placeholder' => 'enter skills ...'],
    'pluginOptions' => ['highlight'=>true],
]);
 
     
     ?>
	 
        <?= Html::submitButton(Yii::t('app', 'search'), ['class' => 'btn btn-warning']) ?>
    </nobr>
         <?php ActiveForm::end(); ?>
                
           
       
         <!--   <input type="text" class="ico-01" placeholder="job title, keywords or company name" value=""/>
          <input type="text" class="ico-02" placeholder="city, province or region" value=""/> 
         <button><i class="fa fa-search"></i></button>-->
          
             
     
          <!-- Browse Jobs -->
       
          <div class="browse-jobs"> Browse job offers by <a href="browse-categories.html"> category</a> or <a href="#">location</a> </div>
          
          <!-- Announce -->
          <div class="announce"> We've over <strong>15 000</strong> job offers for you! </div>
        </div>
      </div>
    </div>
  </div>
	
  
  <!-- Content
================================================== --> 
  
  <!-- Categories -->
  
  
  <div class="container">
     
          <div class="sixteen columns">
    <p class="margin-bottom-25">Your listings are shown in the table
      below. Expired listings will be automatically removed after 30 days.</p>
    <table class="manage-table responsive-table stacktable large-only">
      <tbody>
        <tr>
          <th><i class="fa fa-file-text"></i> Designation</th>
          <th><i class="fa fa-file-text"></i> Skills</th>
          <th><i class="fa fa-calendar"></i> Experience</th>
          <th><i class="fa fa-check-square-o"></i> Filled?</th>
          <th><i class="fa fa-calendar"></i> Date Posted</th>
          <th><i class="fa fa-user"></i> Applications</th>
        </tr>
        <?php 
			echo ListView::widget( [
					'dataProvider' => $dataProvider,
					'itemView' => 'jobsview',
					'viewParams' => [],
					'pager' => [
							 
							'prevPageLabel' => 'PREV',
							'nextPageLabel' => 'NEXT',
							'maxButtonCount' => 5,
							 
					],
					'layout' => "{items}\n{pager}",
			] );
			?>
      </tbody>
    </table>
  </div>
  </div>
  <div class="clearfix" style="margin-bottom: 20px;"></div>
  <div class="container">
    <div class="sixteen columns">
      <h3 class="margin-bottom-25">Popular Categories</h3>
      <ul id="popular-categories">
        <li><a href="#"><i class="ln  ln-icon-Bar-Chart"></i> Accounting / Finance</a></li>
        <li><a href="#"><i class="ln ln-icon-Car"></i> Automotive Jobs</a></li>
        <li><a href="#"><i class="ln ln-icon-Worker"></i> Construction / Facilities</a></li>
        <li><a href="#"><i class="ln ln-icon-Student-Female"></i> Education Training</a></li>
        <li><a href="#"><i class="ln  ln-icon-Medical-Sign"></i> Healthcare</a></li>
        <li><a href="#"><i class="ln  ln-icon-Plates"></i> Restaurant / Food Service</a></li>
        <li><a href="#"><i class="ln  ln-icon-Globe"></i> Transportation / Logistics</a></li>
        <li><a href="#"><i class="ln  ln-icon-Laptop-3"></i> Telecommunications</a></li>
      </ul>
      <div class="clearfix"></div>
      <div class="margin-top-30"></div>
      <a href="browse-categories.html" class="button centered">Browse All Categories</a>
      <div class="margin-bottom-50"></div>
    </div>
  </div>
  <div class="container"> 
    
    <!-- Recent Jobs -->
    <div class="eleven columns">
      <div class="padding-right">
        <h3 class="margin-bottom-25">Recent Jobs</h3>
        <ul class="job-list">
          <li class="highlighted"><a href="job-page.html"> <img src="images/job-list-logo-01.png" alt="">
            <div class="job-list-content">
              <h4>Marketing Coordinator - SEO / SEM Experience <span class="full-time">Full-Time</span></h4>
              <div class="job-icons"> <span><i class="fa fa-briefcase"></i> King</span> <span><i class="fa fa-map-marker"></i> Sydney</span> <span><i class="fa fa-money"></i> $100 / hour</span> </div>
            </div>
            </a>
            <div class="clearfix"></div>
          </li>
          <li><a href="job-page.html"> <img src="images/job-list-logo-02.png" alt="">
            <div class="job-list-content">
              <h4>Core PHP Developer for Site Maintenance <span class="part-time">Part-Time</span></h4>
              <div class="job-icons"> <span><i class="fa fa-briefcase"></i> Cubico</span> <span><i class="fa fa-map-marker"></i> London</span> <span><i class="fa fa-money"></i> $50 / hour</span> </div>
            </div>
            </a>
            <div class="clearfix"></div>
          </li>
          <li><a href="job-page.html"> <img src="images/job-list-logo-03.png" alt="">
            <div class="job-list-content">
              <h4>Restaurant Team Member - Crew <span class="full-time">Full-Time</span></h4>
              <div class="job-icons"> <span><i class="fa fa-briefcase"></i> King</span> <span><i class="fa fa-map-marker"></i> Sydney</span> <span><i class="fa fa-money"></i> $15 / hour</span> </div>
            </div>
            </a>
            <div class="clearfix"></div>
          </li>
          <li><a href="job-page.html"> <img src="images/job-list-logo-04.png" alt="">
            <div class="job-list-content">
              <h4>Power Systems User Experience Designer <span class="internship">Internship</span></h4>
              <div class="job-icons"> <span><i class="fa fa-briefcase"></i> Hexagon</span> <span><i class="fa fa-map-marker"></i> London</span> <span><i class="fa fa-money"></i> $75 / hour</span> </div>
            </div>
            </a>
            <div class="clearfix"></div>
          </li>
          <li><a href="job-page.html"> <img src="images/job-list-logo-05.png" alt="">
            <div class="job-list-content">
              <h4>iPhone / Android Music App Development <span class="temporary">Temporary</span></h4>
              <div class="job-icons"> <span><i class="fa fa-briefcase"></i> Mates</span> <span><i class="fa fa-map-marker"></i> New York</span> <span><i class="fa fa-money"></i> $115 / hour</span> </div>
            </div>
            </a>
            <div class="clearfix"></div>
          </li>
        </ul>
        <a href="browse-jobs.html" class="button centered"><i class="fa fa-plus-circle"></i> Show More Jobs</a>
        <div class="margin-bottom-55"></div>
      </div>
    </div>
    
    <!-- Job Spotlight -->
    <div class="five columns">
      <h3 class="margin-bottom-5">Job Spotlight</h3>
      
      <!-- Navigation -->
      <div class="showbiz-navigation">
        <div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
        <div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
      </div>
      <div class="clearfix"></div>
      
      <!-- Showbiz Container -->
      <div id="job-spotlight" class="showbiz-container">
        <div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1" >
          <div class="overflowholder">
            <ul>
              <li>
                <div class="job-spotlight"> <a href="#">
                  <h4>Social Media: Advertising Coordinator <span class="part-time">Part-Time</span></h4>
                  </a> <span><i class="fa fa-briefcase"></i> Mates</span> <span><i class="fa fa-map-marker"></i> New York</span> <span><i class="fa fa-money"></i> $20 / hour</span>
                  <p>As advertising & content coordinator, you will support our social media team in producing high quality social content for a range of media channels.</p>
                  <a href="job-page.html" class="button">Apply For This Job</a> </div>
              </li>
              <li>
                <div class="job-spotlight"> <a href="#">
                  <h4>Prestashop / WooCommerce Product Listing <span class="freelance">Freelance</span></h4>
                  </a> <span><i class="fa fa-briefcase"></i> King</span> <span><i class="fa fa-map-marker"></i> London</span> <span><i class="fa fa-money"></i> $25 / hour</span>
                  <p>Etiam suscipit tellus ante, sit amet hendrerit magna varius in. Pellentesque lorem quis enim venenatis pellentesque.</p>
                  <a href="job-page.html" class="button">Apply For This Job</a> </div>
              </li>
              <li>
                <div class="job-spotlight"> <a href="#">
                  <h4>Logo Design <span class="freelance">Freelance</span></h4>
                  </a> <span><i class="fa fa-briefcase"></i> Hexagon</span> <span><i class="fa fa-map-marker"></i> Sydney</span> <span><i class="fa fa-money"></i> $10 / hour</span>
                  <p>Proin ligula neque, pretium et ipsum eget, mattis commodo dolor. Etiam tincidunt libero quis commodo.</p>
                  <a href="job-page.html" class="button">Apply For This Job</a> </div>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Testimonials -->
  <div id="testimonials"> 
    <!-- Slider -->
    <div class="container">
      <div class="sixteen columns">
        <div class="testimonials-slider">
          <ul class="slides">
            <li>
              <p>I have already heard back about the internship I applied through Job Finder, that's the fastest job reply I've ever gotten and it's so much better than waiting weeks to hear back. <span>Collis Ta�eed, Envato</span></p>
            </li>
            <li>
              <p>Nam eu eleifend nulla. Duis consectetur sit amet risus sit amet venenatis. Pellentesque pulvinar ante a tincidunt placerat. Donec dapibus efficitur arcu, a rhoncus lectus egestas elementum. <span>John Doe</span></p>
            </li>
            <li>
              <p>Maecenas congue sed massa et porttitor. Duis placerat commodo ex, ut faucibus est facilisis ac. Donec eleifend arcu sed sem posuere aliquet. Etiam lorem metus, suscipit vel tortor vitae. <span>Tom Smith</span></p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Infobox -->
  <div class="infobox">
    <div class="container">
      <div class="sixteen columns">Start Building Your Own Job Board Now <a href="my-account.html">Get Started</a></div>
    </div>
  </div>
  <h3 class="centered-headline">Clients Who Have Trusted Us <span>The list of clients who have put their trust in us includes:</span></h3>
  <div class="clearfix"></div>
  <div class="container">
    <div class="sixteen columns"> 
      
      <!-- Navigation / Left -->
      <div class="one carousel column">
        <div id="showbiz_left_2" class="sb-navigation-left-2"><i class="fa fa-angle-left"></i></div>
      </div>
      
      <!-- ShowBiz Carousel -->
      <div id="our-clients" class="showbiz-container fourteen carousel columns" > 
        
        <!-- Portfolio Entries -->
        <div class="showbiz our-clients" data-left="#showbiz_left_2" data-right="#showbiz_right_2">
          <div class="overflowholder">
            <ul>
              <!-- Item -->
              <li><img src="images/logo-01.png" alt="" /></li>
              <li><img src="images/logo-02.png" alt="" /></li>
              <li><img src="images/logo-03.png" alt="" /></li>
              <li><img src="images/logo-04.png" alt="" /></li>
              <li><img src="images/logo-05.png" alt="" /></li>
              <li><img src="images/logo-06.png" alt="" /></li>
              <li><img src="images/logo-07.png" alt="" /></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      
      <!-- Navigation / Right -->
      <div class="one carousel column">
        <div id="showbiz_right_2" class="sb-navigation-right-2"><i class="fa fa-angle-right"></i></div>
      </div>
    </div>
  </div>
  
  <!-- Footer
================================================== -->

  
  <!-- Back To Top Button -->
  <div id="backtotop"><a href="#"></a></div>
</div>
<!-- Wrapper / End --> 

<!-- Scripts
================================================== --> 
<script src="scripts/jquery-2.1.3.min.js"></script> 
<script src="scripts/custom.js"></script> 
<script src="scripts/jquery.superfish.js"></script> 
<script src="scripts/jquery.themepunch.tools.min.js"></script> 
<script src="scripts/jquery.themepunch.revolution.min.js"></script> 
<script src="scripts/jquery.themepunch.showbizpro.min.js"></script> 
<script src="scripts/jquery.flexslider-min.js"></script> 
<script src="scripts/chosen.jquery.min.js"></script> 
<script src="scripts/jquery.magnific-popup.min.js"></script> 
<script src="scripts/waypoints.min.js"></script> 
<script src="scripts/jquery.counterup.min.js"></script> 
<script src="scripts/jquery.jpanelmenu.js"></script> 
<script src="scripts/stacktable.js"></script> 
<script src="scripts/headroom.min.js"></script> 

<!-- Style Switcher
================================================== --> 
<script src="scripts/switcher.js"></script>
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
</html>