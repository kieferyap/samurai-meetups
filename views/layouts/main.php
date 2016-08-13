<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    $headerIcon = '<img class="header-logo" src="'.Url::base().'images/logo.png">';
    NavBar::begin([
        'brandLabel' => $headerIcon,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'my-navbar navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => '<span class="header-menu">Menu</span>', 
                'items' => [
                    ['label' => 'Upcoming Tours', 'url' => Url::toRoute('site/tours')],
                    ['label' => 'About', 'url' => Url::toRoute('site/about')],
                    ['label' => 'Report', 'url' => Url::toRoute('site/report')],
                    ['label' => 'Samurai', 'url' => Url::toRoute('site/contact')],
                    ['label' => 'Participation\'s Voice', 'url' => '#'],                     
                ], 
                'encode' => false],
            ['label' => 'English', 'url' => [Url::toRoute('site/about')]],
            ['label' => '<img id="facebook-icon" src="'.Url::base().'images/facebook-logo.png">', 'url' => Url::toRoute('site/contact'), 'encode' => false],
            ['label' => '<img id="twitter-icon" src="'.Url::base().'images/twitter-logo.png">', 'url' => Url::toRoute('site/contact'), 'encode' => false],
            ['label' => '<img id="twitter-icon" src="'.Url::base().'images/instagram-logo.png">', 'url' => Url::toRoute('site/contact'), 'encode' => false]
        ],
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>         
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left"><img class="footer-logo" src="<?=Url::base()?>images/logo-only.png"></p>
        <p class="pull-right">
            <a href="?r=site/about">About Us</a> | 
            <a href="?r=site/contact">Contact Us</a> | 
            <a href="?r=site/faq">FAQ</a> | 
            <a href="?r=site/privacy">Privacy Policy</a>
        </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
