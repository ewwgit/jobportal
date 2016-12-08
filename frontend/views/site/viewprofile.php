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
                        <td><?php //echo  $languagemodel->language ;?></td>
                      </tr>
                      <tr>
                        <td>Proficiency Level :</td>
                        <td><?php// echo  $languagemodel->proficiencylevel;  ?></td>
                      </tr>
                      <tr>
                        <td>Your Language Ability :</td>
                        <td><?php //echo  $languagemodel->ability;  ?></td>
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
  
  <!-- Footer
================================================== -->
  

<!-- Wrapper / End --> 

<!-- Scripts
================================================== --> 
<script src="scripts/jquery-2.1.3.min.js"></script> 
<script src="scripts/custom.js"></script> 
<script src="scripts/jquery.superfish.js"></script> 
<script src="scripts/jquery.themepunch.tools.min.js"></script> 
<script src="scripts/jquery.themepunch.revolution.min.js"></script> 
<script src="scripts/jquery.themepunch.showbizpro.min.js"></script> 
<script src="scripts/jquery.flexslider-min.js"></script> 
<script src="scripts/chosen.jquery.min.js"></script> 
<script src="scripts/jquery.magnific-popup.min.js"></script> 
<script src="scripts/waypoints.min.js"></script> 
<script src="scripts/jquery.counterup.min.js"></script> 
<script src="scripts/jquery.jpanelmenu.js"></script> 
<script src="scripts/stacktable.js"></script> 
<script src="scripts/headroom.min.js"></script> 
<script src="scripts/vendor-datepicker.js"></script> 
<script src="scripts/vendor-date.js"></script> 

<!-- WYSIWYG Editor --> 
<script type="text/javascript" src="scripts/jquery.sceditor.bbcode.min.js"></script> 
<script type="text/javascript" src="scripts/jquery.sceditor.js"></script> 

<!-- Style Switcher
================================================== --> 
<script src="scripts/switcher.js"></script>
<div id="style-switcher">
  <h2>Style Switcher <a href="#"></a></h2>
  <div>
    <h3>Predefined Colors</h3>
    <ul class="colors" id="color1">
      <li><a href="#" class="green" title="Green"></a></li>
      <li><a href="#" class="blue" title="Blue"></a></li>
      <li><a href="#" class="orange" title="Orange"></a></li>
      <li><a href="#" class="navy" title="Navy"></a></li>
      <li><a href="#" class="yellow" title="Yellow"></a></li>
      <li><a href="#" class="peach" title="Peach"></a></li>
      <li><a href="#" class="beige" title="Beige"></a></li>
      <li><a href="#" class="purple" title="Purple"></a></li>
      <li><a href="#" class="celadon" title="Celadon"></a></li>
      <li><a href="#" class="pink" title="Pink"></a></li>
      <li><a href="#" class="red" title="Red"></a></li>
      <li><a href="#" class="brown" title="Brown"></a></li>
      <li><a href="#" class="cherry" title="Cherry"></a></li>
      <li><a href="#" class="cyan" title="Cyan"></a></li>
      <li><a href="#" class="gray" title="Gray"></a></li>
      <li><a href="#" class="olive" title="Olive"></a></li>
    </ul>
    <h3>Layout Style</h3>
    <div class="layout-style">
      <select id="layout-style">
        <option value="2">Wide</option>
        <option value="1">Boxed</option>
      </select>
    </div>
    <h3>Header Style</h3>
    <div class="layout-style">
      <select id="header-style">
        <option value="1">Style 1</option>
        <option value="2">Style 2</option>
        <option value="3">Style 3</option>
      </select>
    </div>
    <h3>Background Image</h3>
    <ul class="colors bg" id="bg">
      <li><a href="#" class="bg1"></a></li>
      <li><a href="#" class="bg2"></a></li>
      <li><a href="#" class="bg3"></a></li>
      <li><a href="#" class="bg4"></a></li>
      <li><a href="#" class="bg5"></a></li>
      <li><a href="#" class="bg6"></a></li>
      <li><a href="#" class="bg7"></a></li>
      <li><a href="#" class="bg8"></a></li>
      <li><a href="#" class="bg9"></a></li>
      <li><a href="#" class="bg10"></a></li>
      <li><a href="#" class="bg11"></a></li>
      <li><a href="#" class="bg12"></a></li>
      <li><a href="#" class="bg13"></a></li>
      <li><a href="#" class="bg14"></a></li>
      <li><a href="#" class="bg15"></a></li>
      <li><a href="#" class="bg16"></a></li>
    </ul>
    <h3>Background Color</h3>
    <ul class="colors bgsolid" id="bgsolid">
      <li><a href="#" class="green-bg" title="Green"></a></li>
      <li><a href="#" class="blue-bg" title="Blue"></a></li>
      <li><a href="#" class="orange-bg" title="Orange"></a></li>
      <li><a href="#" class="navy-bg" title="Navy"></a></li>
      <li><a href="#" class="yellow-bg" title="Yellow"></a></li>
      <li><a href="#" class="peach-bg" title="Peach"></a></li>
      <li><a href="#" class="beige-bg" title="Beige"></a></li>
      <li><a href="#" class="purple-bg" title="Purple"></a></li>
      <li><a href="#" class="red-bg" title="Red"></a></li>
      <li><a href="#" class="pink-bg" title="Pink"></a></li>
      <li><a href="#" class="celadon-bg" title="Celadon"></a></li>
      <li><a href="#" class="brown-bg" title="Brown"></a></li>
      <li><a href="#" class="cherry-bg" title="Cherry"></a></li>
      <li><a href="#" class="cyan-bg" title="Cyan"></a></li>
      <li><a href="#" class="gray-bg" title="Gray"></a></li>
      <li><a href="#" class="olive-bg" title="Olive"></a></li>
    </ul>
  </div>
  <div id="reset"><a href="#" class="button color">Reset</a></div>
</div>
