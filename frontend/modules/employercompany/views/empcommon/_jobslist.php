<?php
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;
?>
<tr>
				<td class="title"><a href="#"><?= $model['designation'];?></a></td>
				<td class="centered">-</td>
				<td>September 30, 2015</td>
				<td>October 10, 2015</td>
				<td class="centered"><a href="manage-applications.html" class="button">Show (4)</a></td>
				<td class="action">
					<a href="#"><i class="fa fa-pencil"></i> Edit</a>
					<a href="#"><i class="fa  fa-check "></i> Mark Filled</a>
					<a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
				</td>
			</tr>	