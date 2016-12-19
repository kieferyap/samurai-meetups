<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = Yii::t('app', 'Samurai Meetups').': '.Yii::t('app', 'Admin');
?>

<div id="data-type-source" class="hidden"><?=$dataTypeSource?></div>
<div id="data-index-source" class="hidden"><?=$dataIndexSource?></div>

<h1><?= Yii::t('app', 'Site Settings')?></h1>
<hr/>

<div class="row">
	<table class="table table-striped table-bordered row-fields">
	<tr>
		<th class="col-md-3">Key</th>
		<th class="col-md-4 field">Value (EN)</th>
		<th class="col-md-4 field">Value (JP)</th>
		<th class="col-md-1">Actions</th>
	</tr>

	<?php foreach($siteSettings as $element): ?>
		<tr class="row-content" id="row-<?=$element['id']?>">
			<?php
				// Check if it is an image
				$value_en = $element['value_en'];
				$value_jp = $element['value_jp'];
				$class = '';

				if ($element['key_type'] == 'image-upload') {
					$value_en = '<img class="max-width-250" src="'
						.Url::base().'images/'.$element['value_en'].'"/>';
					$value_jp = '<img class="max-width-250" src="'
						.Url::base().'images/'.$element['value_jp'].'"/>';
					$class = 'max-width-250';
				}
			?>
			<td><?=$element['key']?></td>
			<td class="value" data-type="<?=$element['key_type']?>" data-field="value_en" data-class="<?=$class?>"><?=$value_en?></td>
			<td class="value" data-type="<?=$element['key_type']?>" data-field="value_jp" data-class="<?=$class?>"><?=$value_jp?></td>
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
							data-update-url="'.Url::toRoute('ajax/update-site-settings').'">' 
							.Yii::t('app', 'Update') 
							.'</button>',
					]);
				?>
				
				<div class="modal-inner-data-<?=$element['id']?>">
				</div>

				<?php
					Modal::end();
				?> 
			</td>
		</tr>
	<?php endforeach;?>
	</table>
</div>

<?php foreach($sitePolicies as $index => $element):?>
	<hr/>
	<?php $updatedIndex = $index + count($siteSettings);?>
	<div class="row">
		<div class="col-md-10"><h2><?=$element[0]['key']?></h2></div>
		<div class="col-md-2">
			<?php 
				$update = Yii::t('app', 'Update');
				Modal::begin([
					'header' => '<h3>'.$update.': '.$element[0]['key'].'</h3>',
					'toggleButton' => [
						'label' => $update,
						'class' => 'btn btn-primary btn-update'
					],
				]);
			?>
			
			<div class="modal-inner-data-<?=$updatedIndex?>">
			</div>

			<?php
				Modal::end();
			?> 
		</div>
	</div>
	<div class="row margin-top-20 max-height-300">
		<table class="table table-striped table-bordered">
		<tr>
			<th class="field">Value (EN)</th>
			<th class="field">Value (JP)</th>
		</tr>
		<tr class="row-content" id="<?=$updatedIndex?>">
			<td class="value" data-type="formatted-textarea"><?=$element[0]['value_en']?></td>
			<td class="value" data-type="formatted-textarea"><?=$element[0]['value_jp']?></td>
		</tr>
		</table>
	</div>
<?php endforeach;?>
