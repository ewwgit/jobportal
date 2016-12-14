<?php
use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'POST A JOB';
$this->params ['breadcrumbs'] [] = $this->title;
?>
<div class="site-signup">
	<h1><?= Html::encode($this->title) ?></h1>

	<div class="container">

		<!-- Submit Page -->
		<div class="sixteen columns">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
      <div class="submit-page" style="padding: 0px;">
				<div class="container">

					<div class="col-md-3 col-sm-3 col-xs-3 profile_img">

						

					</div>
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-6">
								<div class="margin-bottom-20">
									<div class="title-underlined">
										<h4>Employer Job Postings</h4>
									</div>
									<!-- Email -->
									<div class="form required">
                    
               <?= $form->field($postings, 'company_name')->textInput(['autofocus' => true],['value' => $postings->company_name])?>			
                  </div>

									<!-- Email -->
									<div class="form required">
                   
                  
              <?= $form->field($postings, 'company_type')->radioList(['corporate' =>'corporate' , 'consultant' =>'consultant'],['prompt' =>'select'],['value' => $postings->company_type])?>
                  </div>

									<!-- Title -->
									<div class="form">
                    
                 <?= $form->field($postings, 'industry_type')->dropDownList(['Accounting/Consulting/Taxation' =>'Accounting/Consulting/Taxation' , 'Advertising/Event Management/PR' =>'Advertising/Event Management/PR', 'Animation / Gaming' =>'Animation / Gaming' , 'Entertainment/Media/Publishing/Dotcom' =>'Entertainment/Media/Publishing/Dotcom' , 'Banking/FinancialServices/Broking' =>'Banking/FinancialServices/Broking' , 'Software Services' =>'Software Services' , 'Machinery/Equipment Manufacturing/Industrial Products' =>'Machinery/Equipment Manufacturing/Industrial Products' , 'Education/Training/Teaching' =>'Education/Training/Teaching'],['prompt' =>'select'],['value' => $postings->industry_type]) ?> </div>

									<!-- Location -->
									<div class="form">
                    
                   
                  <?=$form->field ( $postings, 'dateofestablishment' )->widget ( DatePicker::className (), [ 'inline' => true,'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>','clientOptions' => [ 'autoclose' => true,'format' => 'dd-M-yyyy' ] ], [ 'value' => $postings->dateofestablishment ] );?>
                  </div>
									<div class="form-group">
                    
                 <?= $form->field($postings, 'country')->dropDownList(['Afghanistan' =>'Afghanistan' , 'Brazil' =>'Brazil', 'Bulgaria' =>'Bulgaria' , 'Canada' =>'Canada' , 'India' =>'India' , 'United Kingdom' =>'United Kingdom' , 'USA' =>'USA' , 'Rome' =>'Rome'],['prompt' =>'select'],['value' => $postings->country]) ?>  </div>
									<div class="form">
            <?= $form->field($postings, 'state')->dropDownList(['Himachal Pradesh' =>'Himachal Pradesh' , 'Andrapradesh' =>'Andrapradesh', 'Italy' =>'Italy' , 'California' =>'California' , 'Sweden' =>'Sweden' , 'Newyork' =>'Newyork' , 'parise' =>'parise'],['prompt' =>'select'],['value' => $postings->state]) ?>  </div>
									<div class="form">
                   
                <?= $form->field($postings, 'city')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select'],['value' => $postings->city]) ?> </div>



									<div class="form">
                    
               <?= $form->field($postings, 'zipcode')->textInput(['maxlength' => true],['value' => $postings->zipcode])?>
                  </div>


									<div class="form" style="width: 136px;">
         <?= $form->field($postings, 'skills')->textInput(['autofocus' => true],['value' => $postings->skills])?></div>
									<div class="form">
                    
           <?= $form->field($postings, 'designation')->textInput(['autofocus' => true],['value' => $postings->designation])?>
 </div>
									<div class="form" style="width: 136px;">
                  <?= $form->field($model, 'Max_Experience')->dropDownList(['0 year' => '0 year', ' 1 year' => '1 year','2 year' => '2 years','3 years' =>'3 years', '4 years'=>'4 years',' 5 years' =>' 5 years' ,' 6 years' => ' 6 years', '7 years' =>'7 years',])?>
                  <?= $form->field($model, 'Min_Experience')->dropDownList(['0 year' => '0 year', ' 1 year' => '1 year','2 year' => '2 years','3 years' =>'3 years', '4 years'=>'4 years',' 5 years' =>' 5 years' ,' 6 years' => ' 6 years', '7 years' =>'7 years',])?>
                  </div>

									<div class="form">
                    
             <?= $form->field($postings, 'rolecategory')->dropDownList(['SoftWareDeveloper' =>'SoftWareDeveloper' , 'MobileDeveloper' =>'MobileDeveloper'],['prompt' =>'select'],['value' => $postings->rolecategory]) ?>	 </div>
									<div class="form">
                   
    <?= $form->field($postings, 'Description')->textarea(['rows' => 6],['value' => $postings->Description]) ?> </div>
									<div class="form">
                    
             <?= $form->field($postings, 'jobtype')->radioList(['full time' =>'full time' , 'part time' =>'part time'],['prompt' =>'select'],['value' => $postings->jobtype])?>
                  </div>

									<div class="form">
                    
            <?= $form->field($postings, 'gender')->radioList(['Male' =>'Male' , 'Femail' =>'Femail'],['prompt' =>'select'],['value' => $postings->gender]) ?>   </div>
									<div class="form">
                    
         <?= $form->field($postings, 'address')->textarea(['rows' => 6],['value' => $postings->address]) ?>  </div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="divider margin-top-0 padding-reset"></div>
		<div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'button big margin-top-5', 'name' => 'signup-button'])?>
                
                
 </div>
 
 <?php ActiveForm::end(); ?>
      		 
       		 </div>
</div>
<style>
.required {
    color: #282828;
}
</style>







