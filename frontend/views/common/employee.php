<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\file\FileInput;

$this->title = 'UserProfileUpdate';
?>
<style>
.required {
	color: #333 !important;
}

select {
	height: 40px !important;
}
</style>
<div id="titlebar" class="single">
	<div class="container">
		<div class="sixteen columns">
			<h2>Profile Information</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?= Yii::$app->getHomeUrl(); ?>">Home</a></li>
					<li>Profile Information</li>
				</ul>
			</nav>
		</div>
	</div>
</div>

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
            <?=$form->field ( $model, 'profileimage' )->widget ( FileInput::classname (), [ 'options' => [ 'accept' => 'image/*' ],'pluginOptions' =>[[ 'browseLabel' => 'Profile Image', 'allowedFileExtensions'=>['jpg','png'] ]] ] )->label ( false );?>
           
               
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
									<h5>Name</h5>
										<?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => 'Name'])->label(false)?>
									</div>

								<!-- Email -->
								<div class="form">
									<h5>Surname</h5>
										<?= $form->field($model, 'surname')->textInput(['autofocus' => true,'placeholder' => 'Surname'])->label(false)?>
									</div>

								<!-- Title -->
								<div class="form">
									<h5>Email</h5>
										<?= $form->field($model, 'email')->textInput(['autofocus' => true,'placeholder' => 'Email'])->label(false)?>
									</div>

								<!-- Location -->
								<div class="form">
									<h5>Gender</h5>
											<?= $form->field($model, 'gender')->inline()->radioList(['male'=>'Male','female'=>'Female'],['prompt' =>'<---select gender--->'])->label(false)?>
									</div>
								<div class="form-group">
									<h5>Date of Birth</h5>
										
										<?=$form->field ( $model, 'dateofbirth' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter birth date ...' ],'pluginOptions' => [ 'autoclose' => true ,'format' => 'yyyy-mm-dd',] ] )->label(false);?>
									</div>
								<div class="form">
									<h5>Mobile No</h5>
										<?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true,'placeholder' => 'Mobile No'])->label(false)?>
									</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Add Your Educational Details</h4>
								</div>
								<div class="form">
									<h5>Highdegree</h5>
										<?=$form->field ( $model, 'highdegree' )->dropDownList ( [ 'B-Tech/B.E.' => 'B-Tech/B.E.','B.Sc' => 'B.Sc','B.Ed' => 'B.Ed','BDS' => 'BDS','BFA' => 'BFA','B.Pharma' => 'B.Pharma','B.A' => 'B.A','B.Com' => 'B.Com','BCA' => 'BCA','Other' => 'Other' ], [ 'prompt' => 'select your Highdegree' ] )->label ( false )?>
									</div>

								<!-- Email -->
								<div class="form">
									<h5>Specialization</h5>
										<?=$form->field ( $model, 'specialization' )->dropDownList ( [ 'Computers' => 'Computers','Chemical' => 'Chemical','Civil' => 'Civil','Electrical' => 'Electrical','Electronics/Telecommunication' => 'Electronics/Telecommunication','Automobile' => 'Automobile','Agricultural' => 'Agricultural','Mechanical' => 'Mechanical','Mining' => 'Mining','BioMedical' => 'BioMedical','Other' => 'Other' ], [ 'prompt' => 'select your Specilization' ] )->label ( false )?>
									</div>

								<!-- Email -->
								<div class="form">
									<h5>University</h5>
										<?= $form->field($model, 'university')->textInput(['autofocus' => true])->label(false)?>
									</div>

								<!-- Title -->
								<div class="form">
									<h5>Collegename</h5>
										<?= $form->field($model, 'collegename')->textInput(['autofocus' => true])->label(false)?>
									</div>
								<div class="form">
									<h5>Passingyear</h5>
										<?= $form->field($model, 'passingyear')->textInput(['autofocus' => true])->label(false)?>
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
									<h5>Functional Area</h5>
										<?=$form->field ( $model, 'functionalarea' )->dropDownList ( [ 'IT Software-ApplicationProgramming' => 'IT Software-ApplicationProgramming','IT Software-Mainframe' => 'IT Software-Mainframe','IT Software-Mobile' => 'IT Software-Mobile','IT Software-System Programming' => 'IT Software-System Programming','IT Software-Telecom' => 'IT Software-Telecom','IT Hardware' => 'IT Hardware' ], [ 'prompt' => 'select your functionalArea' ] )->label ( false )?>
									</div>
								<div class="form">
									<h5>Jobrole</h5>
										<?=$form->field ( $model, 'jobrole' )->dropDownList ( [ 'Software Developer' => 'Software Developer','System Analyst' => 'System Analyst','Project Lead' => 'Project Lead','Testing Engineer' => 'Testing Engineer','Database Designer' => 'Database Designer','Product Manager' => 'Product Manager','System Admin' => 'System Admin' ], [ 'prompt' => 'select your jobrole' ] )->label ( false )?>
									</div>
								<div class="form">
									<h5>Job Location</h5>
										<?=$form->field ( $model, 'joblocation' )->dropDownList ( [ 'Hyderabad/Secundrabad' => 'Hyderabad/Secundrabad','Banglore' => 'Banglore','Chennai' => 'Chennai','Mumbai' => 'Mumbai','Pune' => 'Pune','Gurgon' => 'Gurgon','Delhi' => ' Delhi' ], [ 'prompt' => 'select your joblocation' ] )->label ( false )?>
									</div>
								<div class="form">
									<h5>Experience</h5>
										<?=$form->field ( $model, 'experience' )->dropDownList ( [ 'Fresher' => 'Fresher','1 year' => '1 year','2 year' => '2 year','3 year' => '3 year','4 year' => '4 year','5 year' => '5 year','6 year' => ' 6 year' ], [ 'prompt' => 'select your experience' ] )->label ( false )?>
									</div>
								<div class="form">
									<h5>Job Type</h5>
											<?= $form->field($model, 'jobtype')->inline()->radioList(['fulltime'=>'Fulltime','parttime'=>'Parttime'],['prompt' =>'<---select jobtype--->'])->label(false)?>
									</div>
								<div class="form">
									<h5>Expected Salary</h5>
										<?= $form->field($model, 'expectedsalary')->textInput(['autofocus' => true])->label(false)?>
									</div>
							</div>
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Add Your Employer Details</h4>
								</div>
								<div class="form">
									<h5>Employer Name</h5>
										<?= $form->field($model, 'employername')->textInput(['autofocus' => true,'placeholder' => 'Employer Name'])->label(false)?>
									</div>
								<div class="form">
									<h5>Employer Type</h5>
											<?= $form->field($model, 'employertype')->inline()->radioList(['CurrentEmployer'=>'CurrentEmployer','PreviousEmployer'=>'PreviousEmployer','OtherEmployer' =>'OtherEmployer'])->label(false)?>
									</div>
								<div class="form">
									<h5>Designation</h5>
										<?= $form->field($model, 'designation')->textInput(['autofocus' => true,'placeholder' => 'Designation'])->label(false)?>
									</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Add Your Project Details</h4>
								</div>
								<div class="form">
									<h5>Project Title</h5>
										<?= $form->field($model, 'projecttitle')->textInput(['autofocus' => true])->label(false)?>
									</div>

								<!-- Email -->
								<div class="form">
									<h5>Project Start Date</h5>
										<?=$form->field ( $model, 'projectstartdate' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter project start date ...' ],'pluginOptions' => [ 'autoclose' => true ] ] )->label(false);?>
										
									</div>

								<!-- Email -->
								<div class="form">
									<h5>Project End Date</h5>
										<?=$form->field ( $model, 'projectenddate' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter project end date ...' ],'pluginOptions' => [ 'autoclose' => true ] ] )->label(false);?>
										
									</div>

								<!-- Title -->
								<div class="form">
									<h5>Project Location</h5>
										<?= $form->field($model, 'projectlocation')->textInput(['autofocus' => true])->label(false)?>
									</div>
								<div class="form">
									<h5>Employement Type</h5>
											<?= $form->field($model, 'employementtype')->inline()->radioList(['FullTime'=>'FullTime','PartTime'=>'PartTime','ContractualProject' =>'ContractualProject'])->label(false)?>
									</div>
								<div class="form">
									<h5>Project Description</h5>
										<?= $form->field($model, 'projectdescription')->textArea(['rows' => '3'])->label(false)?>
									</div>
								<div class="form">
									<h5>Role</h5>
										<?=$form->field ( $model, 'role' )->dropDownList ( [ 'Domain Expert' => 'Domain Expert','Sr project leader' => 'Sr project leader','solution architect' => 'solution architect','quality analyst' => 'quality analyst','databse architect' => 'databse architect','system admin' => 'system admin','project leader' => 'project leader','Programmer' => 'Programmer','test engineer' => 'test engineer','Other' => 'Other' ], [ 'prompt' => 'Select' ] )->label ( false )?>
									</div>
								<div class="form">
									<h5>Role Description</h5>
										<?= $form->field($model, 'roledescription')->textArea(['rows' => '3'])->label(false)?>
									</div>
								<div class="form">
									<h5>Teamsize</h5>
										<?=$form->field ( $model, 'teamsize' )->dropDownList ( [ '1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10','11' => '11','12' => '12' ], [ 'prompt' => 'Select' ] )->label ( false )?>
									</div>
								<div class="form">
									<h5>Skills Used</h5>
										<?= $form->field($model, 'skillsused')->textInput(['autofocus' => true])->label(false)?>
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
									<?php if(!empty($model->allSkills)){?>
									<div id="alreadyinfo">
									<?php foreach ($model->allSkills as $alreadySkills){?>
										<div class="form-table" id="customFields1">
										<div class="form">
											<h5>Skill Name</h5>
										<?= $form->field($model, 'skillname[]')->textInput(['autofocus' => true,'value' => $alreadySkills->skillname])->label(false)?>
									</div>
										<div class="form">
											<h5>Last Used</h5>
										<?=$form->field ( $model, 'lastused[]' )->dropDownList ( [ '2016' => '2016','2015' => '2015','2014' => '2014','2013' => '2013','2012' => '2012','2011' => '2011','2010' => '2010','2009' => '2009','2008' => '2008','2007' => '2007','2006' => '2006','2005' => '2005','2004' => '2004','2003' => '2003','2002' => '2002','2001' => '2001','2000' => '2000','1999' => '1999','1998' => '1998','1997' => '1997','1996' => '1996','1995' => '1995' ], [ 'options' => [$alreadySkills->lastused => ['Selected'=>'selected']],'prompt' => 'select your skill lastused year ' ] )->label ( false )?>
									</div>
										<div class="form">
											<h5>Skill Experience(IN Years)</h5>
										<?=$form->field ( $model, 'skillexperience[]' )->dropDownList ( [ '0 ' => '0 ','< 1' => '< 1','1 ' => '1 ','< 2 ' => '< 2 ','2 ' => '2 ','< 3 ' => '< 3 ','3 ' => '3 ','< 4 ' => '< 4 ','4 ' => '4 ','< 5 ' => '< 5 ','5 ' => '5 ','< 6 ' => '< 6 ','6 ' => '6 ','7 ' => '7 ' ], [  'options' => [$alreadySkills->skillexperience => ['Selected'=>'selected']],'prompt' => 'select your skillexperience ' ] )->label ( false )?>
									</div>
										<a href="javascript:void(0);" class="button gray remCF"
											style="text-decoration: none; margin-top: 1em;"><i
											class="fa fa-minus-circle"></i> Remove</a>
									</div>
										<?php }?>
									</div>
									<?php }else{ ?>
									
									<div class="form-table" id="customFields1">
									<div class="form">
										<h5>Skill Name</h5>
										<?= $form->field($model, 'skillname[]')->textInput(['autofocus' => true])->label(false)?>
									</div>
									<div class="form">
										<h5>Last Used</h5>
										<?=$form->field ( $model, 'lastused[]' )->dropDownList ( [ '2016' => '2016','2015' => '2015','2014' => '2014','2013' => '2013','2012' => '2012','2011' => '2011','2010' => '2010','2009' => '2009','2008' => '2008','2007' => '2007','2006' => '2006','2005' => '2005','2004' => '2004','2003' => '2003','2002' => '2002','2001' => '2001','2000' => '2000','1999' => '1999','1998' => '1998','1997' => '1997','1996' => '1996','1995' => '1995' ], [ 'prompt' => 'select your skill lastused year ' ] )->label(false)?>
									</div>
									<div class="form">
										<h5>Skill Experience(IN Years)</h5>
										<?=$form->field ( $model, 'skillexperience[]' )->dropDownList ( [ '0 ' => '0 ','< 1 ' => '< 1 ','1 ' => '1 ','< 2 ' => '< 2 ','2 ' => '2 ','< 3 ' => '< 3 ','3 ' => '3 ','< 4 ' => '< 4 ','4 ' => '4 ','< 5 ' => '< 5 ','5 ' => '5 ','< 6 ' => '< 6 ','6 ' => '6 ','7 ' => '7 ' ], [ 'prompt' => 'select your skillexperience ' ] )->label(false)?>
									</div>

								</div>
									<?php } ?>
									<a href="javascript:void(0);" class="button gray addCF1"
									style="text-decoration: none; margin-top: 1em;"><i
									class="fa fa-plus-circle"></i> Add Skills</a>
								<div id="dynamiccontent" style="display: none;">
									<div class="form-table" id="customFields1">
										<div class="form">
											<h5>Skill Name</h5>
										<?= $form->field($model, 'skillname[]')->textInput(['autofocus' => true])->label(false)?>
									</div>
										<div class="form">
											<h5>Last Used</h5>
										<?=$form->field ( $model, 'lastused[]' )->dropDownList ( [ '2016' => '2016','2015' => '2015','2014' => '2014','2013' => '2013','2012' => '2012','2011' => '2011','2010' => '2010','2009' => '2009','2008' => '2008','2007' => '2007','2006' => '2006','2005' => '2005','2004' => '2004','2003' => '2003','2002' => '2002','2001' => '2001','2000' => '2000','1999' => '1999','1998' => '1998','1997' => '1997','1996' => '1996','1995' => '1995' ], [ 'prompt' => 'select your skill lastused year ' ] )->label(false)?>
									</div>
										<div class="form">
											<h5>Skill Experience(In Years)</h5>
										<?=$form->field ( $model, 'skillexperience[]' )->dropDownList ( [ '0 ' => '0 ','< 1' => '< 1 ','1' => '1','< 2' => '< 2','2' => '2','< 3 ' => '< 3','3' => '3 ','< 4 ' => '< 4 ','4' => '4','< 5' => '< 5','5' => '5','< 6' => '< 6','6' => '6','7' => '7' ], [ 'prompt' => 'select your skillexperience in years' ] )->label(false)?>
									</div>
										<a href="javascript:void(0);" class="button gray remCF"
											style="text-decoration: none; margin-top: 1em;"><i
											class="fa fa-minus-circle"></i> Remove</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Add Your Other Details or Known Languages</h4>
								</div>
								
								<?php $p=0;?>
								<?php if(!empty($model->alllanguages)){?>
									<div id="alreadyinfo">
									<?php foreach ($model->alllanguages as $alreadylanguage){?>
								<div class="form-table" id="customFields1-lan" >
								
									<div class="form">
										<h5>Language</h5>
										 <?= $form->field($model, 'language[]')->textInput(['autofocus' => true,'value' => $alreadylanguage->language])->label(false)?>
									</div>
									<div class="form">
										<h5>Proficiencylevel</h5>
										<?= $form->field ( $model, 'proficiencylevel[]' )->dropDownList ( [ 'Beginner' => 'Beginner','Proficient' => 'Proficient','Expert' => 'Expert' ], [ 'options' => [$alreadylanguage->proficiencylevel => ['Selected'=>'selected']], 'prompt' => 'Select' ] )->label ( false )?>
									</div>
									<div class="form">
										<h5>Ability</h5>
										<?php 
										$checkedAry = explode(",",$alreadylanguage->ability);
										$model->ability[$p] = $checkedAry;?>
										<?= $form->field($model, 'ability['.$p.']')->inline(true)->checkboxList(['Read' => 'Read','Write' => 'Write', 'Speak' => 'Speak']) ?>
									</div>
									
									<a href="javascript:void(0);" class="button gray remCF2"
											style="text-decoration: none; margin-top: 1em;"><i
											class="fa fa-plus-circle"></i> Remove</a>
								</div>
								<?php $p++;?>
								<?php }?>
									</div>
									<?php }else{ ?>
									<div class="form-table" id="customFields1-lan" >
									
									<div class="form">
										<h5>Language</h5>
										 <?= $form->field($model, 'language[]')->textInput(['autofocus' => true])->label(false)?>
									</div>
									<div class="form">
										<h5>Proficiencylevel</h5>
										<?= $form->field ( $model, 'proficiencylevel[]' )->dropDownList ( [ 'Beginner' => 'Beginner','Proficient' => 'Proficient','Expert' => 'Expert' ], [ 'prompt' => 'Select' ] )->label ( false )?>
									</div>
									
									<div class="form abilitycls">
										<h5>Ability</h5>
										<?= $form->field($model, 'ability[0]')->inline(true)->checkboxList(['Read' => 'Read','Write' => 'Write', 'Speak' => 'Speak'])->label(false) ?>
									</div>
									
									
									
									</div>
									
									<?php }?>
									
									<div id="dynamiccontent-lannew" style="display: none;">
									<div class="form-table" >
									
									<div class="form">
										<h5>Language</h5>
										 <?= $form->field($model, 'language[]')->textInput(['autofocus' => true])->label(false)?>
									</div>
									<div class="form">
										<h5>Proficiencylevel</h5>
										<?= $form->field ( $model, 'proficiencylevel[]' )->dropDownList ( [ 'Beginner' => 'Beginner','Proficient' => 'Proficient','Expert' => 'Expert' ], [ 'prompt' => 'Select' ] )->label ( false )?>
									</div>
									
									
									
									<div class="dyncabilityinner"></div>
									<a href="javascript:void(0);" class="button gray remCF2"
											style="text-decoration: none; margin-top: 1em;"><i
											class="fa fa-minus-circle"></i> Remove</a>
									</div>
									</div>
									
									</div>
									
										<a href="javascript:void(0);" class="button gray addCF2"
										style="text-decoration: none; margin-top: 1em;"><i
										class="fa fa-plus-circle"></i> Add Language</a>
									
									
								
								
								
							</div>
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Upload Your Resume</h4>
								</div>
								<div class="form">
									<h5>Resume</h5>
										
                      <?php
							
							echo $form->field ( $model, 'resume' )->widget ( FileInput::classname (), [ 
									'options' => [ 
											'accept' => 'csv/*' 
									],
									'pluginOptions' => [ 
											'browseClass' => 'btn btn-primary',
											'uploadClass' => 'btn btn-info',
											'removeClass' => 'btn btn-danger',
											'browseLabel' =>  'Browse',
											'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> ',
											// change here: below line is added just to hide upload button. Its up to you to add this code or not.
											'showUpload' => false ,
											'showPreview' => false,
									] 
							] )->label ( false );
							?>
                     
									</div>
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
        var k = $('.abilitycls').length;
        var muchk = '<div class="form abilitycls"><h5>Ability</h5><div class="form-group field-employeeform-ability-'+k+'"><div><input type="hidden" name="EmployeeForm[ability]['+k+']" value=""><div id="employeeform-ability-'+k+'"><label class="checkbox-inline"><input type="checkbox" name="EmployeeForm[ability]['+k+'][]" value="Read"> Read</label><label class="checkbox-inline"><input type="checkbox" name="EmployeeForm[ability]['+k+'][]" value="Write"> Write</label><label class="checkbox-inline"><input type="checkbox" name="EmployeeForm[ability]['+k+'][]" value="Speak"> Speak</label></div><p class="help-block help-block-error"></p></div></div></div>';
        //$( "#dynamiccontent-lannew" ).find('.dyncabilityinner').html(muchk);
       var dyid = "dynactid"+k;
        $('.dyncabilityinner').html('<div id="'+dyid+'"></div>');
        var dync = $('#dynamiccontent-lannew').html();
		//console.log(dync);
		$("#customFields1-lan").append(dync);
		$("#"+dyid).html(muchk);
	});
    $("#customFields1-lan").on('click','.remCF2',function(){
        $(this).parent().remove();
    });
});
	</script> 
    <?php ActiveForm::end(); ?>
  </div>


