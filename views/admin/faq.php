<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = Yii::t('app', 'Samurai Meetups').': '.Yii::t('app', 'Admin');
?>

<h1><?= Yii::t('app', 'FAQ')?></h1>
<hr/>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th class="col-md-2 field"><?= Yii::t('app', 'Question (EN)')?></th>
			<th class="col-md-3 field"><?= Yii::t('app', 'Answer (EN)')?></th>
			<th class="col-md-2 field"><?= Yii::t('app', 'Question (JP)')?></th>
			<th class="col-md-3 field"><?= Yii::t('app', 'Answer (JP)')?></th>
			<th class="col-md-2"><?= Yii::t('app', 'Actions')?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($faq as $index => $element):?>
			<tr class="row-content" id="<?=$index?>">
				<td class="value" data-type="text"><?=$element['question_en']?>
				</td>
				<td class="value" data-type="formatted-textarea"><?=$element['answer_en']?>
				</td>
				<td class="value" data-type="text"><?=$element['question_jp']?>
				</td>
				<td class="value" data-type="formatted-textarea"><?=$element['answer_jp']?>
				</td>
				<td>
					<?php 
						$update = Yii::t('app', 'Update');
						Modal::begin([
							'header' => '<h3>'.$update.'</h3>',
							'toggleButton' => [
								'label' => $update,
								'class' => 'btn btn-primary btn-update'
							],
						]);
					?>
					
					<div class="modal-inner-data-<?=$index?>">
					</div>

					<?php
						Modal::end();
					?>
					
    				<button type="button" class="btn btn-danger margin-top-5"><?= Yii::t('app', 'Delete')?></button>
				</td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>
<div class="row">
	<a href="#">
    	<button type="button" class="btn btn-success col-md-2 col-md-offset-5">
    		<?= Yii::t('app', 'Add FAQ')?>
    	</button>	
    </a>
</div>
HEYYYY
<textarea></textarea>
<textarea class="tinymce"></textarea>