<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Samurai Meetups').': '.Yii::t('app', 'Reports');
?>

<div class="row">
<h1>
	<div class="col-md-9"><?=Yii::t('app', 'Reports')?></div>
	<div class="col-md-3 text-align-right">
		<button type="button" class="btn btn-success"><?= Yii::t('app', 'Add Report')?></button>
	</div>
</h1>
</div>
<hr/>

<h2><?=Yii::t('app', 'Table of Contents')?></h2>
<ul>
<?php foreach($reports as $element):?>
	<div class="row">
		<li><a href="#<?=$element['id']?>"><?=$element['short_description_en']?></a></li>
	</div>
<?php endforeach; ?>
</ul>
<hr/>

<?php foreach($reports as $element):?>
<div class="row" id="<?=$element['id']?>">
	<h4>
		<div class="col-md-9 font-weight-bold"><?=$element['short_description_en']?></div>
		<div class="col-md-3 text-align-right">
			<button type="button" class="btn btn-primary"><?= Yii::t('app', 'Update')?></button>
			<button type="button" class="btn btn-danger margin-left-10"><?= Yii::t('app', 'Delete')?></button>
		</div>
	</h4>
</div>

<div class="row margin-top-20">
<table class="table table-striped table-bordered">
	<tr>
		<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Sidebar Image')?></td>
		<td><img class="border-radius-10 report-sidebar-element-photo" src="<?=Url::base().'images/'.$element['sidebar_image_url']?>"/></td>
	</tr>
	<tr>
		<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Left Image')?></td>
		<td><img class="height-150-px" src="<?=Url::base().'images/'.$element['worker_image_url']?>"/></td>
	</tr>
	<tr>
		<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Center Image')?></td>
		<td><img class="height-150-px" src="<?=Url::base().'images/'.$element['experience_image_url']?>"/></td>
	</tr>
	<tr>
		<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Right Image')?></td>
		<td><img class="height-150-px" src="<?=Url::base().'images/'.$element['set_image_url']?>"/></td>
	</tr>
	<tr>
		<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Sidebar Description (English)')?></td>
		<td><?=$element['short_description_en']?></td>
	</tr>
	<tr>
		<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Sidebar Description (Japanese)')?></td>
		<td><?=$element['short_description_jp']?></td>
	</tr>
	<tr>
		<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Description (English)')?></td>
		<td><?=$element['description_en']?></td>
	</tr>
	<tr>
		<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Description (Japanese)')?></td>
		<td><?=$element['description_jp']?></td>
	</tr>
	<tr>
		<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Type')?></td>
		<td>
			<?php
				$type = "Meetup Tour";
				if ($element['type_id'] == 2) {
					$type = "Discovery Tour";
				}
			?>
			<?=$type?>
		</td>
	</tr>
	<tr>
		<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Actions')?></td>
		<td>
			<button type="button" class="btn btn-primary"><?= Yii::t('app', 'Update')?></button> 
			<button type="button" class="btn btn-danger margin-left-10"><?= Yii::t('app', 'Delete')?></button>
		</td>
	</tr>
</table>
</div>
<hr/>
<?php endforeach;?>

<div class="row">
	<a href="#">
    	<button type="button" class="btn btn-success col-md-2 col-md-offset-5">
    		<?= Yii::t('app', 'Add Report')?>
    	</button>	
    </a>
</div>