<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'Samurai Meetups').': '.Yii::t('app', 'Admin');
?>

<h1><?= Yii::t('app', 'Site Settings')?></h1>
<hr/>

<div class="row">
	<table class="table table-striped table-bordered">
	<tr>
		<th class="col-md-3">Key</th>
		<th class="col-md-4">Value (EN)</th>
		<th class="col-md-4">Value (JP)</th>
		<th class="col-md-1">Actions</th>
	</tr>
	<?php foreach($siteSettings as $element): ?>
		<tr>
			<td><?=$element['key']?></td>
			<td><?=$element['value_en']?></td>
			<td><?=$element['value_jp']?></td>
			<td>
				<button type="button" class="btn btn-primary"><?= Yii::t('app', 'Update')?></button>
			</td>
		</tr>
	<?php endforeach;?>
	</table>
</div>

<?php foreach($sitePolicies as $element):?>
	<hr/>
	<div class="row">
		<h2>
			<div class="col-md-10"><?=$element[0]['key']?></div>
			<div class="col-md-2 text-align-right">
				<button type="button" class="btn btn-primary"><?= Yii::t('app', 'Update')?></button>
			</div>
		</h2>
	</div>
	<div class="row margin-top-20 max-height-300">
		<table class="table table-striped table-bordered">
		<tr>
			<th class="half-width">Value (EN)</th>
			<th class="half-width">Value (JP)</th>
		</tr>
		<tr>
			<td><?=$element[0]['value_en']?></td>
			<td><?=$element[0]['value_jp']?></td>
		</tr>
		</table>
	</div>
<?php endforeach;?>
