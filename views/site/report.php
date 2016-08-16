<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
?>
<br/>
<div class="hidden" id="last-report-id" data-report-id="<?=$lastElementId?>"></div>
<div class="row reports-container">
	<div class="col-md-4 report-sidebar">
		<?php foreach($reports as $element): ?>
		<div class="col-md-12 report-sidebar-element border-radius-10" data-id="<?=$element['report_id']?>">
			<div class="col-md-2 report-sidebar-element-photo border-radius-10">
				<img class="border-radius-10" src="<?=Url::base()?>images/<?=$element['sidebar_image_url']?>"/>
			</div>
			<div class="col-md-10 report-sidebar-element-text">
				<?=$element['short_description']?>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="col-md-8 report-content">
	</div>
</div>