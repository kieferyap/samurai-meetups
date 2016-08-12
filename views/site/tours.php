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
<br/>


<div class="row">
	<button type="button" class="btn btn-success col-md-2 col-md-offset-5 btn-join-tour">Join Tour</button>
</div>