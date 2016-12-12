<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'UserProfile';
?>

  
 
  <!-- Titlebar
================================================== -->
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
            <div class="resume-titlebar"> <img class='image' src="<?php echo Yii::getAlias('/jobportal').$empmodel->profileimage; ?>" width="100" height="100">
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
                        <td > <?php echo  $empmodel->name;  ?></td>
                      </tr>
                      <tr>
                        <td>Your Surname :</td>
                        <td> <?php echo  $empmodel->surname;  ?></td>
                      </tr>
                      <tr>
                        <td>Your Email :</td>
                        <td> <?php echo  $umodel->email;  ?></td>
                      </tr>
                      <tr>
                        <td>Gender :</td>
                        <td> <?php echo  $empmodel->gender;  ?></td>
                      </tr>
                      <tr>
                        <td>Mobile No :</td>
                        <td> <?php echo  $empmodel->mobilenumber;  ?></td>
                      </tr>
                      <tr>
                        <td>Date of Birth :</td>
                        <td><?php echo  $empmodel->dateofbirth;  ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div  class="title-underlined">
                    <h4>Education Details</h4>
                  </div>
                  <table class="table table-user-information ">
                    <tbody>
                      <tr>
                        <td >Highest Degree :</td>
                        <td><?php echo  $edumodel->highdegree ;?></td>
                      </tr>
                      <tr>
                        <td>Highest Degree Specialization :</td>
                        <td><?php echo  $edumodel->specialization;  ?></td>
                      </tr>
                      <tr>
                        <td>Your University :</td>
                        <td><?php echo  $edumodel->university;  ?></td>
                      </tr>
                      <tr>
                        <td>Your College Name :</td>
                        <td><?php echo  $edumodel->collegename;  ?></td>
                      </tr>
                      <tr>
                        <td>Passing Year</td>
                        <td><?php echo  $edumodel->passingyear;  ?></td>
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
                    <h4>Your Job Preferences Details</h4>
                  </div>
                  <table class="table table-user-information ">
                    <tbody>
                      <tr>
                        <td> FunctionalArea :</td>
                        <td><?php echo  $jobmodel->functionalarea ;?></td>
                      </tr>
                      <tr>
                        <td>JobRole :</td>
                        <td><?php echo  $jobmodel->jobrole;  ?></td>
                      </tr>
                      <tr>
                        <td>Preferd Location :</td>
                        <td><?php echo  $jobmodel->joblocation;  ?></td>
                      </tr>
                      <tr>
                        <td>Your Selected Expeience :</td>
                        <td><?php echo  $jobmodel->experience;  ?></td>
                      </tr>
                      <tr>
                        <td>Job Type :</td>
                        <td><?php echo  $jobmodel->jobtype;  ?></td>
                      </tr>
                      <tr>
                        <td>Your Expected Salary :</td>
                        <td><?php echo  $jobmodel->expectedsalary;  ?></td>
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
                  <table class="table table-user-information ">
                    <tbody>
                      <tr>
                        <td> Your SkillName :</td>
                        <td><?php echo  $skillmodel->skillname ;?></td>
                      </tr>
                      <tr>
                        <td>Lastused :</td>
                        <td><?php echo  $skillmodel->lastused ;?></td>
                      </tr>
                      <tr>
                        <td>Your Skill Experience :</td>
                        <td><?php echo  $skillmodel->skillexperience ;?></td>
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
                    <h4>Your Project Details</h4>
                  </div>
                  <table class="table table-user-information ">
                    <tbody>
                      <tr>
                        <td>Project Title :</td>
                        <td><?php echo  $projectmodel->prjtitle ;?></td>
                      </tr>
                      <tr>
                        <td>Project Startting Date :</td>
                        <td><?php echo  $projectmodel->prjstartdate;  ?></td>
                      </tr>
                      <tr>
                        <td>Project Ending Date :</td>
                        <td><?php echo  $projectmodel->prjenddate;  ?></td>
                      </tr>
                      <tr>
                        <td>Project Location :</td>
                        <td><?php echo  $projectmodel->prjlocation;  ?></td>
                      </tr>
                      <tr>
                        <td>Project Employement Type :</td>
                        <td><?php echo  $projectmodel->emptype;  ?></td>
                      </tr>
                      <tr>
                        <td>Project Description :</td>
                        <td><?php echo  $projectmodel->prjdescription;  ?></td>
                      </tr>
                      <tr>
                        <td>Project Role :</td>
                        <td><?php echo  $projectmodel->prjrole;  ?></td>
                      </tr>
                      <tr>
                        <td>Role Description :</td>
                        <td><?php echo  $projectmodel->prjroledescription;  ?></td>
                      </tr>
                      <tr>
                        <td>Project Team Size :</td>
                        <td><?php echo  $projectmodel->teamsize;  ?></td>
                      </tr>
                      <tr>
                        <td>Skills Used In Project :</td>
                        <td><?php echo  $projectmodel->prjskills;  ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-6">
                <div class="margin-bottom-20">
                  <div  class="title-underlined">
                    <h4>Your Employer Details</h4>
                  </div>
                  <table class="table table-user-information ">
                    <tbody>
                      <tr>
                        <td>Your Employer :</td>
                        <td><?php echo  $employermodel->employername ;?></td>
                      </tr>
                      <tr>
                        <td>Employer Type :</td>
                        <td><?php echo  $employermodel->employertype;  ?></td>
                      </tr>
                      <tr>
                        <td>Employer Designation :</td>
                        <td><?php echo  $employermodel->designation;  ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="margin-bottom-20">
                  <div  class="title-underlined">
                    <h4>Your Known Language Details</h4>
                  </div>
                  <table class="table table-user-information ">
                    <tbody>
                      <tr>
                        <td>Language :</td>
                        <td><?php echo  $languagemodel->language ;?></td>
                      </tr>
                      <tr>
                        <td>Proficiency Level :</td>
                        <td><?php echo  $languagemodel->proficiencylevel;  ?></td>
                      </tr>
                      <tr>
                        <td>Your Language Ability :</td>
                        <td><?php echo  $languagemodel->ability;  ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
         <div class="divider margin-top-0 padding-reset"></div>
         
    </div>
  </div>
  
 