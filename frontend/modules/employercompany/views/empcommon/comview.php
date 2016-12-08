<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Education */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'EducationForm';
$this->params ['breadcrumbs'] [] = [ 
		'label' => 'Signup',
		'url' => [ 
				'index' 
		] 
];
$this->params ['breadcrumbs'] [] = $this->title;
?>
<div class="container">

	<!-- Submit Page -->
	<div class="sixteen columns">
		<div class="submit-page" style="padding: 0px;">
			<div class="container">
				<div class="col-md-3 col-sm-3 col-xs-3 profile_img">
					<div class="form">
						<h5>Upload Your Profile image</h5>
						<label class="upload-btn"> <input type="file" multiple /> <i
							class="fa fa-upload"></i> Browse
						</label> <span class="fake-input">No file selected</span>
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
                   <?php $form = ActiveForm::begin(['id'=>$model->formName()],['options' => ['enctype' => 'multipart/form-data']]); ?>
                  <div class="form">
									<h5>Username</h5>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false)?>
                  </div>
								<div class="form">
									<h5>Name</h5>
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label(false)?>
                  </div>
								<!-- Title -->
								<div class="form">
									<h5>Email</h5>
                    <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label(false)?>
                  </div>

								<div class="form">
									<h5>Address</h5>
                    <?= $form->field($model, 'address')->textInput(['autofocus' => true])->label(false)?>
                  </div>

								<!-- Location -->
								<div class="form">
									<h5>Gender</h5>
									<form role="form">
										<label class="radio-inline">
                       <?= $form->field($model, 'gender')->radioList(['male'=>'male','female'=>'female'],['prompt' =>'<---select gender--->'])->label(false)?> </label>
									</form>
								</div>

								<div class="form">
									<h5>Date of Birth</h5>
                   <?=$form->field ( $model, 'dateofbirth' )->widget ( DatePicker::className (), [ 'inline' => true,'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>','clientOptions' => [ 'autoclose' => true,'format' => 'dd-M-yyyy' ] ] )->label ( false );?>
                     
                  </div>

								<div class="form">
									<h5>Mobile No</h5>
                    <?= $form->field($model, 'mobilenumber')->textInput(['autofocus' => true])->label(false);?>
                  </div>
								<div class="form">
									<h5>Designation</h5>
                  <?= $form->field($model, 'designation')->textInput(['autofocus' => true])->label(false);?>
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
									<div class="select-grid">
                      <?= $form->field($model, 'higherdegree')->dropDownList(['B.tech' =>'B.tech' , 'Degree' =>'Degree', 'BE' =>'BE','B.Pham' =>'B.pham' , 'Biotech' =>'Biotech', 'LLB' =>'LLB','Others' =>'Others'],['prompt' =>'select degree','class' => 'chosen-select-no-single','id' => 'employeeform-highdegree'])->label(false); ?>	
                    </div>
								</div>

								<!-- Email -->
								<div class="form">
									<h5>Specialization</h5>
									<div class="select-grid">
                     <?=$form->field ( $model, 'specialization' )->dropDownList ( [ 'Computers' => 'Computers','Chemical' => 'Chemical','Civil' => 'Civil','Electrical' => 'Electrical','Electronics/Telecommunication' => 'Electronics/Telecommunication','Automobile' => 'Automobile','Agricultural' => 'Agricultural','Mechanical' => 'Mechanical','Mining' => 'Mining','BioMedical' => 'BioMedical','Other' => 'Other' ], [ 'prompt' => 'select your Specilization','class' => 'chosen-select-no-single','id' => 'employeeform-highdegree' ] )->label ( false );?>
                    </div>
								</div>

								<!-- Email -->
								<div class="form">
									<h5>University</h5>
                    <?= $form->field($model, 'university')->dropDownList(['JNTUH' =>'JNTUH' , 'JNTUK' =>'JNTUK', 'OU' =>'OU' , 'MGU' =>'MGU' , 'KU' =>'KU' , 'others' =>'others'],['prompt' =>'university','class' => 'chosen-select-no-single','id' => 'employeeform-highdegree'])->label(false); ?> 
                  </div>

								<!-- Title -->
								<div class="form">
									<h5>Collegename</h5>
                    <?= $form->field($model, 'collegename')->label(false); ?>
                  </div>
								<div class="form">
									<h5>Passingyear</h5>
                     <?= $form->field($model, 'passingyear')->dropDownList(['1990' =>'1990' , '1991' =>'1991', '1992' =>'1992' , '2000' =>'2000' , '2010' =>'2010','2011' =>'2011' , '2012' =>'2012', '2013' =>'2013' , '2014' =>'2014','2015' =>'2015' , '2008' =>'2008'],['prompt' =>'select' ,'class' => 'chosen-select-no-single','id' => 'employeeform-highdegree'])->label(false)?>
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
									<h5>Jobrole</h5>
									<div class="select-grid">
                     <?= $form->field($model, 'job_role')->dropDownList(['Accountant' =>'Accountant' , 'SoftwareEngineer' =>'SoftwareEngineer' , 'Tester' =>'Tester', 'Developer' =>'Developer' , 'DTP Operater' =>'DTP Operater' , 'Data Entry' =>'Data Entry' , 'Java Developer' =>'Java Developer' , 'Admin' =>'Admin' ,'Analyst' =>'Analyst','QA Analyst' =>'QA Analyst','Business Analyst' =>'Business Analyst'],['prompt' =>'select','class' => 'chosen-select-no-single','id' => 'employeeform-highdegree'])->label(false); ?>
                    </div>
								</div>
								<div class="form">
									<h5>Job Location</h5>
									<div class="select-grid">
                       <?=$form->field ( $model, 'job_location' )->dropDownList ( [ 'Hyderabad/Secundrabad' => 'Hyderabad/Secundrabad','Banglore' => 'Banglore','Chennai' => 'Chennai','Mumbai' => 'Mumbai','Pune' => 'Pune','Gurgon' => 'Gurgon','Delhi' => ' Delhi' ], [ 'prompt' => 'select your joblocation','class' => 'chosen-select-no-single','id' => 'employeeform-highdegree' ] )->label ( false );?>
                    </div>
								</div>

								<div class="form">
									<h5>Expected Salary</h5>
                   <?= $form->field($model, 'expected_salary')->dropDownList(['10,000/month' =>'10,000/month' , '25,000/month' =>'25,000/month', '35,000/month' =>'35,000/month' , '30,000/month' =>'30,000/month' , '40,000/month' =>'40,000/month' , '50,000/month' =>'50,000/month' , '17,000/month' =>'17,000/month' ,'13,000/month' =>'13,000/month'],['prompt' =>'Min Salary','class' => 'chosen-select-no-single','id' => 'employeeform-highdegree'])->label(false); ?>
                  </div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="margin-bottom-20">
								<div class="title-underlined">
									<h4>Add Your Employement Details</h4>
								</div>
								<div class="form">
									<h5>Job Title</h5>
                    <?= $form->field($model, 'job_title')->label(false)?>	
                  </div>

								<!-- Email -->
								<div class="form">
									<h5>Job type</h5>
                    
                    <?= $form->field($model, 'job_type')->radioList(['full time' =>'full time' , 'part time' =>'part time'],['prompt' =>'select'])->label(false)?>
                  </div>

								<!-- Email -->
								<div class="form">
									<h5>description</h5>
                    <?= $form->field($model, 'job_description')->textarea(['rows' => 6])->label(false)?>
                  </div>

								<!-- Title -->
								<div class="form">
									<h5>Experience</h5>
                   <?= $form->field($model, 'experience')->dropDownList(['6Months' =>'6Months' , '1year' =>'1year', '2years' =>'2years' , '3years' =>'3years' , '4years' =>'4years'],['prompt' =>'select','class' => 'chosen-select-no-single','id' => 'employeeform-highdegree'])->label(false)?>               </div>
								<div class="form">
									<h5>openings</h5>
                     <?= $form->field($model, 'no_of_openings')->dropDownList(['10' =>'10' , '20' =>'20', '20' =>'20' , '50' =>'50' , '100' =>'100'],['prompt' =>'select','class' => 'chosen-select-no-single','id' => 'employeeform-highdegree'])->label(false)?>
                  </div>
								<div class="form">
									<h5>shift timings</h5>
                    <?= $form->field($model, 'shift_timings')->radioList(['DayShift' =>'DayShift' , 'NightShift' =>'NightShift'])->label(false)?>
                  </div>
								<div class="form">
									<h5>Work location</h5>
                     <?= $form->field($model, 'work_location')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select','class' => 'chosen-select-no-single','id' => 'employeeform-highdegree'])->label(false)?>
                  </div>
								<div class="form">
									<h5>weekly days</h5>
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
								<div class="form">
									<h5>Skill Name</h5>
                    <?= $form->field($model, 'requirment')->textInput(['autofocus' => true])->label(false);?>
                  </div>

								<div class="form">
									<h5>Companytype</h5>
                   
                      <?= $form->field($model, 'companytype')->radioList(['corporate' =>'corporate' , 'consultant' =>'consultant'],['prompt' =>'<---select--->'])->label(false);?>
                    </div>
							
							<div class="form">
								<h5>jobtype</h5>
								<div class="select-grid">
                      <?= $form->field($model, 'jobtype')->radioList(['full time' =>'full time' , 'part time' =>'part time'],['prompt' =>'select'])->label(false);?>
         
                    </div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="margin-bottom-20">
							<div class="title-underlined">
								<h4>Add Your Employer Details</h4>
							</div>
							<div class="form">
								<h5>Company Name</h5>
                   <?= $form->field($model, 'company_name')->label(false);?>		
                  </div>
							<div class="form">
								<h5>Company Type</h5>
                   <?= $form->field($model, 'company_type')->radioList(['corporate' =>'corporate' , 'consultant' =>'consultant'],['prompt' =>'<---select--->'])->label(false);?>
                  </div>
							<div class="form">
								<h5>Industry type</h5>
                    <?= $form->field($model, 'industry_type')->dropDownList(['Accounting/Consulting/Taxation' =>'Accounting/Consulting/Taxation' , 'Advertising/Event Management/PR' =>'Advertising/Event Management/PR', 'Animation / Gaming' =>'Animation / Gaming' , 'Entertainment/Media/Publishing/Dotcom' =>'Entertainment/Media/Publishing/Dotcom' , 'Banking/FinancialServices/Broking' =>'Banking/FinancialServices/Broking' , 'Software Services' =>'Software Services' , 'Machinery/Equipment Manufacturing/Industrial Products' =>'Machinery/Equipment Manufacturing/Industrial Products' , 'Education/Training/Teaching' =>'Education/Training/Teaching'],['prompt' =>'select','class' => 'chosen-select-no-single','id' => 'employeeform-highdegree'])->label(false);?>
                  </div>
							<div class="form">
								<h5>Dateofestablishment</h5>
                   <?=$form->field ( $model, 'dateofestablishment' )->widget ( DatePicker::className (), [ 'inline' => true,'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>','clientOptions' => [ 'autoclose' => true,'format' => 'dd-M-yyyy' ] ] )->label ( false );?>
    		                 </div>
							<div class="form">
								<h5>Location</h5>
                    <?=$form->field ( $model, 'location' )->dropDownList ( [ 'Hyderabad/Secundrabad' => 'Hyderabad/Secundrabad','Banglore' => 'Banglore','Chennai' => 'Chennai','Mumbai' => 'Mumbai','Pune' => 'Pune','Gurgon' => 'Gurgon','Delhi' => ' Delhi' ], [ 'prompt' => 'select your joblocation','class' => 'chosen-select-no-single','id' => 'employeeform-highdegree' ] )->label ( false );?></div>
							<div class="form">
								<h5>Country</h5>
                     <?= $form->field($model, 'country')->dropDownList(['Afghanistan' =>'Afghanistan' , 'Brazil' =>'Brazil', 'Bulgaria' =>'Bulgaria' , 'Canada' =>'Canada' , 'India' =>'India' , 'United Kingdom' =>'United Kingdom' , 'USA' =>'USA' , 'Rome' =>'Rome'],['prompt' =>'select','class' => 'chosen-select-no-single','id' => 'employeeform-highdegree'])->label(false);?></div>
							<div class="form">
								<h5>State</h5>
                    <?= $form->field($model, 'state')->dropDownList(['Himachal Pradesh' =>'Himachal Pradesh' , 'Andrapradesh' =>'Andrapradesh', 'Italy' =>'Italy' , 'California' =>'California' , 'Sweden' =>'Sweden' , 'Newyork' =>'Newyork' , 'parise' =>'parise'],['prompt' =>'select','class' => 'chosen-select-no-single','id' => 'employeeform-highdegree'])->label(false);?></div>
							<div class="form">
								<h5>City</h5>
                     <?= $form->field($model, 'city')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select','class' => 'chosen-select-no-single','id' => 'employeeform-highdegree'])->label(false);?></div>
							<div class="form">
								<h5>Zipcode</h5>
                    <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true])->label(false);?>
                    </div>
						</div>
					</div>
				</div>




			</div>
		</div>
		<div class="clearfix"></div>
		<div class="divider margin-top-0 padding-reset"></div>

		<div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'signup-button','class' => 'button border fw margin-top-10'])?>
        </div>
   <?php ActiveForm::end(); ?>
    </div>

</div>
</div>


