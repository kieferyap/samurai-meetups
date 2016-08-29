<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type"> 
	<meta content="utf-8" http-equiv="encoding"> 

	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
	
	<?php if(isset($this->params['cssFiles'])): ?>
		<?php foreach($this->params['cssFiles'] as $cssFile): ?>
			<link rel="stylesheet" href="<?= Url::base() ?>css/<?= $cssFile ?>">
		<?php endforeach; ?>
	<?php endif; ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- 
The is-toggle-clicked is needed because there's an exceptionally weird bug which causes the language button to click twice, 
and it only happens in the front page! The console log says "out of memory". 
and yes, I have stackoverflow'd the hell out of this.
I'm on time pressure so this hot little hack would have to do! >:U
It's used in index.js, I believe.
-->
<div id="samurai-meetups-data"
	data-toggle-language-url="<?=Url::toRoute('site/toggle-language')?>"
	data-is-toggle-clicked=0 
>

<div class="wrap">
	<?php
	$headerIcon = '<img id="header-logo" src="'.Url::base().'images/logo.png">';
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
				'label' => '<span class="header-menu">'.Yii::t('app', 'Menu').'</span>', 
				'items' => [
					['label' => Yii::t('app', 'Upcoming Tours'), 'url' => Url::base()],
					['label' => Yii::t('app', 'About'), 'url' => Url::toRoute('site/about')],
					['label' => Yii::t('app', 'Reports'), 'url' => Url::toRoute('site/report')],
					['label' => Yii::t('app', 'Samurai'), 'url' => Url::toRoute('site/samurai')],
					['label' => Yii::t('app', 'Testimonies'), 'url' => Url::toRoute('site/samurai')],
				], 
				'encode' => false],
			[
				'label' => Yii::t('app', '日本語'), 
				'url' => '',
				'options' => [
					'id' => 'toggle-language',
				]
			],
			[
				'label' => '<img id="facebook-icon" src="'.Url::base().'images/facebook-logo.png">', 
				'url' => 'https://www.facebook.com/samuraimeetups', 
				'encode' => false
			],
			[
				'label' => '<img id="twitter-icon" src="'.Url::base().'images/twitter-logo.png">', 
				'url' => Url::toRoute('site/samurai'), 
				'encode' => false
			],
			[
				'label' => '<img id="twitter-icon" src="'.Url::base().'images/instagram-logo.png">', 
				'url' => Url::toRoute('site/samurai'), 
				'encode' => false
			]
		],
	]);
	NavBar::end();
	?>
	<div class="container">    
		<?= $content ?>
	</div>
</div>

<footer class="footer">
	<div class="container">
		<p class="pull-left"><img class="footer-logo" src="<?=Url::base()?>images/logo-only.png"></p>
		<p class="pull-right">
			<a href="?r=site/about"><?= Yii::t('app', 'About Us')?></a> | 
			<a href="?r=site/contact"><?= Yii::t('app', 'Contact Us')?></a> | 
			<a href="?r=site/faq"><?= Yii::t('app', 'FAQ')?></a> | 
			<a href="?r=site/privacy"><?= Yii::t('app', 'Privacy Policy')?></a>
		</p>
	</div>
</footer>
<?php $this->endBody() ?>

<?php if(isset($this->params['jsFiles'])): ?>
	<?php foreach($this->params['jsFiles'] as $jsFile): ?>
		<script src="<?= Url::base() ?>js/<?= $jsFile ?>"></script>
	<?php endforeach; ?>
<?php endif; ?>

<script src="<?= Url::base() ?>js/index.js"></script>
</body>
</html>
<?php $this->endPage() ?>
