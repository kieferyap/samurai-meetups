<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = Yii::t('app', 'Samurai Meetups').': '.Yii::t('yii', 'Error');
?>
<div class="site-error">
    <h1><?= Yii::t('app', 'Error 404: Page Not Found')?></h1>
    <p>
        <?= Yii::t('app', 'The above error occurred while the Web server was processing your request.')?>
    </p>
</div>
