<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\file\FileInput;

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use frontend\models\Employer;

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
									
										<?= $form->field($model, 'name')->textInput(['autofocus' => true])?>
									</div>

								<!-- Email -->
								<div class="form">
									
									  <?= $form->field($model, 'username')->textInput(['autofocus' => true])?>
									</div>

								<!-- Title -->
								<div class="form">
									
										<?= $form->field($model, 'email')->textInput(['autofocus' => true])?>
									</div>

								<!-- Location -->
								<div class="form">
									
											<?= $form->field($model, 'address')->textInput(['autofocus' => true])?>
									</div>
								<div class="form-group">
									
										
									 <?= $form->field($model, 'gender')->inline()->radioList(['male'=>'Male','female'=>'Female'],['prompt' =>'<---select gender--->'])?>
									</div>
								<div class="form">
									
								 
								  <?=$form->field ( $model, 'dateofbirth' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter birth date ...' ],'pluginOptions' => [ 'autoclose' => true , 'todayHighlight' => true,   'type' => DatePicker::TYPE_COMPONENT_APPEND,] ])?>
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
									
											<?= $form->field($model, 'passingyear')->dropDownList(['2010' => '2010', ' 2011' => '2011','2012' => '2012','2013' =>'2013', '2014'=>'2014',' 2015' =>' 2015' ,'2016' => ' 2016', '2017' =>'2017',])?>
									
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
									
										<?= $form->field($model, 'expected_salary')->dropDownList(['20k-30k' => '20k-30k', ' 30k-40k' => '30k-40k','50k-60k' => '50k-60k','60k-70k' =>'60k-70k', '70k-80k'=>'70k-80k',' 80k-90k' =>'80k-90k' ,])?>
								
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
									
									 <?= $form->field($model, 'experience')->dropDownList(['6Months' =>'6Months' , '1year' =>'1year', '2years' =>'2years' , '3years' =>'3years' , '4years' =>'4years'],['prompt' =>'select','id' => 'employerform-highdegree'])?> 
									</div>
								<div class="form">
									
										 <?= $form->field($model, 'no_of_openings')->dropDownList(['10' =>'10' , '20' =>'20', '20' =>'20' , '50' =>'50' , '100' =>'100'],['prompt' =>'select','id' => 'employerform-highdegree'])?>
									</div>
								<div class="form">
									
									 <?= $form->field($model, 'shift_timings')->inline()->radioList(['DayShift' =>'DayShift' , 'NightShift' =>'NightShift'])?>
									</div>
								<div class="form">
									
									 <?= $form->field($model, 'work_location')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select','id' => 'employerform-highdegree'])?>
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
                           ])->label('Skills');?>
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
									
								            <?= $form->field($model, 'employer_type')->inline()->radioList(['CurrentEmployer'=>'CurrentEmployer','PreviousEmployer'=>'PreviousEmployer','OtherEmployer' =>'OtherEmployer'])?>
									</div>
								<div class="form">
									
										<?= $form->field($model, 'industry_type')->dropDownList(['Accounting/Consulting/Taxation' =>'Accounting/Consulting/Taxation' , 'Advertising/Event Management/PR' =>'Advertising/Event Management/PR', 'Animation / Gaming' =>'Animation / Gaming' , 'Entertainment/Media/Publishing/Dotcom' =>'Entertainment/Media/Publishing/Dotcom' , 'Banking/FinancialServices/Broking' =>'Banking/FinancialServices/Broking' , 'Software Services' =>'Software Services' , 'Machinery/Equipment Manufacturing/Industrial Products' =>'Machinery/Equipment Manufacturing/Industrial Products' , 'Education/Training/Teaching' =>'Education/Training/Teaching'],['prompt' =>'select','id' => 'employerform-highdegree']);?>
									</div>
									<div class="form">
									
									<?=$form->field ( $model, 'dateofestablishment' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter birth date ...' ],'pluginOptions' => [ 'autoclose' => true ] ] );?>
											
									</div>
									<div class="form">
									
											  <?=$form->field ( $model, 'location' )->dropDownList ( [ 'Hyderabad/Secundrabad' => 'Hyderabad/Secundrabad','Banglore' => 'Banglore','Chennai' => 'Chennai','Mumbai' => 'Mumbai','Pune' => 'Pune','Gurgon' => 'Gurgon','Delhi' => ' Delhi' ], [ 'prompt' => 'select your joblocation','id' => 'employerform-highdegree' ] );?>
									</div>
									<div class="form">
									
										 <?= $form->field($model, 'country')->dropDownList(['Afghanistan' =>'Afghanistan' , 'Brazil' =>'Brazil', 'Bulgaria' =>'Bulgaria' , 'Canada' =>'Canada' , 'India' =>'India' , 'United Kingdom' =>'United Kingdom' , 'USA' =>'USA' , 'Rome' =>'Rome'],['prompt' =>'select','id' => 'employerform-highdegree']);?>
									</div>
									<div class="form">
									
										 <?= $form->field($model, 'state')->dropDownList(['Himachal Pradesh' =>'Himachal Pradesh' , 'Andrapradesh' =>'Andrapradesh', 'Italy' =>'Italy' , 'California' =>'California' , 'Sweden' =>'Sweden' , 'Newyork' =>'Newyork' , 'parise' =>'parise'],['prompt' =>'select','id' => 'employerform-highdegree']);?>
									</div>
									<div class="form">
									
										 <?= $form->field($model, 'city')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select','id' => 'employerform-highdegree']);?>
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








