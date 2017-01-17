<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'UserProfile';
use kartik\growl\Growl;
?>
<style>
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td,
	.table>tbody>tr>td, .table>tfoot>tr>td {
	border: none;
	/* width: 100%; */
}
td {
	width: 49% !important;
}

</style>  

 <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
            <?php
            //print_r($message);exit();
            echo Growl::widget([
                'type' =>  $message['type'],
                'title' =>  Html::encode($message['title']),
                'icon' =>  $message['icon'],
                'body' =>  Html::encode($message['message']) ,
                'showSeparator' => true,
                'delay' => 1, //This delay is how long before the message shows
                'pluginOptions' => [
                    'delay' => $message['duration'], //This delay is how long the message shows for
                    'placement' => [
                        'from' => $message['positonY'],
                        'align' => $message['positonX'],
                    ]
                ]
            ]);
            ?>
        <?php endforeach; ?>
 


  <div id="titlebar" class="single">
    <div class="container">
      <div class="twelve columns">
        <h2>Profile Information</h2>
        <nav id="breadcrumbs">
          <ul>
            <li>You are here:</li>
            <li><a href="#">Home</a></li>
            <li>Profile Information</li>
          </ul>
        </nav>
      </div>
      <div class="col-md-3 right_side_buttons">
       <div class="row">
		<a href="<?= Url::to(['/common/employee'])?>"><i title="Edit your profile"
					class="fa fa-edit" style="font-size: 18px; margin-top: 25px;"></i> Edit Profile</a>
			
		</ul>
	</div>
	</div>
    </div>
  </div>
  
  <!-- Content
================================================== -->
  <div class="container"> 
    
    <!-- Submit Page -->
    <div class="sixteen columns">
      <div class="submit-page" style="padding:0px;">
        <div class="container">
          <div class="col-md-3 col-sm-3 col-xs-3 profile_img">
            <div class="resume-titlebar">
            <img class='image'
							src="<?php
							if($empmodel->profileimage){
														
							echo isset( $empmodel->profileimage)? Url::base().$empmodel->profileimage : '' ; 
							}else {
									 echo Url::base()."/frontend/web/images/user-iconnew.png" ;
								      }
								?>">
	  </img> </div>
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div  class="title-underlined">
                  
                    <h4>Personal Profile</h4>
                  </div>
     
                
                  <table class="table table-user-information ">
                    <tbody>
                      <tr>
                        <td >Your Name :</td>
                        <td > <?php echo isset( $empmodel->name)? $empmodel->name : 'Not Mentioned' ;  ?></td>
                      </tr>
                      <tr>
                        <td>Your Surname :</td>
                        <td> <?php echo  isset($empmodel->surname)? $empmodel->surname : 'Not Mentioned' ;    ?></td>
                      </tr>
                      <tr>
                        <td>Your Email :</td>
                        <td> <?php echo  isset($umodel->email)? $umodel->email : 'Not Mentioned' ;    ?></td>
                      </tr>
                      <tr>
                        <td>Gender :</td>
                        <td> <?php echo  isset($empmodel->gender)? $empmodel->gender : 'Not Mentioned' ;    ?></td>
                      </tr>
                      <tr>
                        <td>Mobile No :</td>
                        <td> <?php echo isset ($empmodel->mobilenumber)? $empmodel->mobilenumber : 'Not Mentioned' ;    ?></td>
                      </tr>
                      <tr>
                        <td>Date of Birth :</td>
                        <td><?php echo  isset($empmodel->dateofbirth)? $empmodel->dateofbirth : 'Not Mentioned' ;    ?></td>
                      </tr>
                       <tr>
                        <td>Country:</td>
                        <td><?php echo  isset($empmodel->country)? $empmodel->country : 'Not Mentioned' ;    ?></td>
                      </tr>
                       <td>State:</td>
                        <td><?php echo  isset($empmodel->state)? $empmodel->state : 'Not Mentioned' ;    ?></td>
                      </tr>
                       <td>City:</td>
                        <td><?php echo  isset($empmodel->city)? $empmodel->city : 'Not Mentioned' ;    ?></td>
                      </tr>
                        </tr>
                       <td>Employee Description:</td>
                        <td><?php echo  isset($empmodel->description)? $empmodel->description : 'Not Mentioned' ;    ?></td>
                      </tr>
                      
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div  class="title-underlined">
                    <h4>Your Project Details</h4>
                  </div>
                  <table class="table table-user-information ">
                    <tbody>
                      <tr>
                        <td>Project Title :</td>
                        <td><?php echo isset( $projectmodel->prjtitle) ? $projectmodel->prjtitle : 'Not Mentioned' ;?></td>
                      </tr>
                      <tr>
                        <td>Project Startting Date :</td>
                        <td><?php echo isset( $projectmodel->prjstartdate)  ? $projectmodel->prjstartdate : 'Not Mentioned' ;  ?></td>
                      </tr>
                      <tr>
                        <td>Project Ending Date :</td>
                        <td><?php echo  isset($projectmodel->prjenddate) ? $projectmodel->prjenddate : 'Not Mentioned' ; ?></td>
                      </tr>
                      <tr>
                        <td>Project Location :</td>
                        <td><?php echo isset( $projectmodel->prjlocation) ? $projectmodel->prjlocation : 'Not Mentioned' ;  ?></td>
                      </tr>
                      <tr>
                        <td>Project Employement Type :</td>
                        <td><?php echo  isset($projectmodel->emptype) ? $projectmodel->emptype : 'Not Mentioned' ;  ?></td>
                      </tr>
                      <tr>
                        <td>Project Description :</td>
                        <td><?php echo  isset($projectmodel->prjdescription) ? $projectmodel->prjdescription : 'Not Mentioned' ; ?></td>
                      </tr>
                      <tr>
                        <td>Project Role :</td>
                        <td><?php echo  isset($projectmodel->prjrole) ? $projectmodel->prjrole : 'Not Mentioned' ; ?></td>
                      </tr>
                      <tr>
                        <td>Role Description :</td>
                        <td><?php echo  isset($projectmodel->prjroledescription) ? $projectmodel->prjroledescription : 'Not Mentioned' ;  ?></td>
                      </tr>
                      <tr>
                        <td>Project Team Size :</td>
                        <td><?php echo isset( $projectmodel->teamsize) ? $projectmodel->teamsize : 'Not Mentioned' ;  ?></td>
                      </tr>
                      <tr>
                        <td>Skills Used In Project :</td>
                        <td><?php echo  isset($projectmodel->prjskills) ? $projectmodel->prjskills : 'Not Mentioned' ;  ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div  class="title-underlined">
                    <h4>Education Details</h4>
                  </div>
                  
                 <table class="table table-user-information ">
                    <tbody>
                      <tr>
                        <td >Highest Degree :</td>
                     
                        <td><?php echo  isset($edumodel->highdegree) ? $edumodel->highdegree : 'Not Mentioned' ;?></td>
                      </tr>
                      <tr>
                        <td>Highest Degree Specialization :</td>
                        <td><?php echo  isset($edumodel->specialization) ? $edumodel->specialization : 'Not Mentioned' ; ?></td>
                      </tr>
                      <tr>
                        <td>Your University :</td>
                        <td><?php echo  isset($edumodel->university) ? $edumodel->university : 'Not Mentioned' ; ?></td>
                      </tr>
                      <tr>
                        <td>Your College Name :</td>
                        <td><?php echo  isset($edumodel->collegename) ? $edumodel->collegename : 'Not Mentioned' ; ?></td>
                      </tr>
                      <tr>
                        <td>Passing Year</td>
                        <td><?php echo  isset($edumodel->passingyear) ? $edumodel->passingyear : 'Not Mentioned' ; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              
                <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div  class="title-underlined">
                    <h4>Your Job Preferences Details</h4>
                  </div>
             
                  <table class="table table-user-information ">
                    <tbody>
                      <tr>
                        <td> Functional Area :</td>
                        <td><?php echo isset($jobmodel->functionalarea) ?  $jobmodel->functionalarea : 'Not Mentioned'  ;?></td>
                      </tr>
                      <tr>
                        <td>Job Role :</td>
                        <td><?php echo isset( $jobmodel->jobrole) ?  $jobmodel->jobrole : 'Not Mentioned'  ;  ?></td>
                      </tr>
                      <tr>
                        <td>Preferd Location :</td>
                        <td><?php echo isset( $jobmodel->joblocation) ?  $jobmodel->joblocation : 'Not Mentioned'  ; ?></td>
                      </tr>
                      <tr>
                        <td>Your Selected Expeience :</td>
                        <td><?php echo isset( $jobmodel->experience) ?  $jobmodel->experience : 'Not Mentioned'  ;?></td>
                      </tr>
                      <tr>
                        <td>Job Type :</td>
                        <td><?php echo isset( $jobmodel->jobtype) ?  $jobmodel->jobtype : 'Not Mentioned'  ; ?></td>
                      </tr>
                      <tr>
                        <td>Your Expected Salary :</td>
                        <td><?php echo  isset($jobmodel->expectedsalary) ?  $jobmodel->expectedsalary : 'Not Mentioned'  ;  ?></td>
                      </tr>
                    </tbody>
                  </table>
                  
                  
                </div>
              </div>
              </div>
              <div class="row">
              
              <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div  class="title-underlined">
                    <h4>Your Employer Details</h4>
                  </div>
                  
                  <table class="table table-user-information ">
                    <tbody>
                      <tr>
                        <td>Your Employer :</td>
                        <td><?php echo isset($employermodel->employername) ? $employermodel->employername : 'Not Mentioned'; ?></td>
                      </tr>
                      <tr>
                        <td>Employer Type :</td>
                        <td><?php echo isset( $employermodel->employertype) ? $employermodel->employertype : 'Not Mentioned';  ?></td>
                      </tr>
                      <tr>
                        <td>Employer Designation :</td>
                        <td><?php echo  isset($employermodel->designation)  ? $employermodel->designation : 'Not Mentioned';  ?></td>
                      </tr> 
                    </tbody>
                  </table>
                </div>
                </div>

              <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div  class="title-underlined">
                    <h4>Your Job Skills Details</h4>
                  </div>
                  	<?php if(!empty($skillmodel)){?>
                  	<div>
                  	 <table class="table table-user-information ">
                  	 <tbody>
                      <tr>
                       <td style="width: 40% !important; font-weight: bold;"> Skill  Name :</td>
                          <td style="width: 30% !important; font-weight: bold;">Last Used :</td>
                            <td style="width: 30% !important; font-weight: bold;">Experience :</td>
                            </tr>
                  <?php foreach ($skillmodel as $alreadySkills){?>
                 
                   
                       <tr>
                        <td style="width: 40% !important;"><?php echo  $alreadySkills->skillname ;?></td>
                     
                     
                        <td style="width: 30% !important;"><?php echo  $alreadySkills->lastused; ?></td>
                      
                       
                        <td style="width: 30% !important;"><?php echo  $alreadySkills->skillexperience ;?></td>
                         </tr>
                      
                         <?php }?>
                          </tbody>
                  </table>
                  
                 </div>
                  
                  <?php }else{ ?>
                   <table class="table table-user-information ">
                    <tbody>
                      <tr>
                        <td style="width: 40% !important; font-weight: bold;">Skill Name :</td>
                        <td style="width: 40% !important;"><?php echo  'Not Mentioned' ;?></td>
                 
                        <td style="width: 40% !important; font-weight: bold;">Last Used :</td>
                        <td style="width: 40% !important;"><?php echo 'Not Mentioned' ;?></td>
                     
                        <td style="width: 40% !important; font-weight: bold;">Experience :</td>
                        <td style="width: 40% !important;"><?php echo  'Not Mentioned' ;?></td>
                      </tr>
                    </tbody>
                  </table>
                  <?php } ?>
                  
                </div>
              </div>
              <div class="col-md-6">
             
                <div class="margin-bottom-20">
                  <div  class="title-underlined">
                    <h4>Your Known Language Details</h4>
                  </div>
                  	<?php if(!empty($languagemodel)){?>
                  	 <table class="table table-user-information ">
                    <tbody>
                      <tr>
                  	       <td style="width: 30% !important; font-weight: bold;">Language :</td>
                  	            <td style="width: 35% !important; font-weight: bold;">Proficiency Level :</td>
                  	            <td style="width: 35% !important; font-weight: bold;">Ability:</td>
                  	            </tr>
                  <?php foreach ($languagemodel as $alreadylanguages){?>
                 
                       <tr>
                         <td style="width: 25% !important;"><?php echo  $alreadylanguages->language ;?></td>
                    
                       
                        <td style="width: 35% !important;"><?php echo  $alreadylanguages->proficiencylevel ;  ?></td>
                    
                       
                         <td style="width: 40% !important;"><?php echo  $alreadylanguages->ability;   ?></td>
                      </tr> 
                  
                    <?php }?>
                    </tbody>
                  </table>
                  <?php }else{ ?>
                   <table class="table table-user-information ">
                    <tbody>
                      <tr>
                        <td style="width: 40% !important; font-weight: bold;">Language :</th>
                        <td style="width: 40% !important;"><?php echo 'Not Mentioned';?></td>
                    
                        <th style="width: 40% !important; font-weight: bold;">Proficiency Level :</th>
                        <td style="width: 40% !important;"><?php echo  'Not Mentioned';  ?></td>
                    
                        <th style="width: 40% !important; font-weight: bold;">Ability :</th>
                        <td style="width: 40% !important;"><?php echo 'Not Mentioned';   ?></td>
                      </tr>
                    </tbody>
                  </table>
                    <?php } ?>
                </div>
              
            </div>
            </div>
          </div>
        </div>
         <div class="divider margin-top-0 padding-reset"></div>
         
    </div>
  </div>
  
 