<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Samurai Meetups').': '.Yii::t('app', 'Admin');
?>

<h1><?= Yii::t('app', 'FAQ')?></h1>
<hr/>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th><?= Yii::t('app', 'Question (EN)')?></th>
			<th><?= Yii::t('app', 'Question (JP)')?></th>
			<th><?= Yii::t('app', 'Answer (EN)')?></th>
			<th><?= Yii::t('app', 'Answer (JP)')?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($faq as $element):?>
			<tr>
				<td><?=$element['question_en']?></td>
				<td><?=$element['question_jp']?></td>
				<td><?=$element['answer_en']?></td>
				<td><?=$element['answer_jp']?></td>
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