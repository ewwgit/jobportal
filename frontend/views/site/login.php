<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';

?>

<div id="wrapper">

	<div class="clearfix"></div>

	<div id="titlebar" class="single">
		<div class="container">
			<div class="sixteen columns">
				<h2>Candidates Login</h2>
				<nav id="breadcrumbs">
					<ul>
						<li>You are here:</li>
						<li><a href="#">Home</a></li>
						<li>Candidates Login</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<!-- Container -->
	<div class="container">
		<div class="my-account">
			<ul class="tabs-nav">
				<li class=""><a href="<?= Url::to(['/site/login'])?>" title="login">Login</a></li>
				<li><a href="<?= Url::to(['/site/signup'])?>" title="signup">Register</a></li>
			</ul>
			<div class="tabs-container">
				<!-- Login -->
				<div class="tab-content" id="tab1" style="display: none;">
					<form method="post" class="login">
           <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <p class="form-row form-row-wide">

							<label for="username">Username: 
                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false)?>
              </label>
						</p>
						<p class="form-row form-row-wide">
							<label for="password">Password: 
             <?= $form->field($model, 'password')->passwordInput() ->label(false)?>
              </label>
						</p>
						<p class="form-row">
              
             
                    <?= $form->field($model, 'rememberMe')->checkbox()?>
               
            </p>

						<p class="form-row">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button','class' => 'button border fw margin-top-10'])?>

						
						<div style="color: #999; margin: 1em 0">
           <?= Html::a('Lost Your Password?', ['site/request-password-reset'])?>
                </div>
						</p>

            <?php ActiveForm::end(); ?>

          </form>
				</div>
			</div>
		</div>
	</div>
</div>

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
<script src="scripts/vendor-datepicker.js"></script>
<script src="scripts/vendor-date.js"></script>

<script src="scripts/switcher.js"></script>
<div id="style-switcher">
	<h2>
		Style Switcher <a href="#"></a>
	</h2>
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
	<div id="reset">
		<a href="#" class="button color">Reset</a>
	</div>
</div>






