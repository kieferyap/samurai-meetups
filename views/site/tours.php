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

<h3><?= Yii::t('app', 'Event Summary')?></h3>
<div class="row">
	<div class="col-md-12" id="tour-description">
		<?=$tourElement['event_summary']?>
	</div>
</div>
<br/>

<h3><?= Yii::t('app', 'Meeting Time and Place')?></h3>
<div class="row">
	<div class="col-md-12" id="tour-description">
		<?=$tourElement['meeting_time_and_place']?>
	</div>
</div>
<br/>
<h3><?= Yii::t('app', 'Place for visit and tips')?></h3>
<div class="row">
	<div class="col-md-12" id="tour-description">
		<?=$tourElement['place_for_visit_and_tips']?>
	</div>
</div>
<br/>
<h3><?= Yii::t('app', 'Time schedule')?></h3>
<div class="row">
	<div class="col-md-12" id="tour-description">
		<?=$tourElement['time_schedule']?>
	</div>
</div>
<br/>
<h3><?= Yii::t('app', 'Price')?></h3>
<div class="row">
	<div class="col-md-12" id="tour-description">
		<?=$tourElement['price']?>
	</div>
</div>
<br/>
<h3><?= Yii::t('app', 'SAMURAI information')?></h3>
<div class="row">
	<div class="col-md-12" id="tour-description">
		<?=$tourElement['samurai_information']?>
	</div>
</div>
<br/>

<hr/>
<h1><?= Yii::t('app', 'Privacy Policy')?></h1>
<div class="row">
	<?=$termsOfService?>
</div>

<div class="row">
	<div class="col-md-5 col-md-offset-4">
		<div class="checkbox">
		  <label><input type="checkbox" id="terms-of-service-checkbox" value=""><?= Yii::t('app', 'I have read and agreed to the Terms of Service and Privacy Policy') /*and <a href="'.Url::toRoute('site/tos2').'">the Second Terms of Service</a>')*/?></label>
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
    <button type="button" id="btn-join-tour" class="btn btn-success col-md-2 col-md-offset-5" disabled="true"><?= Yii::t('app', 'Join Tour')?></button>	
</div>