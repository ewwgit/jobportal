
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
<h3>Employer Profile</h3>
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
               <th>address</th>
               <td><?php echo $model->address; ?></td>
            </tr>
            <tr>
               <th>designation</th>
               <td><?php echo $model->designation; ?></td>
            </tr>
           
            <tr>
               <th>dateofbirth</th>
                <td><?php echo $model->dateofbirth; ?></td>
            </tr>
           
          
            
        </table>
        
        <div class="button">
<a href="<?= Url::to(['user/update'])?>"><i class="fa fa-edit"></i> <?= Html::submitButton(  'Update', [ 'btn btn-success' , 'btn btn-primary'])?></a>
</div>
       
</html>