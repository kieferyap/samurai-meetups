<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Participants */
/* @var $form ActiveForm */
?>
<div class="join-tour">

    <br/>
    <div class="row">
        <img 
            class="col-md-12" 
            id="tour-banner" 
            src="<?=Url::base().'images/'.$tourBanner?>"
        />
    </div>
    <br/>

    <h2> <?=Yii::t('app', 'Participant Registration')?></h2>
    <hr/>  
    <?php $form = ActiveForm::begin(); ?>

        <input id="participants-tour_id" class="form-control" name="Participants[tour_id]" type="hidden" value="<?=$tourId?>">
        
        <h3>Personal Information</h3>
        <div class="join-tour-form-group">
            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'gender')->radioList(['male'=>'Male', 'female'=>'Female'], ['class'=>'radio-button']) ?>
            <?= $form->field($model, 'country') ?>
            <?= $form->field($model, 'facebook_id') ?>
        </div>

        <h3>Companion</h3>
        <div class="join-tour-form-group">
            <?= $form->field($model, 'number_of_people')->radioList(['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'], ['class'=>'radio-button']) ?>
            <?= $form->field($model, 'companions_name') ?>
        </div>

        <h3>Any questions?</h3>
        <div class="join-tour-form-group">
            <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>
        </div>
    
        <hr/>
        <div class="row">
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Submit'), 
                    ['class' => 'btn btn-success', 'id' => 'join-tour-button']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- join-tour -->
