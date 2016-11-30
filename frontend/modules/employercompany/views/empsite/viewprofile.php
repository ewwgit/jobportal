<?php 


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>



<h3>Employer Profile</h3>
<div>
<table id="vertical-1">           
      
            <tr>
               <th>username</th>
                 <td><?php echo $model->username; ?></td>
            </tr>
            <tr>
                <th>name</th>
                <td><?php echo $model->name; ?></td>
            </tr>
              
            <tr>
                <th>mobilenumber</th>
                <td><?php echo $model->mobilenumber; ?></td>
            </tr>
            <tr>
                <th>email</th>
                <td><?php echo $model->email; ?></td>
            </tr>
            <tr>
               <th>gender</th>
               <td><?php echo $model->gender; ?></td>
            </tr>
            <tr>
                <th>designation</th>
                <td><?php echo $model->designation; ?></td>
            </tr>
            <tr>
               <th>dateofbirth</th>
                <td><?php echo $model->dateofbirth; ?></td>
            </tr>
            <tr>
                <th>address</th>
               <td><?php echo $model->address; ?></td>
            </tr>
          
            
        </table>
        </div>
        <div>
        
<h3>Employer Company Profile</h3>
<table id="vertical-1">           
      
            <tr>
               <th>company_name</th>
                 <td><?php echo $jobmodel->company_name; ?></td>
            </tr>
            <tr>
                <th>company_type</th>
                <td><?php echo $jobmodel->company_type; ?></td>
            </tr>
              
            <tr>
                <th>industry_type</th>
                <td><?php echo $jobmodel->industry_type; ?></td>
            </tr>
            <tr>
                <th>dateofestablishment</th>
                <td><?php echo $jobmodel->dateofestablishment; ?></td>
            </tr>
            <tr>
               <th>location</th>
               <td><?php echo $jobmodel->location; ?></td>
            </tr>
            <tr>
                <th>country</th>
                <td><?php echo $jobmodel->country; ?></td>
            </tr>
            <tr>
               <th>state</th>
                <td><?php echo $jobmodel->state; ?></td>
            </tr>
            <tr>
                <th>city</th>
               <td><?php echo $jobmodel->city; ?></td>
            </tr>
            <tr>
                <th>zipcode</th>
               <td><?php echo $jobmodel->zipcode; ?></td>
            </tr>
      
        </table>
        </div>
<div>
        
<h3>Employer Education Profile</h3>
<table>
<tr><td>Highest Degree</td><td><?php echo  $edumodel->higherdegree ;?></td></tr>
<tr><td>Highest Degree Specialization:</td><td><?php echo  $edumodel->specialization;  ?></td></tr>
<tr><td>Your University:</td><td><?php echo  $edumodel->university;  ?></td></tr>
<tr><td>Your College Name:</td><td><?php echo  $edumodel->collegename;  ?></td></tr>
<tr><td>Passing Year:</td><td><?php echo  $edumodel->passingyear;  ?></td></tr>


</table>
</div>
<div>
<h3>Set Preferences</h3>

<table>
<tr><td>Expected Salary:</td><td><?php echo  $empmodel->expected_salary ;?></td></tr>
<tr><td>Job Role:</td><td><?php echo  $empmodel->job_role;  ?></td></tr>
<tr><td>Job Location:</td><td><?php echo  $empmodel->job_location;  ?></td></tr>

</table>
</div>