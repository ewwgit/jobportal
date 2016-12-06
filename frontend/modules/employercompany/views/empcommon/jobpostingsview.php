<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'Employer Profile';
$this->params ['breadcrumbs'] [] = [
		'label' => 'Signup',
		'url' => [ 'index' ] ];
$this->params ['breadcrumbs'] [] = $this->title;
?>
<?php
// use yii\widgets\DetailView;
// use frontend\models\Employerjobpostings;

// $this->title = 'Job posting Details view';
// $this->params['breadcrumbs'][] = ['label' => 'Cancel Membership Details', 'url' => ['jobgrid']];
// $this->params['breadcrumbs'][] = $this->title;

?>

<div class="box">
 <div style="color: #6992d2; font-size: 19px;"><?php echo  $postings->designation ;?></div>
 
 <table id="vertical-1">

 <div><?php echo  $postings->company_name;  ?></div>
 <tr><img src="/jobportal/frontend/web/images/tick1.jpg"><?php echo  $postings->experience;  ?></tr>&nbsp;&nbsp;
 <tr><img src="/jobportal/frontend/web/images/art.png"><?php echo  $postings->state; $postings->city; $postings->country;  ?></tr><br><br>
 <tr>Salry:<?php echo  $postings->CTC;  ?></tr>
 <div class="form-group box" >
       <?= Html::a('Post', ['#'], ['class'=>'btn btn-primary']) ?>
  </div>
<tr><th>JobDescript:</th><td><?php  echo  $postings->Description;  ?></td></tr>
<tr><th>Salry:</th><td><?php echo  $postings->CTC;  ?></tr>
<tr><th>IndustryType:</th><td><?php echo  $postings->industry_type;  ?></td></tr>
<tr><th>Jobtype:</th><td><?php echo  $postings->jobtype;  ?></td></tr>
<tr><th>RoleCategory:</th><td><?php echo  $postings->rolecategory;  ?></td></tr>
<tr><th>Gender:</th><td><?php echo  $postings->gender;  ?></td></tr>
<tr><th>address:</th><td><?php echo  $postings->address;  ?></td></tr>
<tr><th>skills:</th><td><?php echo  $postings->skills;  ?></td></tr>

</table>

 
 <h4>Desired Candidate Profile</h4>
<p>Please refer to the Job description above</p>
<h4>Company Profile:
ExpertWebWorx Pvt.Ltd</h4>
<p>ExpertWebWorx Pvt.Ltd world's best talent for hiring your dedicated resources</p>
 </div>
 <div class="box">
 <tr><td>Contact Company:</td><td><?php echo  $postings->company_name;  ?></td></tr><br><br>
 <tr><td>Website:</td><td> <a href="http://www.expertwebworx.com/">http://www.ExpertWebworx,com</a> </td></tr>

 
 
 </div>
  
 <div class="form-group" >
          <?= Html::a('Back', ['/employercompany/empcommon/jobpostingslist'], ['class'=>'btn btn-primary']) ?>
    </div>
    
    
 