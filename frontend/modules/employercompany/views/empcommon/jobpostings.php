<?php
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '';
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
									<div class="form">
                    
                  <?= $form->field($model, 'company_name')->textInput(['autofocus' => true]) ?>			
                  </div>

									<!-- Email -->
									<div class="form">
                   
                <?=$form->field ( $model, 'dateofestablishment' )->widget ( DatePicker::classname (), [ 'options' => [ 'placeholder' => 'Enter Establish date ...' ],'pluginOptions' => [ 'autoclose' => true ,'format' => 'yyyy-mm-dd',] ] )->label(false);?>  
            
                  </div>

									<!-- Title -->
									<div class="form">
                    
                   <?= $form->field($model, 'country')->dropDownList(['Afghanistan' =>'Afghanistan' , 'Brazil' =>'Brazil', 'Bulgaria' =>'Bulgaria' , 'Canada' =>'Canada' , 'India' =>'India' , 'United Kingdom' =>'United Kingdom' , 'USA' =>'USA' , 'Rome' =>'Rome'],['prompt' =>'select'])?>
                  </div>

									<!-- Location -->
									<div class="form">
                    
                   
                    <?= $form->field($model, 'state')->dropDownList(['Himachal Pradesh' =>'Himachal Pradesh' , 'Andrapradesh' =>'Andrapradesh', 'Italy' =>'Italy' , 'California' =>'California' , 'Sweden' =>'Sweden' , 'Newyork' =>'Newyork' , 'parise' =>'parise'],['prompt' =>'select'])?>
                    
                  </div>
									<div class="form-group">
                    
                   <?= $form->field($model, 'city')->dropDownList(['Hyderabad' =>'Hyderabad' , 'Banglore' =>'Banglore', 'Vizag' =>'Vizag' , 'edfd' =>'edfd' , 'erf' =>'erf'],['prompt' =>'select']);?>
                  </div>
									<div class="form">
                    
                  <?= $form->field($model, 'zipcode')->textInput(['maxlength' => true])?>
                  </div>
									<div class="form">
                   
                  <?= $form->field($model, 'CTC')->textInput(['autofocus' => true])?>
                  </div>
                  <?php if(!empty($model->allSkills)){?>
									<div id="alreadyinfo">
									<?php foreach ($model->allSkills as $alreadySkills){?>
										<div class="form-table" id="customFields1">
											<div class="form">
												
										<?= $form->field($model, 'skills[]')->textInput(['autofocus' => true,'value' => $alreadySkills->skillname])?>
									</div>

											<a href="javascript:void(0);" class="button gray remCF"
												style="text-decoration: none; margin-top: 1em;"><i
												class="fa fa-plus-circle"></i> Remove</a>
										</div>
										<?php }?>
									</div>
									<?php }else{ ?>
									
									<div class="form-table" id="customFields1">
										<div class="form">
											
										<?= $form->field($model, 'skills[]')->textInput(['autofocus' => true])?>
									</div>

									</div>
									<?php } ?>
									<a href="javascript:void(0);" class="button gray addCF1"
										style="text-decoration: none; margin-top: 1em;"><i
										class="fa fa-plus-circle"></i> Add Skills</a>
									<div id="dynamiccontent" style="display: none;">
										<div class="form-table" id="customFields1">
											<div class="form">
												
										<?= $form->field($model, 'skills[]')->textInput(['autofocus' => true])?>
									</div>

											<a href="javascript:void(0);" class="button gray remCF"
												style="text-decoration: none; margin-top: 1em;"><i
												class="fa fa-plus-circle"></i> Remove</a>
										</div>
									</div>


									<div class="form">
                    
                  <?= $form->field($model, 'designation')?>
                  </div>
									<div class="form">
                  <div class="col-md-6" style="padding-left: 0px;"><?= $form->field($model, 'Max_Experience')->dropDownList(['0 year' => '0 year', ' 1 year' => '1 year','2 year' => '2 years','3 years' =>'3 years', '4 years'=>'4 years',' 5 years' =>' 5 years' ,' 6 years' => ' 6 years', '7 years' =>'7 years',])?></div>
                  <div class="col-md-6"><?= $form->field($model, 'Min_Experience')->dropDownList(['0 year' => '0 year', ' 1 year' => '1 year','2 year' => '2 years','3 years' =>'3 years', '4 years'=>'4 years',' 5 years' =>' 5 years' ,' 6 years' => ' 6 years', '7 years' =>'7 years',])?></div>
                  </div>
									<div class="form">
                    
                  <?=$form->field ( $model, 'rolecategory' )->dropDownList ( [ 'Software Developer' => 'Software Developer','System Analyst' => 'System Analyst','Project Lead' => 'Project Lead','Testing Engineer' => 'Testing Engineer','Database Designer' => 'Database Designer','Product Manager' => 'Product Manager','System Admin' => ' System Admin' ], [ 'prompt' => 'select your jobrole' ] )?>
                  </div>
									<div class="form">
                    
                  <?= $form->field($model, 'Description')->textarea(['rows' => 6])?>
                  </div>
									<div class="form">
                    
                   <?= $form->field($model, 'jobtype')->inline()->radioList(['full time' =>'Full time' , 'part time' =>'Part time'],['prompt' =>'select'])?>
                  </div>
									<div class="form">
                   
                 <?= $form->field($model, 'gender')->inline()->radioList(['Male' =>'Male' , 'Female' =>'Female'],['prompt' =>'select'])?>
                  </div>
									<div class="form">
                    
                 <?= $form->field($model, 'address')->textarea(['rows' => 6])?>
                  </div>

									<div class="form">
                    
                  <?= $form->field($model, 'company_type')->dropDownList(['consultant' => 'consultant','corporate' => 'corporate'],['prompt'=>'select your jobrole'])?>
                  </div>
									<div class="form">
                    
                  <?=$form->field ( $model, 'industry_type' )->dropDownList ( [ 'Advertising/Event Management/PR' => 'Advertising/Event Management/PR','Machinery/Equipment Manufacturing/Industrial Products' => 'Machinery/Equipment Manufacturing/Industrial Products' ], [ 'prompt' => 'select your jobrole' ] )?>
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


<script src="<?php echo Yii::getAlias('@web');?>/frontend/web/scripts/jquery.js" type="text/javascript"></script>
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


