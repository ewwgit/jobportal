
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\widgets\ListView;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;
use kartik\select2\Select2;

$this->title = 'Browse Jobs';


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
	<!-- Recent Jobs -->
  	<div class="eleven columns">
	  
	<div class="padding-right">
	
	   <div class="container">
	
           <?php $form = ActiveForm::begin([
        'action' => Url::to(['browseresumes']),
        'method' => 'get',
        'options' => ['class' => 'form-inline form-group form-group-sm col-xs-12'],
        'fieldConfig' => [
            'template' => "{input}",
        ],
    ]); ?>
  
    <nobr>
       
 
    
	 <?php 
	
     echo $form->field($searchModel, 'designation')->widget(TypeaheadBasic::classname(), [
    'data' => $desdata,
    'options' => ['placeholder' => 'Enter Designation ...'],
    'pluginOptions' => ['highlight'=>true],
]);
 ?>
 
        <?php 
     
     echo $form->field($searchModel, 'Min_Experience')->widget(TypeaheadBasic::classname(), [
    'data' =>$expdata,
    'options' => ['placeholder' => 'Enter Experience ...'],
    'pluginOptions' => ['highlight'=>true],
]);
 
     
     ?>
  
       
	<?php 
						
                           echo  $form->field($searchModel, 'skills')->widget(Select2::classname(), [
                           		                 
                           		       'data'=>$skillsInfonew,
                           		        'options' => ['placeholder' => 'Select a Skill', 'multiple' => true],
                                        'pluginOptions' => [
                                        'tags' => true,
                                        'allowClear' => true,
                                        'tokenSeparators' => [','],
                                      //'maximumInputLength' => 10
                                             ],
                           		      //'value' => ['valu1','valu2']
                           ]);?>
      
     		
	 
         <button><i class="fa fa-search"></i></button></nobr>
 
        
                
      
          
          
          
           <?php ActiveForm::end(); ?>
           </div>
           
      
    
	
		
		<form action="#" method="get" class="list-search">
			<button><i class="fa fa-search"></i></button>
			<input type="text" placeholder="job title, keywords or company name" value=""/>
			<div class="clearfix"></div>
		</form>
		
		
	
     
          
          
		<ul class="resumes-list">

			
			
			<?php 
			echo ListView::widget( [
					'dataProvider' => $dataProvider,
					'itemView' => '_employeeresumes',
					'options' => [
							'tag' => 'div',
							'class' => 'list-wrapper',
							'id' => 'list-wrapper',
					],
					'viewParams' => [],
					'pager' => [
							 
							'prevPageLabel' => 'PREV',
							'nextPageLabel' => 'NEXT',
							'maxButtonCount' => 5,
							 
					],
					'layout' => "{items}\n{pager}",
			] );
			?> 

			
		</ul>
		<div class="clearfix"></div>
        
		

	</div>
	</div>


	<!-- Widgets -->
	<div class="five columns">

		<!-- Sort by -->
		<div class="widget">
			<h4>Sort by</h4>

			<!-- Select -->
			<select data-placeholder="Choose Category" class="chosen-select-no-single">
				<option selected="selected" value="recent">Newest</option>
				<option value="oldest">Oldest</option>
				<option value="expiry">Expiring Soon</option>
				<option value="ratehigh">Hourly Rate – Highest First</option>
				<option value="ratelow">Hourly Rate – Lowest First</option>
			</select>

		</div>

		<!-- Location -->
		<div class="widget">
			<h4>Location</h4>
			<form action="#" method="get">
				<input type="text" placeholder="State / Province" value=""/>
				<input type="text" placeholder="City" value=""/>

				<input type="text" class="miles" placeholder="Miles" value=""/>
				<label for="zip-code" class="from">from</label>
				<input type="text" id="zip-code" class="zip-code" placeholder="Zip-Code" value=""/><br>

				<button class="button">Filter</button>
			</form>
		</div>

		<!-- Job Type -->
		<div class="widget">
			<h4>Job Type</h4>

			<ul class="checkboxes">
				<li>
					<input id="check-1" type="checkbox" name="check" value="check-1" checked>
					<label for="check-1">Any Type</label>
				</li>
				<li>
					<input id="check-2" type="checkbox" name="check" value="check-2">
					<label for="check-2">Full-Time <span>(312)</span></label>
				</li>
				<li>
					<input id="check-3" type="checkbox" name="check" value="check-3">
					<label for="check-3">Part-Time <span>(269)</span></label>
				</li>
				<li>
					<input id="check-4" type="checkbox" name="check" value="check-4">
					<label for="check-4">Internship <span>(46)</span></label>
				</li>
				<li>
					<input id="check-5" type="checkbox" name="check" value="check-5">
					<label for="check-5">Freelance <span>(119)</span></label>
				</li>
			</ul>

		</div>

		<!-- Rate/Hr -->
		<div class="widget">
			<h4>Rate / Hr</h4>

			<ul class="checkboxes">
				<li>
					<input id="check-6" type="checkbox" name="check" value="check-6" checked>
					<label for="check-6">Any Rate</label>
				</li>
				<li>
					<input id="check-7" type="checkbox" name="check" value="check-7">
					<label for="check-7">$0 - $25 <span>(231)</span></label>
				</li>
				<li>
					<input id="check-8" type="checkbox" name="check" value="check-8">
					<label for="check-8">$25 - $50 <span>(297)</span></label>
				</li>
				<li>
					<input id="check-9" type="checkbox" name="check" value="check-9">
					<label for="check-9">$50 - $100 <span>(78)</span></label>
				</li>
				<li>
					<input id="check-10" type="checkbox" name="check" value="check-10">
					<label for="check-10">$100 - $200 <span>(98)</span></label>
				</li>
				<li>
					<input id="check-11" type="checkbox" name="check" value="check-11">
					<label for="check-11">$200+ <span>(21)</span></label>
				</li>
			</ul>

		</div>



	</div>
	<!-- Widgets / End -->


</div>
