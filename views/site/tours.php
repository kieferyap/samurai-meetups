<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="row">
	<img class="col-md-12 tour-banner" src="<?=Url::base().'images/'.$tourElement['image_url']?>"/>
</div>
<br/>
<div class="row">
	<div class="col-md-12">
		<pre>
		<?=$tourElement['description']?>
		</pre>
	</div>
</div>

<br/>
<div class="row">
	<div class="col-md-12">
		<?=$termsOfService?>
	</div>
</div>
<br/>
<div class="row">
	<button type="button" class="btn btn-success col-md-2 col-md-offset-5 btn-join-tour">Success</button>
</div>