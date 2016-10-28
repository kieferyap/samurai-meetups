<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Samurai Meetups').': '.Yii::t('app', 'Tours');
?>
<div class="row">
<h1>
	<div class="col-md-9"><?=Yii::t('app', 'Tours')?></div>
	<div class="col-md-3 text-align-right">
		<button type="button" class="btn btn-success"><?= Yii::t('app', 'Add Tour')?></button>
	</div>
</h1>
</div>
<hr/>


<div class="row">
	<?php foreach($tours as $element):?>
	<table class="table table-striped table-bordered">
		<tr>
			<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Event Summary')?></td>
			<td><?=$element['event_summary']?></td>
		</tr>
		<tr>
			<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Meeting Time and Place')?></td>
			<td><?=$element['meeting_time_and_place']?></td>
		</tr>
		<tr>
			<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Place for visit and tips')?></td>
			<td><?=$element['place_for_visit_and_tips']?></td>
		</tr>
		<tr>
			<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Time schedule')?></td>
			<td><?=$element['time_schedule']?></td>
		</tr>
		<tr>
			<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Price')?></td>
			<td><?=$element['price']?></td>
		</tr>
		<tr>
			<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'SAMURAI information')?></td>
			<td><?=$element['samurai_information']?></td>
		</tr>
		<tr>
			<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Tour Banner')?></td>
			<td><img class="height-150-px" src="<?=Url::base().'images/'.$element['image_url']?>"/></td>
		</tr>
		<tr>
			<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Top Page Banner')?></td>
			<td><img class="height-150-px" src="<?=Url::base().'images/'.$element['top_image_url']?>"/></td>
		</tr>
		<tr>
			<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Actions')?></td>
			<td>
				<button type="button" class="btn btn-primary"><?= Yii::t('app', 'Update')?></button> 
    			<button type="button" class="btn btn-danger margin-left-10"><?= Yii::t('app', 'Delete')?></button>
    		</td>
		</tr>
	</table>
	<hr/>
	<?php endforeach;?>
</div>
<div class="row">
	<a href="#">
    	<button type="button" class="btn btn-success col-md-2 col-md-offset-5">
    		<?= Yii::t('app', 'Add Tour')?>
    	</button>	
    </a>
</div>