<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use yii\widgets\Breadcrumbs;

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use frontend\models\Employer;
use yii\helpers\Url;
use backend\models\Specializations;
use backend\models\Designation;
use backend\models\Degrees;
$this->title = 'Employer Profile';


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
    <?php $form = ActiveForm::begin([ 
		'options' => [ 
				'enctype' => 'multipart/form-data' 
		] 
]); ?>
    <!-- Submit Page -->
	<div class="sixteen columns">

		<div class="submit-page" style="padding: 0px;">
		
			<div class="container">
				<div class="col-md-3 col-sm-3 col-xs-3 profile_img">
					<div class="form">
						<h5>Upload Your Profile image</h5>
						<img class='image'
							src="
							
							<?php
							if($model->profileimagenew){
								echo isset( $model->profileimagenew)? Url::base().$model->profileimagenew : '' ;
							
							}else {
									 echo Url::base()."/frontend/web/images/user-iconnew.png" ;
								      }
								?>"
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
								<h5>First Name</h5>
									
										<?= $form->field($model, 'first_name')->textInput(['autofocus' => true])->label(false)?>
									</div>
									<div class="form">
									<h5>Last Name</h5>
										<?= $form->field($model, 'last_name')->textInput(['autofocus' => true])->label(false)?>
									</div>

								<!-- Email -->
								<div class="form">
									<h5>User Name</h5>
									  <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false)?>
									</div>

								<!-- Title -->
								<div class="form">
									<h5>Email</h5>
										<?= $form->field($model, 'email')->textInput(['autofocus' => true])->label(false)?>
									</div>

								<!-- Location -->
								<div class="form">
									<h5>Address</h5>
											<?= $form->field($model, 'address')->textarea(['rows' => 1])->label(false)?>
									</div>
								<div class="form-group">
									
										<h5>Gender</h5>
									 <?= $form->field($model, 'gender')->inline()->radioList(['male'=>'Male','female'=>'Female'],['prompt' =>'<---select gender--->'])->label(false)?>
									</div>
								<div class="form">
								<h5>Date of birth</h5>
							     <?=$form->field ( $model, 'dateofbirth' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter Establish date ...' ],'pluginOptions' => [ 'autoclose' => true ,'format' => 'yyyy-mm-dd',] ] )->label(false);?>  
            
								 
								</div>
									<div class="form">
										<h5>Mobile Number</h5>
									
								    <?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true])->label(false)?>
									</div>
									<div class="form">
									<h5>Landline</h5>
									
								    <?= $form->field($model, 'landline')->textInput(['autofocus' => true])->label(false)?>
									</div>
									
									<div class="form">
									<h5>Designation</h5>
									 <?= $form->field($model, 'designation')->dropDownList(ArrayHelper::map(Designation::find()->where(['status'=>'Active'])->all(), 'name', 'name'),['prompt' =>'select designation'])->label(false)?>
									
                                                </div>
                                                <div class="form">
                                                <h5>Description</h5>
									 <?= $form->field($model, 'description')->textarea(['rows' => 6])->label(false)?>
									
                                                </div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Add Your Educational Details</h4>
								</div>
								
								<div class="form">
								 <h5>Higher degree</h5>
									<?= $form->field($model, 'higherdegree')->dropDownList(ArrayHelper::map(Degrees::find()->where(['status'=>'Active'])->all(), 'name', 'name'),['prompt' =>'select higher degree'])->label(false)?>
									</div>

								<!-- Email -->
							
									<div class="form">
									 <h5>Specialization</h5>
									<?= $form->field($model, 'specialization')->dropDownList(ArrayHelper::map(Specializations::find()->where(['status'=>'Active'])->all(), 'name', 'name'),['prompt' =>'select specialization'])->label(false)?>
                                                </div>
								<!-- Email -->
								<div class="form">
								 <h5>University</h5>
								    <?= $form->field($model, 'university')->textInput(['autofocus' => true])->label(false)?>
									</div>
								<!-- Title -->
								<div class="form">
									 <h5>College name</h5>
										<?= $form->field($model, 'collegename')->textInput(['autofocus' => true])->label(false)?>
									</div>
								<div class="form">
									<h5>Passing year</h5>
											<?= $form->field($model, 'passingyear')->dropDownList(['2010' => '2010', ' 2011' => '2011','2012' => '2012','2013' =>'2013', '2014'=>'2014',' 2015' =>' 2015' ,'2016' => ' 2016', '2017' =>'2017',],['prompt' =>'select Year'])->label(false)?>
									
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
									<h5>Job role</h5>
										<?=$form->field ( $model, 'job_role' )->dropDownList ( [ 'Software Developer' => 'Software Developer','System Analyst' => 'System Analyst','Project Lead' => 'Project Lead','Testing Engineer' => 'Testing Engineer','Database Designer' => 'Database Designer','Product Manager' => 'Product Manager','System Admin' => 'System Admin' ], [ 'prompt' => 'select your jobrole' ] )->label(false)?>
									</div>
								<div class="form">
									<h5>Job location</h5>
										<?=$form->field ( $model, 'job_location' )->dropDownList ( [ 'Hyderabad/Secundrabad' => 'Hyderabad/Secundrabad','Banglore' => 'Banglore','Chennai' => 'Chennai','Mumbai' => 'Mumbai','Pune' => 'Pune','Gurgon' => 'Gurgon','Delhi' => ' Delhi' ], [ 'prompt' => 'select your joblocation' ] )->label(false)?>
									</div>
								
								<div class="form">
									<h5>Expected salary</h5>
										<?= $form->field($model, 'expected_salary')->dropDownList(['20k-30k' => '20k-30k', ' 30k-40k' => '30k-40k','50k-60k' => '50k-60k','60k-70k' =>'60k-70k', '70k-80k'=>'70k-80k',' 80k-90k' =>'80k-90k' ,])->label(false)?>
								
									</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Add Your Employement Details</h4>
								</div>
								<div class="form">
									<h5>Company name</h5>
									<?= $form->field($model, 'company_name')->label(false)?>
									</div>
					
								<div class="form">
									<h5>Job title</h5>
									<?= $form->field($model, 'job_title')->label(false)?>
									</div>

								<!-- Email -->
								<div class="form">
									<h5>Job type</h5>
									  <?= $form->field($model, 'job_type')->inline()->radioList(['full time' =>'Full time' , 'part time' =>'Part time','consultant'=>'Consultant'],['prompt' =>'select'])->label(false)?>
									</div>

								<!-- Email -->
								<div class="form">
									<h5>Job discription</h5>
									 <?= $form->field($model, 'job_description')->textarea(['rows' => 6])->label(false)?>
									</div>

								<!-- Title -->
								<div class="form">
									<h5>Experience</h5>
									 <?= $form->field($model, 'experience')->dropDownList(['6Months' =>'6Months' , '1year' =>'1year', '2years' =>'2years' , '3years' =>'3years' , '4years' =>'4years'],['prompt' =>'select','id' => 'employerform-highdegree'])->label(false)?>
									</div>
								
								<div class="form">
									<h5>Shift timings</h5>
									 <?= $form->field($model, 'shift_timings')->inline()->radioList(['DayShift' =>'DayShift' , 'NightShift' =>'NightShift'])->label(false)?>
									</div>
								<div class="form">
									<h5>Work location</h5>
									 <?= $form->field($model, 'work_location')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select','id' => 'employerform-highdegree'])->label(false)?>
									</div>
								<div class="form">
									<h5>Weekly working days</h5>
										 <?= $form->field($model, 'weekly_days')->textInput(['maxlength' => true])->label(false)?>
									</div>
				
				
								<div class="form">
									<h5>Salary</h5>
										 <?= $form->field($model, 'salary')->textInput(['maxlength' => true])->label(false)?>
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
								<h5>Skills</h5>
								<?php 
						
                           echo  $form->field($model, 'skills')->widget(Select2::classname(), [
                           		                 
                           		       'data'=>$model->allskills,
                           		        'options' => ['placeholder' => 'Select a Skill', 'multiple' => true],
                                        'pluginOptions' => [
                                        'tags' => true,
                                        'allowClear' => true,
                                        'tokenSeparators' => [','],
                                      //'maximumInputLength' => 10
                                             ],
                           		      //'value' => ['valu1','valu2']
                           ])->label(false)?>
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

<script type="text/javascript">
     $(document).ready(function(){
	$(".addCF1").on('click',function(){
		var dync = $('#dynamiccontent').html();
		//console.log(dync);
		$("#customFields1").append(dync);
	});
    $("#customFields1").on('click','.remCF',function(){
        $(this).parent().remove();
    });

    $(".addCF2").on('click',function(){
		var dync = $('#dynamiccontent-lan').html();
		//console.log(dync);
		$("#customFields1-lan").append(dync);
	});
    $("#customFields1-lan").on('click','.remCF2',function(){
        $(this).parent().remove();
    });
});
	</script>








