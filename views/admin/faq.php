<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = Yii::t('app', 'Samurai Meetups').': '.Yii::t('app', 'Admin');
?>

<div id="data-type-source" class="hidden"><?=$dataTypeSource?></div>
<div id="data-index-source" class="hidden"><?=$dataIndexSource?></div>

<h1><?= Yii::t('app', 'FAQ')?></h1>
<hr/>
<table class="table table-striped table-bordered">
	<thead>
		<tr class="row-fields">
			<th class="col-md-2 field" data-field="question_en" data-type="text"><?= Yii::t('app', 'Question (EN)')?></th>
			<th class="col-md-3 field" data-field="answer_en" data-type="formatted-textarea"><?= Yii::t('app', 'Answer (EN)')?></th>
			<th class="col-md-2 field" data-field="question_jp" data-type="text"><?= Yii::t('app', 'Question (JP)')?></th>
			<th class="col-md-3 field" data-field="answer_jp" data-type="formatted-textarea"><?= Yii::t('app', 'Answer (JP)')?></th>
			<th class="col-md-2"><?= Yii::t('app', 'Actions')?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($faq as $element):?>
			<tr class="row-content" id="row-<?=$element['id']?>">
				<td class="value"><?=$element['question_en']?></td>
				<td class="value"><?=$element['answer_en']?></td>
				<td class="value"><?=$element['question_jp']?></td>
				<td class="value"><?=$element['answer_jp']?></td>
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
								data-update-url="'.Url::toRoute('ajax/update-faq').'">'
								.$update
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
						data-delete-url="<?=Url::toRoute('ajax/delete-faq')?>"
						class="btn btn-danger btn-delete margin-top-5"
						data-id="<?=$element['id']?>"
					>
						<?= Yii::t('app', 'Delete')?>
					</button>
				</td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>
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
				data-add-url="'.Url::toRoute('ajax/create-faq').'">'
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