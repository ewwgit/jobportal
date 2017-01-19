<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\growl\Growl;
use yii\widgets\ListView;
$this->title = 'Browse By Categories';

?>
 
    <div id="titlebar" class="single">
    <div class="container">
      <div class="twelve columns">
        <h2>Category Information</h2>
        <nav id="breadcrumbs">
          <ul>
            <li>You are here:</li>
            <li><a href="#">Home</a></li>
            <li>Browse Jobs By Categories</li>
          </ul>
        </nav>
      </div>
      
    </div>
  </div>
  
  <div class="container">
  
  <ul>
  
  	<?php  echo ListView::widget( [
					'dataProvider' => $dataProvider,
					'itemView' => 'categoriesview',
					'viewParams' => [],
					'pager' => [
							 
							'prevPageLabel' => 'PREV',
							'nextPageLabel' => 'NEXT',
							'maxButtonCount' => 5,
							 
					],
					'layout' => "{items}\n{pager}",
			] );
		?>
	</ul>	
		
</div>		
 
 
 