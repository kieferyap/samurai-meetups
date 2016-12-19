<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = Yii::t('app', 'Samurai Meetups').': '.Yii::t('app', 'Tours');
?>
<div id="data-type-source" class="hidden"><?=$dataTypeSource?></div>
<div id="data-index-source" class="hidden"><?=$dataIndexSource?></div>

<div class="row">
	<div class="col-md-9"><?=Yii::t('app', 'Tours')?></div>
	<div class="col-md-3">
		<?php 
			$addNewItem = Yii::t('app', 'Add New Item');
			Modal::begin([
				'header' => '<h3>'.$addNewItem.'</h3>',
				'toggleButton' => [
					'label' => $addNewItem,
					'class' => 'btn btn-success btn-add'
				],
				'footer' => '<button 
					type="button" 
					class="btn btn-success btn-action-add"
					data-add-url="'.Url::toRoute('ajax/create-tour').'">'
					.$addNewItem
					.'</button>',
			]);
		?>
		<div class="modal-inner-data-new">
		</div>
		<?php
			Modal::end();
		?>
	</div>
</div>
<hr/>


<div class="row">
	<?php foreach($tours as $index => $element):?>
	<table class="table table-striped table-bordered row-fields" id="row-<?=$index?>">
		<tr>
			<td 
				class="col-md-3 font-weight-bold field" 
				data-type="formatted-textarea" 
				data-field="event_summary" 
			><?= Yii::t('app', 'Event Summary')?></td>
			<td class="value"><?=$element['event_summary']?></td>
		</tr>
		<tr>
			<td 
				class="col-md-3 font-weight-bold field" 
				data-type="formatted-textarea" 
				data-field="meeting_time_and_place"
			><?= Yii::t('app', 'Meeting Time and Place')?></td>
			<td class="value"><?=$element['meeting_time_and_place']?></td>
		</tr>
		<tr>
			<td 
				class="col-md-3 font-weight-bold field" 
				data-type="formatted-textarea" 
				data-field="place_for_visit_and_tips"
			><?= Yii::t('app', 'Place for visit and tips')?></td>
			<td class="value"><?=$element['place_for_visit_and_tips']?></td>
		</tr>
		<tr>
			<td 
				class="col-md-3 font-weight-bold field" 
				data-type="formatted-textarea" 
				data-field="time_schedule"
			><?= Yii::t('app', 'Time schedule')?></td>
			<td class="value"><?=$element['time_schedule']?></td>
		</tr>
		<tr>
			<td 
				class="col-md-3 font-weight-bold field" 
				data-type="formatted-textarea" 
				data-field="price"
			><?= Yii::t('app', 'Price')?></td>
			<td class="value"><?=$element['price']?></td>
		</tr>
		<tr>
			<td 
				class="col-md-3 font-weight-bold field" 
				data-type="formatted-textarea" 
				data-field="samurai_information"
			><?= Yii::t('app', 'SAMURAI information')?></td>
			<td class="value"><?=$element['samurai_information']?></td>
		</tr>
		<tr>
			<td 
				class="col-md-3 font-weight-bold field" 
				data-type="image-upload" 
				data-field="image_url" 
				data-class="height-150-px"
			><?= Yii::t('app', 'Tour Banner')?></td>
			<td class="value">
				<img class="height-150-px" src="<?=Url::base().'images/'.$element['image_url']?>"/>
			</td>
		</tr>
		<tr>
			<td 
				class="col-md-3 font-weight-bold field" 
				data-type="image-upload" 
				data-field="top_image_url" 
				data-class="height-150-px"
			><?= Yii::t('app', 'Top Page Banner')?></td>
			<td class="value">
				<img class="height-150-px" src="<?=Url::base().'images/'.$element['top_image_url']?>"/>
			</td>
		</tr>
		<tr>
			<td class="col-md-3 font-weight-bold"><?= Yii::t('app', 'Actions')?></td>
			<td>
				<?php 
					$update = Yii::t('app', 'Update');
					Modal::begin([
						'header' => '<h3>'.$update.'</h3>',
						'toggleButton' => [
							'label' => $update,
							'class' => 'btn btn-primary btn-update',
							'data-id' => $element['id']
						],
						'footer' => '<button  
							type="button"  
							class="btn btn-primary btn-action-update"  
							data-id="'.$element['id'].'" 
							data-update-url="'.Url::toRoute('ajax/update-tour').'">' 
							.Yii::t('app', 'Update') 
							.'</button>', 
					]);
				?>
				
				<div class="modal-inner-data-<?=$element['id']?>">
				</div>

				<?php
					Modal::end();
				?>
    			<button 
					type="button" 
					data-delete-url="<?=Url::toRoute('ajax/delete-tour')?>"
					class="btn btn-danger btn-delete margin-left-10"
					data-id="<?=$element['id']?>"
				>
					<?= Yii::t('app', 'Delete')?>
				</button>
    		</td>
		</tr>
	</table>
	<hr/>
	<?php endforeach;?>
</div>
<div class="row">
	<?php 
		$addNewItem = Yii::t('app', 'Add New Item');
		Modal::begin([
			'header' => '<h3>'.$addNewItem.'</h3>',
			'toggleButton' => [
				'label' => $addNewItem,
				'class' => 'btn btn-success btn-add col-md-2 col-md-offset-5'
			],
			'footer' => '<button 
				type="button" 
				class="btn btn-success btn-action-add"
				data-add-url="'.Url::toRoute('ajax/create-tour').'">'
				.$addNewItem
				.'</button>',
		]);
	?>
	
	<div class="modal-inner-data-new">
	</div>

	<?php
		Modal::end();
	?>
</div>