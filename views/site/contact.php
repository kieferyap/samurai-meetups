<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;

$this->title = Yii::t('app', 'Samurai Meetups').': '.Yii::t('app', 'Contact Us');
$this->params['breadcrumbs'][] = $this->title;
?>

<div 
	class="hidden"
	id="contact-data"
	data-admin-email="<?=$adminEmail?>"
></div>
<h1><?= Yii::t('app', 'Contact Us')?></h1>

<div class="alert alert-danger hidden" id="error-all-fields-required"> 
	<?=Yii::t('app', 'All fields are required.')?>
</div>

<div class="form-group required">
<label class="control-label" for="contactform-title"><?= Yii::t('app', 'Title')?></label>
<input id="contactform-title" class="form-control" type="text">
</div>

<div class="form-group required">
<label class="control-label" for="contactform-message"><?= Yii::t('app', 'Message')?></label>
<textarea id="contactform-message" class="form-control" rows="6"></textarea>
</div>

<button type="button" id="btn-send-email" class="btn btn-success col-md-2 col-md-offset-5">
	<?= Yii::t('app', 'Send E-mail')?>
</button>