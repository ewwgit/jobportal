<?php
use yii\helpers\Html;
use backend\models\EmployerPackages;

$packageInfoByUser = EmployerPackages::find()->where(['userId' => Yii::$app->employer->employerid,'status'=> 1])->one();
$activecls = '';
$isactivcls = 0;
if(!empty($packageInfoByUser))
{
	if($model->mem_id == $packageInfoByUser->mem_id)
	{
		$activecls = 'color-2';
		$isactivcls = 1;
	}
}

?>
<div class="plan color-1  four columns testmemapp <?= $activecls; ?>" id="newmne<?= $model->mem_id;?>" isactivenew ="<?= $isactivcls;?>">
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