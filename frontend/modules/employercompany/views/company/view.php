<?php

/* echo $model;
 exit; */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


?>
<html>
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
<h3>Post A JOB</h3>

<table id="vertical-1">           
      
            <tr>
               <th>job_title</th>
                 <td><?php echo $model->job_title; ?></td>
            </tr>
            <tr>
                <th>job_role</th>
                <td><?php echo $model->job_role; ?></td>
            </tr>
              
            <tr>
                <th>job_type</th>
                <td><?php echo $model->job_type; ?></td>
            </tr>
            <tr>
                <th>job_description</th>
                <td><?php echo $model->job_description; ?></td>
            </tr>
            <tr>
               <th>experience</th>
               <td><?php echo $model->experience; ?></td>
            </tr>
            <tr>
                <th>no_of_openings</th>
                <td><?php echo $model->no_of_openings; ?></td>
            </tr>
            <tr>
               <th>work_location</th>
                <td><?php echo $model->work_location; ?></td>
            </tr>
            <tr>
                <th>shift_timings</th>
               <td><?php echo $model->shift_timings; ?></td>
            </tr>
      <tr>
                <th>weekly_days</th>
               <td><?php echo $model->weekly_days; ?></td>
            </tr>    
              <tr>
                <th>salary</th>
               <td><?php echo $model->salary; ?></td>
            </tr>
            
        </table>
        
        <div class="button">
<a href="<?= Url::to(['user/myjobs'])?>"><i class="fa fa-edit"></i> <?= Html::submitButton(  'Next', [ 'btn btn-success' , 'btn btn-primary'])?></a>
</div>
</html>