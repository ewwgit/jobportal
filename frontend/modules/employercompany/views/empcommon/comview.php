<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\file\FileInput;

$this->title = 'Employer Profile';

$this->params ['breadcrumbs'] [] = $this->title;
?>
<style>
.required {
	color: #333 !important;
}

select {
	height: 40px !important;
}
</style>


<div class="container"> 
    <?php $form = ActiveForm::begin(['id' => 'form-employee']); ?>
    <!-- Submit Page -->
	<div class="sixteen columns">
		<div class="submit-page" style="padding: 0px;">
			<div class="container">
				<div class="col-md-3 col-sm-3 col-xs-3 profile_img">
					<div class="form">
						<h5>Upload Your Profile image</h5>
						<img class='image'
							src="<?php echo Yii::getAlias('/jobportal').$model->profileimagenew; ?>"
							width="100" height="100"> </img> 
            <?=$form->field ( $model, 'profileimage' )->widget ( FileInput::classname (), [ 'options' => [ 'accept' => 'image/*' ],'pluginOptions' =>[[ 'browseLabel' => 'Profile Image', 'allowedFileExtensions'=>['jpg','png','jpeg'] ]] ] )->label ( false );?>
           
               
						</div>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Add Your Personal Details</h4>
								</div>
								<!-- Email -->
								<div class="form">
									
										<?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Name'])?>
									</div>

								<!-- Email -->
								<div class="form">
									
									  <?= $form->field($model, 'username')->textInput(['autofocus' => true])?>
									</div>

								<!-- Title -->
								<div class="form">
									
										<?= $form->field($model, 'email')->textInput(['autofocus' => true,'placeholder' => 'Email'])?>
									</div>

								<!-- Location -->
								<div class="form">
									
											<?= $form->field($model, 'address')->textInput(['autofocus' => true])?>
									</div>
								<div class="form-group">
									
										
									 <?= $form->field($model, 'gender')->inline()->radioList(['male'=>'Male','female'=>'Female'],['prompt' =>'<---select gender--->'])?>
									</div>
								<div class="form">
									
								 
								  <?=$form->field ( $model, 'dateofbirth' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter birth date ...' ],'pluginOptions' => [ 'autoclose' => true ] ])?>
									</div>
									<div class="form">
									
								    <?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true])?>
									</div>
									<div class="form">
									
								     <?= $form->field($model, 'designation')->textInput(['autofocus' => true])?>
									</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Add Your Educational Details</h4>
								</div>
								<div class="form">
									
										<?=$form->field ( $model, 'higherdegree' )->dropDownList ( [ 'B-Tech/B.E.' => 'B-Tech/B.E.','B.Sc' => 'B.Sc','B.Ed' => 'B.Ed','BDS' => 'BDS','BFA' => 'BFA','B.Pharma' => 'B.Pharma','B.A' => 'B.A','B.Com' => 'B.Com','BCA' => 'BCA','Other' => 'Other' ], [ 'prompt' => 'select your Highdegree' ] )?>
									</div>

								<!-- Email -->
								<div class="form">
									
										<?=$form->field ( $model, 'specialization' )->dropDownList ( [ 'Computers' => 'Computers','Chemical' => 'Chemical','Civil' => 'Civil','Electrical' => 'Electrical','Electronics/Telecommunication' => 'Electronics/Telecommunication','Automobile' => 'Automobile','Agricultural' => 'Agricultural','Mechanical' => 'Mechanical','Mining' => 'Mining','BioMedical' => 'BioMedical','Other' => 'Other' ], [ 'prompt' => 'select your Specilization' ] )?>
									</div>

								<!-- Email -->
								<div class="form">
									
										<?= $form->field($model, 'university')->textInput(['autofocus' => true])?>
									</div>

								<!-- Title -->
								<div class="form">
									
										<?= $form->field($model, 'collegename')->textInput(['autofocus' => true])?>
									</div>
								<div class="form">
									
										<?= $form->field($model, 'passingyear')->textInput(['autofocus' => true])?>
									</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Add Your Job Preferences Details</h4>
								</div>
								
								<div class="form">
									
										<?=$form->field ( $model, 'job_role' )->dropDownList ( [ 'Software Developer' => 'Software Developer','System Analyst' => 'System Analyst','Project Lead' => 'Project Lead','Testing Engineer' => 'Testing Engineer','Database Designer' => 'Database Designer','Product Manager' => 'Product Manager','System Admin' => 'System Admin' ], [ 'prompt' => 'select your jobrole' ] )?>
									</div>
								<div class="form">
									
										<?=$form->field ( $model, 'job_location' )->dropDownList ( [ 'Hyderabad/Secundrabad' => 'Hyderabad/Secundrabad','Banglore' => 'Banglore','Chennai' => 'Chennai','Mumbai' => 'Mumbai','Pune' => 'Pune','Gurgon' => 'Gurgon','Delhi' => ' Delhi' ], [ 'prompt' => 'select your joblocation' ] )?>
									</div>
								
								<div class="form">
									
										<?= $form->field($model, 'expected_salary')->textInput(['autofocus' => true])?>
									</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Add Your Employement Details</h4>
								</div>
					
								<div class="form">
									
									<?= $form->field($model, 'job_title')?>	
									</div>

								<!-- Email -->
								<div class="form">
									
									  <?= $form->field($model, 'job_type')->inline()->radioList(['full time' =>'Full time' , 'part time' =>'Part time'],['prompt' =>'select'])?>
									</div>

								<!-- Email -->
								<div class="form">
									
									 <?= $form->field($model, 'job_description')->textarea(['rows' => 6])?>
									</div>

								<!-- Title -->
								<div class="form">
									
									 <?= $form->field($model, 'experience')->dropDownList(['6Months' =>'6Months' , '1year' =>'1year', '2years' =>'2years' , '3years' =>'3years' , '4years' =>'4years'],['prompt' =>'select','id' => 'employeeform-highdegree'])?> 
									</div>
								<div class="form">
									
										 <?= $form->field($model, 'no_of_openings')->dropDownList(['10' =>'10' , '20' =>'20', '20' =>'20' , '50' =>'50' , '100' =>'100'],['prompt' =>'select','id' => 'employeeform-highdegree'])?>
									</div>
								<div class="form">
									
									 <?= $form->field($model, 'shift_timings')->inline()->radioList(['DayShift' =>'DayShift' , 'NightShift' =>'NightShift'])?>
									</div>
								<div class="form">
									
									 <?= $form->field($model, 'work_location')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select','id' => 'employeeform-highdegree'])?>
									</div>
								<div class="form">
									
										 <?= $form->field($model, 'weekly_days')->textInput(['maxlength' => true])?>
									</div>
				
				
								<div class="form">
									
										 <?= $form->field($model, 'salary')->textInput(['maxlength' => true])?>
									</div>
								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Add Your Skills Details</h4>
								</div>
									<div class="form">
									
										  <?= $form->field($model, 'requirment')->textInput(['autofocus' => true]);?>
									</div>
									<div class="form">
									
										 <?= $form->field($model, 'companytype')->inline()->radioList(['corporate' =>'Corporate' , 'consultant' =>'Consultant'],['prompt' =>'<---select--->']);?>
									</div>
									<div class="form">
									
										   <?= $form->field($model, 'jobtype')->inline()->radioList(['full time' =>'Full time' , 'part time' =>'Part time'],['prompt' =>'select']);?>
									</div>
								
							</div>
						</div>
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Add Your Employer Details</h4>
								</div>
								<div class="form">
									
										<?= $form->field($model, 'company_name')->textInput(['autofocus' => true,'placeholder' => 'Employer Name'])?>
									</div>
								<div class="form">
									
											<?= $form->field($model, 'company_type')->inline()->radioList(['CurrentEmployer'=>'CurrentEmployer','PreviousEmployer'=>'PreviousEmployer','OtherEmployer' =>'OtherEmployer'])?>
									</div>
								<div class="form">
									
										<?= $form->field($model, 'industry_type')->dropDownList(['Accounting/Consulting/Taxation' =>'Accounting/Consulting/Taxation' , 'Advertising/Event Management/PR' =>'Advertising/Event Management/PR', 'Animation / Gaming' =>'Animation / Gaming' , 'Entertainment/Media/Publishing/Dotcom' =>'Entertainment/Media/Publishing/Dotcom' , 'Banking/FinancialServices/Broking' =>'Banking/FinancialServices/Broking' , 'Software Services' =>'Software Services' , 'Machinery/Equipment Manufacturing/Industrial Products' =>'Machinery/Equipment Manufacturing/Industrial Products' , 'Education/Training/Teaching' =>'Education/Training/Teaching'],['prompt' =>'select','id' => 'employeeform-highdegree']);?>
									</div>
									<div class="form">
									
									<?=$form->field ( $model, 'dateofestablishment' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter birth date ...' ],'pluginOptions' => [ 'autoclose' => true ] ] );?>
											
									</div>
									<div class="form">
									
											  <?=$form->field ( $model, 'location' )->dropDownList ( [ 'Hyderabad/Secundrabad' => 'Hyderabad/Secundrabad','Banglore' => 'Banglore','Chennai' => 'Chennai','Mumbai' => 'Mumbai','Pune' => 'Pune','Gurgon' => 'Gurgon','Delhi' => ' Delhi' ], [ 'prompt' => 'select your joblocation','id' => 'employeeform-highdegree' ] );?>
									</div>
									<div class="form">
									
										 <?= $form->field($model, 'country')->dropDownList(['Afghanistan' =>'Afghanistan' , 'Brazil' =>'Brazil', 'Bulgaria' =>'Bulgaria' , 'Canada' =>'Canada' , 'India' =>'India' , 'United Kingdom' =>'United Kingdom' , 'USA' =>'USA' , 'Rome' =>'Rome'],['prompt' =>'select','id' => 'employeeform-highdegree']);?>
									</div>
									<div class="form">
									
										 <?= $form->field($model, 'state')->dropDownList(['Himachal Pradesh' =>'Himachal Pradesh' , 'Andrapradesh' =>'Andrapradesh', 'Italy' =>'Italy' , 'California' =>'California' , 'Sweden' =>'Sweden' , 'Newyork' =>'Newyork' , 'parise' =>'parise'],['prompt' =>'select','id' => 'employeeform-highdegree']);?>
									</div>
									<div class="form">
									
										 <?= $form->field($model, 'city')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select','id' => 'employeeform-highdegree']);?>
									</div>
									<div class="form">
									
										 <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true]);?>
									</div>
							</div>
						</div>
					</div>

			</div>
			<div class="clearfix"></div>
			<div class="divider margin-top-0 padding-reset"></div>
				<?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button','class' => 'button border fw margin-top-10','style' => 'float:right'])?>
				
			</div>
	</div>

    <?php ActiveForm::end(); ?>
  </div>
  </div>




<!-- Footer
================================================== -->



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
<script src="scripts/vendor-datepicker.js"></script>
<script src="scripts/vendor-date.js"></script>

<!-- WYSIWYG Editor -->
<script type="text/javascript"
	src="scripts/jquery.sceditor.bbcode.min.js"></script>
<script type="text/javascript" src="scripts/jquery.sceditor.js"></script>

<!-- Style Switcher
================================================== -->
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

