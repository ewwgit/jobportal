<?php
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Designation;
use backend\models\Industrytype;
use backend\models\RolesCategory;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use kartik\file\FileInput;

$this->title = ' JOB Postings';

?>
<style>
.required {
	color: #333 !important;
}
</style>

<div class="clearfix"></div>
<div id="titlebar" class="single submit-page">
	<div class="container">

		<div class="sixteen columns">
			<h2><i class="fa fa-plus-circle"></i> Add Job</h2>
		</div>

	</div>
</div>


<div class="site-signup">
	

<div class="container">
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
	<!-- Submit Page -->
	<div class="sixteen columns">
		<div class="submit-page">

			<!-- Notice -->
			<div class="notification notice closeable margin-bottom-40">
				<p><span>Have an account?</span> If you don't have an account you can create one below by entering your email address. A password will be automatically emailed to you.</p>
			</div>

    
			<!-- Email -->
			

			<!-- Title -->
			<div class="form">
				<h5>Your Email</h5>
				 <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label(false)?>
				
			</div>
			<div class="form">
				<h5>Job Title</h5>
				 <?= $form->field($model, 'job_title')->textInput(['autofocus' => true])->label(false)?>
				
			</div>
			
			<div class="form">
				<h5>Designation</h5>
		<?= $form->field($model, 'designation')->dropDownList(ArrayHelper::map(Designation::find()->where(['status'=>'Active'])->all(), 'name', 'name'),['prompt' =>'select designation'])->label(false)?>	
				</div>
			<div class="form">
				<h5>Skills</h5>
				<?php 
						
                           echo  $form->field($model, 'skills')->widget(Select2::classname(), [
                           		                 
                           		    //   'data'=>$model->allskills,
                           		        'options' => ['placeholder' => 'Select a Skill', 'multiple' => true],
                                        'pluginOptions' => [
                                        'tags' => true,
                                        'allowClear' => true,
                                        'tokenSeparators' => [','],
                                      //'maximumInputLength' => 10
                                             ],
                           		      //'value' => ['valu1','valu2']
                           ])->label(false)?></div>
                           <div class="form">
				<h5>Role Category</h5>
			 <?=$form->field ( $model, 'rolecategory' )->dropDownList(ArrayHelper::map(RolesCategory::find()->where(['status'=>'Active'])->all(), 'role_name', 'role_name'),['prompt' =>'select Roles Category'])->label(false)?>	</div>
         
          <div class="form" style="margin-left: -15px;">
					<div class=" col-md-6">
					     <h5> Min Experience </h5>
					 <?= $form->field($model, 'Min_Experience')->dropDownList(['0' => '0', '1' => '1','2' => '2','3' =>'3', '4'=>'4',' 5' =>' 5' ,' 6' => ' 6', '7' =>'7','8' =>'8','9' =>'9','10' =>'10'],['prompt'=>'select your MinExperience'])->label(false)?>					     </div>
                  <div class=" col-md-6" style="padding-left: 0px;">    
                   <h5> Max Experience</h5>
                  <?= $form->field($model, 'Max_Experience')->dropDownList(['0' => '0', '1' => '1','2' => '2','3' =>'3', '4'=>'4','5' =>'5' ,'6' => '6', '7' =>'7','8' =>'8','9' =>'9','10' =>'10'],['prompt'=>'select your MaxExperience'])->label(false)?>                   </div>
                  </div>
			<!-- Location -->
			<div class="form">
				<h5>Location <span>(optional)</span></h5>
			<?php 
						
                           echo  $form->field($model, 'job_location')->widget(Select2::classname(), [
                           		                 
                           		     //  'data'=>$model->allskills,
                           		        'options' => ['placeholder' => 'Select locations', 'multiple' => true],
                                        'pluginOptions' => [
                                        'tags' => true,
                                        'allowClear' => true,
                                        'tokenSeparators' => [','],
                                      //'maximumInputLength' => 10
                                             ],
                           		      //'value' => ['valu1','valu2']
                           ])->label(false)?>	
                    
				<p class="note">Leave this blank if the location is not important</p>
			</div>
			 <div class="form" style="margin-left: -15px;">
					<div class=" col-md-6">
					     <h5> Min Sal </h5><?= $form->field($model, 'min_salary')->textInput(['autofocus' => true])->label(false)?></div>
                 
                  <div class=" col-md-6" style="padding-left: 0px;">     <h5> Max Sal</h5><?= $form->field($model, 'CTC')->textInput(['autofocus' => true])->label(false)?>	</div>
                  </div>

			<!-- Job Type -->
			<div class="form">
				<h5>Job Type</h5>
			 <?= $form->field($model, 'jobtype')->inline()->radioList(['full time' =>'Full time' , 'part time' =>'Part time','consultant'=>'Consultant'],['prompt' =>'select jobtype'])->label(false)?>			</div>
			
			<div class="form">
				<h5>Country</h5>
	<?= $form->field($model, 'country')->dropDownList($model->countriesList,['prompt'=>'Select Countries'])->label(false)?>	</div>


			<!-- Choose Category -->
			<div class="form">
				
					<h5>Sal Type</h5>
				<?= $form->field($model, 'sal_type')->dropDownList(['Per-annum' =>'Per-annum' , 'Per-monthly' =>'Per-monthly'],['prompt' =>'Salery Type'])->label(false)?>				
			</div>
			<div class="form">
				<h5>Currency</h5>
			  <?= $form->field($model, 'currency')->dropDownList(['INR' =>'INR' , 'USD' =>'USD'],['prompt' =>'Currency'])->label(false)?>
                </div>
			


			<!-- Description -->
			<div class="form">
				<h5>Description</h5>
				 <?= $form->field($model, 'Description')->textarea(['rows' => 6])->label(false)?>		
				
			</div>

			

			<!-- TClosing Date -->
			<div class="form">
				<h5>Date Of Establishment<span>(optional)</span></h5>
				 <?=$form->field ( $model, 'dateofestablishment' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter Establish date ...' ],'pluginOptions' => [ 'autoclose' => true ,'format' => 'yyyy-mm-dd',] ] )->label(false)?><p class="note">Deadline for new applicants.</p>
			</div>
			 <div class="form">
                    
                         <h5> Status</h5>
                   <?= $form->field($model, 'status')->dropDownList(['active' =>'Active' , 'inactive' =>'In-Active'],['prompt' =>'select'])->label(false)?>
                  </div>

			
			<!-- Company Details -->
			<div class="divider"><h3>Company Details</h3></div>

			<!-- Company Name -->
			<div class="form">
				<h5>Company Name</h5>
				 <?= $form->field($model, 'company_name')->textInput(['autofocus' => true])->label(false)?>
			</div>
			<div class="form">
				<h5>Website</h5>
				 <?= $form->field($model, 'website')->textInput(['autofocus' => true])->label(false)?>
			</div>
			<div class="form">
				<h5>Company Type <span>(optional)</span></h5>
		<?= $form->field($model, 'company_type')->dropDownList(['consultant' => 'consultant','corporate' => 'corporate'],['prompt'=>'select your company type'])->label(false)?>				</div>
			<div class="form">
				<h5>Industry Type <span>(optional)</span></h5>
					 <?= $form->field($model, 'industry_type')->dropDownList(ArrayHelper::map(Industrytype::find()->where(['status'=>'Active'])->all(), 'name', 'name'),['prompt' =>'select Industrytype'])->label(false)?>
					
                    </div>
                    <div class="form">
				<h5>Company Profile</h5>
				 <?= $form->field($model, 'company_profile')->textarea(['rows' => 4])->label(false)?>	
				
			</div>
			<!-- Website -->
			
			<!-- Teagline -->
			

			<!-- Logo -->
			<div class="form">
				<h5>Logo <span>(optional)</span></h5>
				<?=$form->field ($model,'image')->widget ( FileInput::classname (), [ 'options' => [ 'accept' => 'image/*' ],'pluginOptions' =>[[ 'browseLabel' => ' Image Uplode', 'allowedFileExtensions'=>['jpg','png','jpeg'] ]] ] )->label ( false );?>		</div>
			
			
			<div class="divider margin-top-0"></div>
		<?= Html::submitButton('Save', ['class' => 'button big margin-top-5', 'name' => 'signup-button'])?>

		</div>
	</div>
 <?php ActiveForm::end(); ?>
</div>

 </div>
 


 