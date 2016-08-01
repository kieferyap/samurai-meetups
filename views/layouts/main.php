<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
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
    $headerIcon = '<img class="header-logo" src="images/logo.png">';
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
                    ['label' => 'Upcoming Tours', 'url' => '#'],
                    ['label' => 'About', 'url' => '#'],                     
                    ['label' => 'Report', 'url' => '#'],                     
                    ['label' => 'Samurai', 'url' => '#'],                     
                    ['label' => 'Participation\'s Voice', 'url' => '#'],                     
                ], 
                'encode' => false],
            ['label' => 'English', 'url' => ['/site/about']],
            ['label' => '<img id="facebook-icon" src="images/facebook-logo.png">', 'url' => ['/site/contact'], 'encode' => false],
            ['label' => '<img id="twitter-icon" src="images/twitter-logo.png">', 'url' => ['/site/contact'], 'encode' => false],
            ['label' => '<img id="twitter-icon" src="images/instagram-logo.png">', 'url' => ['/site/contact'], 'encode' => false]
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
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
