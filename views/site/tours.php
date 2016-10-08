<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Samurai Meetups').': '.Yii::t('app', 'Tour Information');
?>

<br/>
<div class="row">
	<img class="col-md-12" id="tour-banner" src="<?=Url::base().'images/'.$tourElement['image_url']?>"/>
</div>
<br/>
<hr/>

<h3><?= Yii::t('app', 'Tour Information')?></h3>
<div class="row">
	<div class="col-md-12" id="tour-description">
	<table class="table table-striped table-bordered">
		<tr>
			<td class="key"><?= Yii::t('app', 'Event Summary')?></td>
			<td class="value"><?=$tourElement['event_summary']?></td>
		</tr>
		<tr>
			<td class="key"><?= Yii::t('app', 'Meeting Time and Place')?></td>
			<td class="value"><?=$tourElement['meeting_time_and_place']?></td>
		</tr>
		<tr>
			<td class="key"><?= Yii::t('app', 'Place for visit and tips')?></td>
			<td class="value"><?=$tourElement['place_for_visit_and_tips']?></td>
		</tr>
		<tr>
			<td class="key"><?= Yii::t('app', 'Time schedule')?></td>
			<td class="value"><?=$tourElement['time_schedule']?></td>
		</tr>
		<tr>
			<td class="key"><?= Yii::t('app', 'Price')?></td>
			<td class="value"><?=$tourElement['price']?></td>
		</tr>
		<tr>
			<td class="key"><?= Yii::t('app', 'SAMURAI information')?></td>
			<td class="value"><?=$tourElement['samurai_information']?></td>
		</tr>
	</table>
	</div>
</div>
<hr/>
<h2><?= Yii::t('app', 'Terms of Service')?>, <?= Yii::t('app', 'Privacy Policy')?> <?= Yii::t('app', 'and')?> <?= Yii::t('app', 'Specified Commercial Transactions Law')?></h2>
<div class="row">
	<?=$termsOfService?>
</div>

<div class="row">
	<div class="col-md-5 col-md-offset-4">
		<div class="checkbox">
		  <label><input type="checkbox" id="terms-of-service-checkbox" value=""><?= Yii::t('app', 'I have read and agreed to the Terms of Service, Privacy Policy, and the Specified Commercial Transactions Law')?></label>
		</div>
	</div>
</div>
<br/>
<div 
	class="hidden"
	id="tour-data"
	data-google-doc-url="<?= $tourElement['google_doc_url']?>"
></div>
<hr/>
<div class="row">
	<a href="<?=Url::toRoute('site/join-tour/')?>&id=<?=$tourElement['id']?>">
    	<button 
    		type="button" 
    		id="btn-join-tour" 
    		class="btn btn-success col-md-2 col-md-offset-5" 
    		disabled="true">
    		<?= Yii::t('app', 'Join Tour')?>
    	</button>	
    </a>
</div>