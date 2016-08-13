<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
?>

<br/>
<div class="row">
	<img class="col-md-12 tour-banner" src="<?=Url::base().'images/'.$tourElement['image_url']?>"/>
</div>
<br/>
<h1>Tour Information</h1>
<div class="row">
	<div class="col-md-12 tour-description">
		<?=$tourElement['description']?>
	</div>
</div>

<br/>
<h1>Terms of Service</h1>
<div class="row">
	<?=$termsOfService?>
</div>

<div class="row">
	<div class="col-md-5 col-md-offset-4">
		<div class="checkbox">
		  <label><input type="checkbox" id="terms-of-service-checkbox" value="">I have read and agreed the Terms of Service stated above.</label>
		</div>
	</div>
</div>
<br/>

<div class="row">
	<button type="button" id="terms-of-service-target-button" class="btn btn-success col-md-2 col-md-offset-5 btn-join-tour" disabled="true">Join Tour</button>
</div>