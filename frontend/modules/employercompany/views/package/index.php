<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\ListView;
use yii\web\view;
use kartik\growl\Growl;

$this->title = 'My Package';
?>
<div class="container">
<?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
            <?php
            echo Growl::widget([
                'type' =>  $message['type'],
                'title' =>  Html::encode($message['title']),
                'icon' =>  $message['icon'],
                'body' =>  Html::encode($message['message']) ,
                'showSeparator' => true,
                'delay' => 1, //This delay is how long before the message shows
                'pluginOptions' => [
                    'delay' => $message['duration'], //This delay is how long the message shows for
                    'placement' => [
                        'from' => $message['positonY'],
                        'align' => $message['positonX'],
                    ]
                ]
            ]);
            ?>
        <?php endforeach; ?>

		
	
	
	<?php 
			echo ListView::widget( [
					'dataProvider' => $dataProvider,
					'itemView' => '_packageslist',
					'viewParams' => [],
					
					'layout' => "{items}",
			] );
			?>
</div>

<?php 
$updatePackageinfo = Yii::$app->urlManager->createUrl(['employercompany/package/updatepackageinfo']);
$this->registerJs ( "
		
		$(document.body).on('mouseover', '.testmemapp' ,function(){
		$(this).addClass('color-2');
		 
		});
		$(document.body).on('mouseout', '.testmemapp' ,function(){
		$(this).removeClass('color-2');
		 
		});
		
		$(document.body).on('click', '.memcart' ,function(){
		 var memid = $(this).attr('memcart');
		 
		
		$.ajax({
        url: '$updatePackageinfo',
        type: 'post',
        dataType : 'json',
		data:{memid : memid},
		success : function(data){	
	
		   if(data.status == 0)
           {
               $.growl({ title: '<span data-notify=\"icon\" class=\"fa fa-exclamation scicon\"></span>Warning!<hr class=\"successseperator\">', message: 'Already Applied this job.',duration:50000,location:'tc',style:'warning',size:'large' });
           }
           if(data.status == 1)
           {
        	
		    $.growl({ title: '<span data-notify=\"icon\" class=\"fa fa-check scicon\"></span>Success!<hr class=\"successseperator\">', message: 'Successfully Applied this job',duration:50000,location:'tc',style:'notice',size:'large' });
		    
           }
		
      } 
        
    }); 
		});
		
		
		
		
		
		

		", View::POS_READY, 'my-optionsnew' );
?>