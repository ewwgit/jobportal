<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;
use frontend\models\JobpostSearch;

use yii\bootstrap\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;


$this->title = 'Job applied List';



?>

<div class="container">
	
	<!-- Table -->
	<div class="sixteen columns">

		<p class="margin-bottom-25" style="float: left;">Total job applications are : <b style= "color:green;"><?php echo  $total_list ?></b></p>


	</div>


	<div class="eight columns">
		<!-- Select -->
		<select data-placeholder="Filter by status" class="chosen-select-no-single">
			<option value="">Filter by status</option>
			<option value="new">New</option>
			<option value="interviewed">Interviewed</option>
			<option value="offer">Offer extended</option>
			<option value="hired">Hired</option>
			<option value="archived">Archived</option>
		</select>
		<div class="margin-bottom-15"></div>
	</div>

	<div class="eight columns">
		<!-- Select -->
		<select data-placeholder="Newest first" class="chosen-select-no-single">
			<option value="">Newest first</option>
			<option value="name">Sort by name</option>
			<option value="rating">Sort by rating</option>
		</select>
		<div class="margin-bottom-35"></div>
	</div>
<?php 
echo ListView::widget( [
		'dataProvider' => $dataProvider,
		'itemView' => '_jobseekerslist',
		'viewParams' => [],
		'pager' => [

				'prevPageLabel' => 'PREV',
				'nextPageLabel' => 'NEXT',
				'maxButtonCount' => 5,

		],
		'layout' => "{items}\n{pager}",
] );



?>

	<!-- Applications -->
</div>