<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<br/>
<div 
	class="hidden" 
	id="report-information" 
	data-last-report-id="<?=$lastElementId?>"
	data-show-more-url="<?=Url::toRoute('site/get-report')?>"
	data-report-data-url="<?=Url::toRoute('site/report-data')?>"
	data-base-image-url="<?=Url::base()?>images/"
	data-show-more-localized="<?=Yii::t('app', 'Show More')?>"
	data-loading-localized="<?=Yii::t('app', 'Loading...')?>"
>
</div>

<div class="hidden" id="new-report-element">
	<div class="col-md-12 report-sidebar-element border-radius-10" data-id="0">
		<div class="col-md-2 report-sidebar-element-photo border-radius-10">
			<img class="border-radius-10"/>
		</div>
		<div class="col-md-10 report-sidebar-element-text">
		</div>
	</div>
</div>

<div class="row" id="reports-container">
	<div class="col-md-4" id="report-sidebar">
		<div id="report-sidebar-elements">
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
		<button type="button" id="report-show-more-btn" class="btn btn-success col-md-4 col-md-offset-4"><?= Yii::t('app', 'Show More')?></button>
	</div>
	<div class="col-md-8" id="report-content">
		<div class="row">
			<img 
				class="col-md-4 report-content-image" 
				src="<?=Url::base()?>images/<?=$elementDisplay['worker_image_url']?>"
				id="worker-image" 
			/>
			<img 
				class="col-md-4 report-content-image" 
				src="<?=Url::base()?>images/<?=$elementDisplay['set_image_url']?>"
				id="set-image"
			/>
			<img 
				class="col-md-4 report-content-image" 
				src="<?=Url::base()?>images/<?=$elementDisplay['experience_image_url']?>"
				id="experience-image"
			/>
		</div>
		<div class="row">
			<div class="col-md-12" id="report-content-description">
				<?=$elementDisplay['description']?>
			</div>
		</div>
	</div>
</div>