<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'Samurai Meetups').': '.Yii::t('app', 'Privacy Policy');
?>
<div class="site-about">
    <h2><?= Yii::t('app', 'Terms of Service')?>, <?= Yii::t('app', 'Privacy Policy')?> <?= Yii::t('app', 'and')?> <?= Yii::t('app', 'Specified Commercial Transactions Law')?></h2>

    <p>
        <?=$termsOfService?>
    </p>

</div>
