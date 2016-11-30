
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
<h3>Employer Company  Profile</h3>

<table id="vertical-1">           
      
            <tr>
               <th>company_name</th>
                 <td><?php echo $model->company_name; ?></td>
            </tr>
            <tr>
                <th>dateofestablishment</th>
                <td><?php echo $model->dateofestablishment; ?></td>
            </tr>
              
            <tr>
                <th>company_type</th>
                <td><?php echo $model->company_type; ?></td>
            </tr>
            <tr>
                <th>industry_type</th>
                <td><?php echo $model->industry_type; ?></td>
            </tr>
            <tr>
               <th>location</th>
               <td><?php echo $model->location; ?></td>
            </tr>
            <tr>
                <th>country</th>
                <td><?php echo $model->country; ?></td>
            </tr>
            <tr>
               <th>state</th>
                <td><?php echo $model->state; ?></td>
            </tr>
            <tr>
                <th>city</th>
               <td><?php echo $model->city; ?></td>
            </tr>
      <tr>
                <th>zipcode</th>
               <td><?php echo $model->zipcode; ?></td>
            </tr>    
            
        </table>
        
        <div class="button">
<a href="<?= Url::to(['user/company'])?>"><i class="fa fa-edit"></i> <?= Html::submitButton(  'Next', [ 'btn btn-success' , 'btn btn-primary'])?></a>
</div>
</html>