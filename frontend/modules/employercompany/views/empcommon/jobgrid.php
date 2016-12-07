<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Employerjobpostings;
use frontend\models\EmployerSkills;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;

$this->title = 'JOB Posting List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coachingvideoapi-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<section class="invoice">
 
     <p>
        <?= Html::a('Create postings', ['create'], ['class' => 'button']) ?>
    </p>
</section>

<div class="sixteen columns">

		<p class="margin-bottom-25">Your listings are shown in the table below. Expired listings will be automatically removed after 30 days.</p>

		<table class="stacktable small-only"><tbody><tr class="st-space"><td></td><td></td></tr><tr class="st-new-item"><td class="st-key"><i class="fa fa-file-text"></i> Title</td><td class="st-val st-head-row"><a href="#">Marketing Coordinator - SEO / SEM Experience <span class="pending">(Pending Approval)</span></a></td></tr><tr><td class="st-key"><i class="fa fa-check-square-o"></i> Filled?</td><td class="st-val">-</td></tr><tr><td class="st-key"><i class="fa fa-calendar"></i> Date Posted</td><td class="st-val">September 30, 2015</td></tr><tr><td class="st-key"><i class="fa fa-calendar"></i> Date Expires</td><td class="st-val">October 10, 2015</td></tr><tr><td class="st-key"><i class="fa fa-user"></i> Applications</td><td class="st-val">-</td></tr><tr><td class="st-key"></td><td class="st-val">
					<a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
				</td></tr><tr class="st-space"><td></td><td></td></tr><tr class="st-new-item"><td class="st-key"><i class="fa fa-file-text"></i> Title</td><td class="st-val st-head-row"><a href="#">Web Developer - Front End Web Development, Relational Databases</a></td></tr><tr><td class="st-key"><i class="fa fa-check-square-o"></i> Filled?</td><td class="st-val">-</td></tr><tr><td class="st-key"><i class="fa fa-calendar"></i> Date Posted</td><td class="st-val">September 30, 2015</td></tr><tr><td class="st-key"><i class="fa fa-calendar"></i> Date Expires</td><td class="st-val">October 10, 2015</td></tr><tr><td class="st-key"><i class="fa fa-user"></i> Applications</td><td class="st-val"><a href="manage-applications.html" class="button">Show (4)</a></td></tr><tr><td class="st-key"></td><td class="st-val">
					<a href="#"><i class="fa fa-pencil"></i> Edit</a>
					<a href="#"><i class="fa  fa-check "></i> Mark Filled</a>
					<a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
				</td></tr><tr class="st-space"><td></td><td></td></tr><tr class="st-new-item"><td class="st-key"><i class="fa fa-file-text"></i> Title</td><td class="st-val st-head-row"><a href="#">Power Systems User Experience Designer</a></td></tr><tr><td class="st-key"><i class="fa fa-check-square-o"></i> Filled?</td><td class="st-val"><i class="fa fa-check"></i></td></tr><tr><td class="st-key"><i class="fa fa-calendar"></i> Date Posted</td><td class="st-val">May 16, 2015</td></tr><tr><td class="st-key"><i class="fa fa-calendar"></i> Date Expires</td><td class="st-val">June 30, 2015</td></tr><tr><td class="st-key"><i class="fa fa-user"></i> Applications</td><td class="st-val"><a href="manage-applications.html" class="button">Show (9)</a></td></tr><tr><td class="st-key"></td><td class="st-val">
					<a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
				</td></tr></tbody></table><table class="manage-table responsive-table stacktable large-only">

			<tbody><tr>
				<th><i class="fa fa-file-text"></i> Title</th>
				<th><i class="fa fa-check-square-o"></i> Filled?</th>
				<th><i class="fa fa-calendar"></i> Date Posted</th>
				<th><i class="fa fa-calendar"></i> Date Expires</th>
				<th><i class="fa fa-user"></i> Applications</th>
				<th></th>
			</tr>
					
				
			
			

			<?php 
			echo ListView::widget( [
					'dataProvider' => $dataProvider,
					'itemView' => '_jobslist',
					'viewParams' => [],
					'pager' => [
							 
							'prevPageLabel' => 'PREV',
							'nextPageLabel' => 'NEXT',
							'maxButtonCount' => 5,
							 
					],
					'layout' => "{items}\n{pager}",
			] );
			?>
			

		</tbody></table>

		

	</div>
</div>

