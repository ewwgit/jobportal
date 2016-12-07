<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
$this->title = 'Signup';

?>
<style>
.required {
	color: #555 !important;
}
</style>

<div class="clearfix"></div>

<div id="titlebar" class="single">
	<div class="container">
		<div class="sixteen columns">
			<h2>Candidates Register</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="#">Home</a></li>
					<li>Candidates Register</li>
				</ul>
			</nav>
		</div>
	</div>
</div>

<div class="container">
	<div class="my-account">
		<ul class="tabs-nav">
			<li class="in-active"><a href="<?= Url::to(['/site/login'])?>" title="login">Login</a></li>
			<li class="active"><a href="<?= Url::to(['/site/signup'])?>" title="signup">Register</a></li>
		</ul>
		<div class="tabs-container">

          <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
         
          <p class="form-row form-row-wide">
            
              <?= $form->field($model, 'name')->textInput(['autofocus' => true])?>
           
           
             <?= $form->field($model, 'surname')->textInput(['autofocus' => true])?>
                
            
              <?= $form->field($model, 'username')->textInput(['autofocus' => true])?>
           
          </p>
				<p class="form-row form-row-wide">
           
             <?= $form->field($model, 'email')->textInput(['autofocus' => true])?>
            
          </p>
				<p class="form-row form-row-wide">
           
             <?= $form->field($model, 'password')->passwordInput()?>
            
          </p>
				<p class="form-row form-row-wide">
            
               <?= $form->field($model, 'confirmpassword')->passwordInput()?>
           
          </p>
				<p class="form-row form-row-wide">   
          
                 <?= $form->field($model, 'gender')->inline()->radioList(['male'=>'Male','female'=>'Female'],['prompt' =>'<---select gender--->'])?>

          </p>

				<p class="form-row form-row-wide">
				
				
				<div class="form-group">
				<?=$form->field ( $model, 'dateofbirth' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter birth date ...' ],'pluginOptions' => [ 'autoclose' => true ] ] )?>
          </p>

					<p class="form-row form-row-wide">
           
                  <?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true])?>
           
          </p>

					<p class="form-row form-row-wide">				
					
					<div class="form">
						<label for="password2">Profileimage</label> 
				    <?= $form->field($model, 'profileimage')->fileInput(['maxlength' => true])->label(false)?>
				   
				
					</div>
					</p>
					<p class="form-row">
               <?= Html::submitButton('Signup', ['class' => 'button border fw margin-top-10', 'name' => 'signup-button'])?>
          </p>

          <?php ActiveForm::end(); ?>
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

	<!-- Style Switcher-->

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