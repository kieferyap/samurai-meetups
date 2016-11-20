<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'Samurai Meetups').': '.Yii::t('app', 'Admin');
?>

<h1><?= Yii::t('app', 'Admin List')?></h1>
<hr/>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th class="col-md-6"><?= Yii::t('app', 'Username')?></th>
			<th class="col-md-3"><?= Yii::t('app', 'Last Login')?></th>
			<th class="col-md-3"><?= Yii::t('app', 'Actions')?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($admins as $element):?>
			<tr>
				<td><?=$element['username']?></td>
				<td><?=$element['last_login']?></td>
				<td>
    				<button type="button" class="btn btn-primary"><?= Yii::t('app', 'Change')?></button> 
    				<button type="button" class="btn btn-danger margin-left-10"><?= Yii::t('app', 'Delete')?></button>
				</td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>
<div class="row">
	<a href="#">
    	<button type="button" class="btn btn-success col-md-2 col-md-offset-5">
    		<?= Yii::t('app', 'Add New Admin')?>
    	</button>	
    </a>
</div>