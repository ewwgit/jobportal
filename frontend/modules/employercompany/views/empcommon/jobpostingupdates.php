<?php
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Designation;

$this->title = 'POST A JOB';
$this->params ['breadcrumbs'] [] = $this->title;
?>
<style>
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td,
	.table>tbody>tr>td, .table>tfoot>tr>td {
	border: none;
	width: 100%;
}

select {
	height: 40px !important;
}

.required {
	color: #333 !important;
}
</style>
<div class="site-signup">
	

	<div class="container">

		<!-- Submit Page -->
		<div class="sixteen columns">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
      <div class="submit-page" style="padding: 0px;">
				<div class="container">
					<div class="col-md-2 col-sm-2 col-xs-2 profile_img">
						<div class="resume-titlebar"></div>
					</div>
					<div class="col-md-9" style="">
						<div class="row">
							<div class="col-md-6">
								<div class="margin-bottom-20">
									<div class="title-underlined">
										<h4>Employer Job Postings</h4>
									</div>
									<table class="table table-user-information ">
										<tbody>
											<tr>
												<td><?= $form->field($postings, 'company_name')->textInput(['autofocus' => true],['value' => $postings->company_name])?></td>
											</tr>
											<tr>
												<td><?= $form->field($postings, 'company_type')->inline()->radioList(['corporate' =>'Corporate' , 'consultant' =>'Consultant'],['prompt' =>'select'],['value' => $postings->company_type])?></td>
											</tr>
											<tr>
												<td><?= $form->field($postings, 'industry_type')->dropDownList(['Accounting/Consulting/Taxation' =>'Accounting/Consulting/Taxation' , 'Advertising/Event Management/PR' =>'Advertising/Event Management/PR', 'Animation / Gaming' =>'Animation / Gaming' , 'Entertainment/Media/Publishing/Dotcom' =>'Entertainment/Media/Publishing/Dotcom' , 'Banking/FinancialServices/Broking' =>'Banking/FinancialServices/Broking' , 'Software Services' =>'Software Services' , 'Machinery/Equipment Manufacturing/Industrial Products' =>'Machinery/Equipment Manufacturing/Industrial Products' , 'Education/Training/Teaching' =>'Education/Training/Teaching'],['prompt' =>'select'],['value' => $postings->industry_type]) ?></td>
											</tr>
											<tr>
												<td><?=$form->field ( $model, 'dateofestablishment' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter establish date ...' ],'pluginOptions' => [ 'autoclose' => true ,'format' => 'yyyy-mm-dd',] ] );?></td>
											</tr>
											<tr>
												<td><?= $form->field($postings, 'country')->dropDownList(['Afghanistan' =>'Afghanistan' , 'Brazil' =>'Brazil', 'Bulgaria' =>'Bulgaria' , 'Canada' =>'Canada' , 'India' =>'India' , 'United Kingdom' =>'United Kingdom' , 'USA' =>'USA' , 'Rome' =>'Rome'],['prompt' =>'select'],['value' => $postings->country]) ?></td>
											</tr>
											<tr>
												<td><?= $form->field($postings, 'state')->dropDownList(['Himachal Pradesh' =>'Himachal Pradesh' , 'Andrapradesh' =>'Andrapradesh', 'Italy' =>'Italy' , 'California' =>'California' , 'Sweden' =>'Sweden' , 'Newyork' =>'Newyork' , 'parise' =>'parise'],['prompt' =>'select'],['value' => $postings->state]) ?></td>
											</tr>
											<tr>
												<td><?= $form->field($postings, 'city')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select'],['value' => $postings->city]) ?></td>
											</tr>
											<tr>
												<td><?= $form->field($postings, 'zipcode')->textInput(['maxlength' => true],['value' => $postings->zipcode])?></td>
											</tr>
											<tr>
												<td><?= $form->field($postings, 'address')->textarea(['rows' => 6],['value' => $postings->address]) ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-md-6">
								<div class="margin-bottom-20" style="margin-top: 36px;">
									<div class="title-underlined">
										<h4></h4>
									</div>
									<table class="table table-user-information ">
										<tbody>
											<tr>
												<td><?= $form->field($postings, 'skills')->textInput(['autofocus' => true],['value' => $postings->skills])?></td>
											</tr>
											
											<tr>
												<td>designation:<?= Html::activeDropDownList($model, 'designation',ArrayHelper::map(Designation::find()->where(['status'=>'Active'])->all(), 'name', 'name'),['prompt' =>'select designation']) ?>	</tr>
											<tr>
												<td><?= $form->field($model, 'Max_Experience')->dropDownList(['0 year' => '0 year', ' 1 year' => '1 year','2 year' => '2 years','3 years' =>'3 years', '4 years'=>'4 years',' 5 years' =>' 5 years' ,' 6 years' => ' 6 years', '7 years' =>'7 years',])?></td>
											</tr>
											<tr>
												<td><?= $form->field($model, 'Min_Experience')->dropDownList(['0 year' => '0 year', ' 1 year' => '1 year','2 year' => '2 years','3 years' =>'3 years', '4 years'=>'4 years',' 5 years' =>' 5 years' ,' 6 years' => ' 6 years', '7 years' =>'7 years',])?></td>
											</tr>
											<tr>
												<td><?= $form->field($postings, 'rolecategory')->dropDownList(['SoftWareDeveloper' =>'SoftWareDeveloper' , 'MobileDeveloper' =>'MobileDeveloper'],['prompt' =>'select'],['value' => $postings->rolecategory]) ?></td>
											</tr>
											<tr>
												<td><?= $form->field($postings, 'Description')->textarea(['rows' => 6],['value' => $postings->Description]) ?></td>
											</tr>
											<tr>
												<td><?= $form->field($postings, 'jobtype')->inline()->radioList(['Full time' =>'Full time' , 'Part time' =>'Part time'],['prompt' =>'select'],['value' => $postings->jobtype])?></td>
											</tr>
	

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
		<div class="divider margin-top-0 padding-reset"></div>
		
                    <?= Html::submitButton('Save', ['class' => 'button big margin-top-5','style' => 'float:right', 'name' => 'signup-button'])?>
                            
 

			</div>
		</div>
		
 
 <?php ActiveForm::end(); ?>
      		 
       		 </div>
</div>
