<?php
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Designation;
use kartik\select2\Select2;
use kartik\file\FileInput;
use yii\helpers\Url;

$this->title = 'POST A JOB';

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

					<div class="col-md-3 col-sm-3 col-xs-3 profile_img">
						<div class="form">
						<h5>jobposting image:</h5>
						<img class='image'
						src="<?php
							if($model->imagenew){
														
							echo  Yii::getAlias('/jobportal/').$model->imagenew;
							}else {
									 echo "/jobportal/frontend/web/profileimages/post_job.jpg" ;
								      }
								?>"
							width="100" height="100"> </img> 


	 <?=$form->field ( $model, 'image' )->widget ( FileInput::classname (), [ 'options' => [ 'accept' => 'image/*' ],'pluginOptions' =>[[ 'browseLabel' => ' Image', 'allowedFileExtensions'=>['jpg','png','jpeg'] ]] ] )->label ( false );?>	
</div>
					</div>
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-6">
								<div class="margin-bottom-20">
									<div class="title-underlined">
										<h4>Employer Job Postings</h4>
									</div>
									<table class="table table-user-information ">
										<tbody>
											<tr>
												<td><h5>Company name</h5><?= $form->field($model, 'company_name')->textInput(['autofocus' => true],['value' => $model->company_name])->label ( false );?>	</td>
											</tr>
											<tr>
												<td><h5>Company type</h5><?= $form->field($model, 'company_type')->inline()->radioList(['corporate' =>'Corporate' , 'consultant' =>'Consultant'],['prompt' =>'select'],['value' => $model->company_type])->label ( false );?>	</td>
											</tr>
											<tr>
												<td><h5>Industry type</h5><?= $form->field($model, 'industry_type')->dropDownList(['Accounting/Consulting/Taxation' =>'Accounting/Consulting/Taxation' , 'Advertising/Event Management/PR' =>'Advertising/Event Management/PR', 'Animation / Gaming' =>'Animation / Gaming' , 'Entertainment/Media/Publishing/Dotcom' =>'Entertainment/Media/Publishing/Dotcom' , 'Banking/FinancialServices/Broking' =>'Banking/FinancialServices/Broking' , 'Software Services' =>'Software Services' , 'Machinery/Equipment Manufacturing/Industrial Products' =>'Machinery/Equipment Manufacturing/Industrial Products' , 'Education/Training/Teaching' =>'Education/Training/Teaching'],['prompt' =>'select'],['value' => $model->industry_type])->label ( false );?>	</td>
											</tr>
											<tr>
											<td>   <h5>Company profile</h5><?= $form->field($model, 'company_profile')->textarea(['rows' => 4],['value' => $model->company_profile])->label ( false );?></td>
											</tr>
											<tr>
											<td><h5>Min salary</h5><?= $form->field($model, 'min_salary')->dropDownList(['20,000' => '20,000', ' 30,000' => '30,000','40,000' => '40,000','50,000' =>'50,000', '60,000'=>'60,000',' 70,000' =>'70,000' ,],['value' => $model->min_salary])->label ( false );?>	</td>
											</tr>
											<tr>
												<td><h5>Date of establishment</h5><?=$form->field ( $model, 'dateofestablishment' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter establish date ...' ],'pluginOptions' => [ 'autoclose' => true ,'format' => 'yyyy-mm-dd',] ] )->label ( false );?>	</td>
											</tr>
											<tr>
												<td>
												 <h5>Country</h5><?= $form->field($model, 'country')->dropDownList($model->countriesList,['prompt'=>'Select Countries'],['value' => $model->country])->label ( false );?>	</td>
											</tr>
											
											<tr>
												<td><h5>Zipcode</h5><?= $form->field($model, 'zipcode')->textInput(['maxlength' => true],['value' => $model->zipcode])->label ( false );?>	</td>
											</tr>
											<tr>
												<td><h5>Address</h5><?= $form->field($model, 'address')->textarea(['rows' => 6],['value' => $model->address])->label ( false );?>	</td>
											</tr>
											<tr>
												<td><h5>Skills</h5>
												<?= $form->field($model, 'skills')->textInput(['autofocus' => true],['value' => $model->skills])->label ( false );?>	</td>
											</tr>
											
											<tr>
												<td>
											 <h5>Designation</h5><?= $form->field($model, 'designation')->dropDownList(ArrayHelper::map(Designation::find()->where(['status'=>'Active'])->all(), 'name', 'name'),['prompt' =>'select designation'],['value' => $model->designation])->label ( false );?>	
                                                </td>
												</tr>
											<tr>
												<td><h5>Max experience</h5><?= $form->field($model, 'Max_Experience')->dropDownList(['0' => '0', '1' => '1','2' => '2','3' =>'3', '4'=>'4',' 5' =>' 5' ,' 6' => ' 6', '7' =>'7','8' =>'8','9' =>'9','10' =>'10'])->label ( false );?>	</td>
											</tr>
											<tr>
												<td><h5>Mine experience</h5><?= $form->field($model, 'Min_Experience')->dropDownList(['0' => '0', '1' => '1','2' => '2','3' =>'3', '4'=>'4',' 5' =>' 5' ,' 6' => ' 6', '7' =>'7','8' =>'8','9' =>'9','10' =>'10'])->label ( false );?>	</td>
											</tr>
											<tr>
												<td><h5>Role category</h5><?= $form->field($model, 'rolecategory')->dropDownList(['SoftWareDeveloper' =>'SoftWareDeveloper' , 'MobileDeveloper' =>'MobileDeveloper'],['prompt' =>'select'],['value' => $model->rolecategory])->label ( false );?>	</td>
											</tr>
											<tr>
												<td><h5>Description</h5><?= $form->field($model, 'Description')->textarea(['rows' => 6],['value' => $model->Description])->label ( false );?>	</td>
											</tr>
											<tr>
												<td><h5>Job type</h5><?= $form->field($model, 'jobtype')->inline()->radioList(['Full time' =>'Full time' , 'Part time' =>'Part time'],['prompt' =>'select'],['value' => $model->jobtype])->label ( false );?>	</td>
											</tr>
											<tr>
												<td>
												<h5>Job location</h5>
												<?php 
						
                           echo  $form->field($model, 'job_location')->widget(Select2::classname(), [
                           		                 
                           		       'data'=>$model->alllocations,
                           		        'options' => ['placeholder' => 'Select location', 'multiple' => true],
                                        'pluginOptions' => [
                                        'tags' => true,
                                        'allowClear' => true,
                                        'tokenSeparators' => [','],
                                      //'maximumInputLength' => 10
                                             ],
                           		      //'value' => ['valu1','valu2']
                           ])->label ( false );?>	
                         			</tr>
											<tr>
												<td><h5>Status</h5><?= $form->field($model, 'status')->dropDownList(['Active' =>'Active' , 'inactive' =>'In-Active'],['prompt' =>'select'],['value' => $model->status])->label ( false );?>	</td>
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
		
                    <?= Html::submitButton('Save', ['class' => 'button big margin-top-5', 'name' => 'signup-button'])?>
                
                
 
			</div>
		</div>
		
 
 <?php ActiveForm::end(); ?>
      		 
       		 </div>

</div>




