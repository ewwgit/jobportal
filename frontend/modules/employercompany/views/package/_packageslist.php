<?php
use yii\helpers\Html;
?>
<div class="plan color-1  four columns testmemapp" id="newmne<?= $model->mem_id;?>">
		<div class="plan-price">
			<h3><?= $model->name;?></h3>
			<span class="plan-currency">$</span>
			<span class="value"><?= $model->cost;?></span>
			
		</div>
		<div class="plan-features">
			<ul>
				<li>Duration: <?= $model->duration;?> Days</li>
				<li>Number of jobs Posted: <?= $model->num_of_jobs_posting;?></li>
				
			</ul>
			<a class="button memcart" memcart = "<?= $model->mem_id;?>" id="<?= $model->mem_id;?>" href="#"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
		</div>
	</div>