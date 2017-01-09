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
					<div class="col-md-2 col-sm-2 col-xs-2 profile_img">
						<div class="resume-titlebar"></div>
							<div class="form">
						<h5>Upload Your posting image</h5>
						<img class='image'
						src="<?php
							if($model->imagenew){
													
							echo isset( $model->imagenew)? Url::base().$model->imagenew : '' ;
							}else {
									  echo Url::base()."/frontend/web/images/user-iconnew.png" ;
								      }
								?>"
							width="100" height="100"> </img> 
            <?=$form->field ( $model, 'image' )->widget ( FileInput::classname (), [ 'options' => [ 'accept' => 'image/*' ],'pluginOptions' =>[[ 'browseLabel' => ' Image', 'allowedFileExtensions'=>['jpg','png','jpeg'] ]] ] )->label ( false );?>
            
               
						</div>
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
												<td><?= $form->field($model, 'company_name')->textInput(['autofocus' => true],['value' => $model->company_name])?></td>
											</tr>
											<tr>
												<td><?= $form->field($model, 'company_type')->inline()->radioList(['corporate' =>'Corporate' , 'consultant' =>'Consultant'],['prompt' =>'select'],['value' => $model->company_type])?></td>
											</tr>
											<tr>
												<td><?= $form->field($model, 'industry_type')->dropDownList(['Accounting/Consulting/Taxation' =>'Accounting/Consulting/Taxation' , 'Advertising/Event Management/PR' =>'Advertising/Event Management/PR', 'Animation / Gaming' =>'Animation / Gaming' , 'Entertainment/Media/Publishing/Dotcom' =>'Entertainment/Media/Publishing/Dotcom' , 'Banking/FinancialServices/Broking' =>'Banking/FinancialServices/Broking' , 'Software Services' =>'Software Services' , 'Machinery/Equipment Manufacturing/Industrial Products' =>'Machinery/Equipment Manufacturing/Industrial Products' , 'Education/Training/Teaching' =>'Education/Training/Teaching'],['prompt' =>'select'],['value' => $model->industry_type]) ?></td>
											</tr>
											<tr>
												<td><?=$form->field ( $model, 'dateofestablishment' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter establish date ...' ],'pluginOptions' => [ 'autoclose' => true ,'format' => 'yyyy-mm-dd',] ] );?></td>
											</tr>
											<tr>
												<td>
												 <?= $form->field($model, 'country')->dropDownList($model->countriesList,['prompt'=>'Select Countries'],['value' => $model->country]); ?></td>
											</tr>
											
											<tr>
												<td><?= $form->field($model, 'zipcode')->textInput(['maxlength' => true],['value' => $model->zipcode])?></td>
											</tr>
											<tr>
												<td><?= $form->field($model, 'address')->textarea(['rows' => 6],['value' => $model->address]) ?></td>
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
												<td><?= $form->field($model, 'skills')->textInput(['autofocus' => true],['value' => $model->skills])?></td>
											</tr>
											
											<tr>
												<td>designation:<?= Html::activeDropDownList($model, 'designation',ArrayHelper::map(Designation::find()->where(['status'=>'Active'])->all(), 'name', 'name'),['prompt' =>'select designation'],['class'=>'border']) ?>	</tr>
											<tr>
												<td><?= $form->field($model, 'Min_Experience')->dropDownList(['0 year' => '0 year', ' 1 year' => '1 year','2 year' => '2 years','3 years' =>'3 years', '4 years'=>'4 years',' 5 years' =>' 5 years' ,' 6 years' => ' 6 years', '7 years' =>'7 years',])?></td>
											</tr>
											<tr>
												<td><?= $form->field($model, 'Max_Experience')->dropDownList(['0 year' => '0 year', ' 1 year' => '1 year','2 year' => '2 years','3 years' =>'3 years', '4 years'=>'4 years',' 5 years' =>' 5 years' ,' 6 years' => ' 6 years', '7 years' =>'7 years',])?></td>
											</tr>
											
											<tr>
												<td><?= $form->field($model, 'rolecategory')->dropDownList(['SoftWareDeveloper' =>'SoftWareDeveloper' , 'MobileDeveloper' =>'MobileDeveloper'],['prompt' =>'select'],['value' => $model->rolecategory]) ?></td>
											</tr>
											<tr>
												<td><?= $form->field($model, 'Description')->textarea(['rows' => 6],['value' => $model->Description]) ?></td>
											</tr>
											<tr>
												<td><?= $form->field($model, 'jobtype')->inline()->radioList(['full time' =>'Full time' , 'part time' =>'Part time','consultant'=>'Consultant'],['prompt' =>'select jobtype'],['value' => $model->jobtype])?>
												
												</td>
											</tr>
											<tr>
												<td>
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
                           ])->label('Job Location');?>
                         			</tr>
											<tr>
												<td><?= $form->field($model, 'status')->dropDownList(['Active' =>'Active' , 'inactive' =>'In-Active'],['prompt' =>'select'],['value' => $model->status]);?></td>
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
<style>
.border{
border-radius: 5px;
}
</style>
