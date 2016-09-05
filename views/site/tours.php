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
<h1><?= Yii::t('app', 'Tour Information')?></h1>
<div class="row">
	<div class="col-md-12" id="tour-description">
		<?=$tourElement['description']?>
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
		  <label><input type="checkbox" id="terms-of-service-checkbox" value=""><?= Yii::t('app', 'I have read and agreed to the Terms of Service and Privacy Policy')?></label>
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