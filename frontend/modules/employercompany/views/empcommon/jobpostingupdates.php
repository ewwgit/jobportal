<?php
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Designation;
use frontend\models\JobSkills;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use kartik\file\FileInput;
use yii\web\view;

$this->title = ' JOB Postings';
// $jobskills = JobSkills::find()->select('skill_name')->asArray()->where(['jobid' => $model->id])->all();

// if(!empty($jobskills) )
// {
// 	foreach ($jobskills as $skill)
// 	{
		
// 	}
// }

?>
<style>
.required {
	color: #333 !important;
}

select {
	height: 34px !important;
}
.btn {
	padding: 6px 3px;
}
.file-footer-caption {
	width: 228px;
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
                          <img
							src="<?php
							if($model->image){
														
							echo isset( $model->image)? Yii::getAlias('/jobportal/').$model->image : '' ; 
							}else {
									 echo "/jobportal/frontend/web/profileimages/post_job.jpg" ;
								      }
								?>">

					  <?=$form->field ( $model, 'image' )->widget ( FileInput::classname (), [ 'options' => [ 'accept' => 'image/*' ],'pluginOptions' =>[[ 'browseLabel' => ' Image Uplode', 'allowedFileExtensions'=>['jpg','png','jpeg'] ]] ] )->label ( false );?>
            	
</div>
					</div>
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-6">
								<div class="margin-bottom-20">
									<div class="title-underlined">
										<h4>Employer Job Postings</h4>
									</div>
									<!-- Email -->
									<div class="form">
                    <h5>Company name</h5>
                  <?= $form->field($model, 'company_name')->textInput(['autofocus' => true])->label(false)?>	
                  </div>

									<!-- Email -->
									<div class="form">
                    <h5>Date of establishment</h5>
                <?=$form->field ( $model, 'dateofestablishment' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter Establish date ...' ],'pluginOptions' => [ 'autoclose' => true ,'format' => 'yyyy-mm-dd',] ] )->label(false)?>	
            
                  </div>

									<!-- Title -->
									<div class="form">
                    
                    <h5>Country </h5>
                   <?= $form->field($model, 'country')->dropDownList($model->countriesList,['prompt'=>'Select Countries'])->label(false)?>	
                  </div>

									<!-- Location -->
									
							     <h5>Job location</h5>		
                  	<div class="form-group">
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
                    
                   </div>
                
                    <div class="form">
                       <h5>Skills</h5>
                       
								<?php 
								
										
										echo  $form->field($model, 'skills')->widget(Select2::classname(), [
												
												//'value' => $skill['skill_name'],
												'data' => $model->allskills,
												'options' => ['placeholder' => 'Select a Skill', 'multiple' => true],
												'pluginOptions' => [
														'tags' => true,
														'allowClear' => true,
														'tokenSeparators' => [','],
												//	'	maximumInputLength' => 10
												],
											
												
										])->label(false);
									?>
								
						
                         

                           
                           
                </div>

                  <div class="form">
                       <h5>Designation </h5>
									<?= $form->field($model, 'designation')->dropDownList(ArrayHelper::map(Designation::find()->where(['status'=>'Active'])->all(), 'name', 'name'),['prompt' =>'select designation'])->label(false)?>	
                                                </div>
               <div class="form">
                         <h5> Role category</h5>
                  <?=$form->field ( $model, 'rolecategory' )->dropDownList ( ['Software Developer' => 'Software Developer','System Analyst' => 'System Analyst','Project Lead' => 'Project Lead','Testing Engineer' => 'Testing Engineer','Database Designer' => 'Database Designer','Product Manager' => 'Product Manager','System Admin' => ' System Admin' ], [ 'prompt' => 'select your RoleCategory ' ] )->label(false)?>	
                  </div>
									<div class="form" style="width: 450px;margin-left: -15px;">
					<div class=" col-md-6">
					     <h5> Min experience </h5><?= $form->field($model, 'Min_Experience')->dropDownList(['0' => '0', '1' => '1','2' => '2','3' =>'3', '4'=>'4',' 5' =>' 5' ,' 6' => ' 6', '7' =>'7','8' =>'8','9' =>'9','10' =>'10'],['prompt'=>'select your MinExperience'])->label(false)?></div>
                 
                  <div class=" col-md-6" style="padding-left: 0px;">     <h5> Max experience</h5><?= $form->field($model, 'Max_Experience')->dropDownList(['0' => '0', '1' => '1','2' => '2','3' =>'3', '4'=>'4','5' =>'5' ,'6' => '6', '7' =>'7','8' =>'8','9' =>'9','10' =>'10'],['prompt'=>'select your MaxExperience'])->label(false)?></div>
                  </div>
									
									<div class="form">
                         <h5> Description</h5>
                  <?= $form->field($model, 'Description')->textarea(['rows' => 1])->label(false)?>	
                    
                  </div>
									<div class="form">
                         <h5>Job type </h5>
                   <?= $form->field($model, 'jobtype')->inline()->radioList(['full time' =>'Full time' , 'part time' =>'Part time','consultant'=>'Consultant'],['prompt' =>'select jobtype'])->label(false)?>	
                  </div>
									
									<div class=" form">
                         <h5> Company type</h5>
                  <?= $form->field($model, 'company_type')->dropDownList(['consultant' => 'consultant','corporate' => 'corporate'],['prompt'=>'select your company type'])->label(false)?>	
                  </div>
                  <div class="form">
                  <h5> Industry type</h5>
                  <?=$form->field ( $model, 'industry_type' )->dropDownList ( [ 'Advertising/Event Management/PR' => 'Advertising/Event Management/PR','Machinery/Equipment Manufacturing/Industrial Products' => 'Machinery/Equipment Manufacturing/Industrial Products' ], [ 'prompt' => 'select your industry type' ] )->label(false)?>	
                  </div>
                   <div class=" form">
                         <h5> Company profile</h5>
                  <?= $form->field($model, 'company_profile')->textarea(['rows' => 4])->label(false)?>	
                  </div>
                  <div class="form" style="width: 450px;margin-left: -15px;">
					<div class=" col-md-6">
					     <h5> Min Sal </h5>
					     <?= $form->field($model, 'min_salary')->textInput(['autofocus' => true])->label(false)?>
					     </div>
                 
                  	<div class=" col-md-6" style="padding-left: 0px;">     
                  		<h5> Max Sal</h5>
                  		<?= $form->field($model, 'CTC')->textInput(['autofocus' => true])->label(false)?>
                  	</div>
                  </div>
                  <div class="form" style="width: 450px;margin-left: -15px;">
                   <div class=" col-md-6">
                    
                         <h5> Salery Type</h5>
                   <?= $form->field($model, 'sal_type')->dropDownList(['Per-annum' =>'Per-annum' , 'Per-monthly' =>'Per-monthly'],['prompt' =>'Salery Type'])->label(false)?>
                  </div>
                  <div class=" col-md-6" style="padding-left: 0px;"> 
                    
                         <h5> Currency</h5>
                   <?= $form->field($model, 'currency')->dropDownList(['INR' =>'INR' , 'USD' =>'USD'],['prompt' =>'Currency'])->label(false)?>
                  </div>
                  </div>
                    <div class="form-group">
                    
                         <h5> Status</h5>
                   <?= $form->field($model, 'status')->dropDownList(['active' =>'Active' , 'inactive' =>'In-Active'],['prompt' =>'select'])->label(false)?>
                  </div>

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




	
	<?php 

$this->registerJs ( "
		
		$(document.body).on('click', '.remCF2' ,function(){
		 $(this).parent().remove();
		
		
		});
		
		$(document.body).on('click', '.remCF' ,function(){
		 $(this).parent().remove();
		
		
		});
		
		$(document.body).on('click', '.addCF1',function(){
		var dync = $('#dynamiccontent').html();
		//console.log(dync);
		$('#customFields1').append(dync);
	});
		
		$(document.body).on('click', '.addCF2',function(){
        var dync = $('#dynamiccontent-lan').html();
		//console.log(dync);
		$('#customFields1-lan').append(dync);
	});
		
		
		
		

		", View::POS_READY, 'my-options2' );
?>


