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

	<style type="text/css">
		body {
			background-image: url(<?=Url::base().'images/background.jpg'?>);
			background-repeat: repeat;
		}
	</style>
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
	// $headerIcon = '<img id="header-logo" src="'.Url::base().'images/logo.png">';
	NavBar::begin([
		'brandLabel' => Yii::$app->params['header'],
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
					[
						'label' => Yii::t('app', 'Upcoming Tours'), 
						'url' => Url::base()
					],
					[
						'label' => Yii::t('app', 'About'), 
						'url' => Url::toRoute('site/about')
					],
					[
						'label' => Yii::t('app', 'Reports'), 
						'url' => Url::toRoute('site/report')
					],
					[
						'label' => Yii::t('app', 'SAMURAI'), 
						'url' => Url::toRoute('site/samurai')
					],
					[
						'label' => Yii::t('app', 'Contact Us'), 
						'url' => Url::toRoute('site/contact')
					],
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
				'url' => Yii::$app->params['facebook'], 
				'encode' => false
			],
			[
				'label' => '<img id="twitter-icon" src="'.Url::base().'images/twitter-logo.png">', 
				'url' => Yii::$app->params['twitter'], 
				'encode' => false
			],
			[
				'label' => '<img id="twitter-icon" src="'.Url::base().'images/instagram-logo.png">', 
				'url' => Yii::$app->params['instagram'], 
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
			<a href="<?=Url::toRoute('site/about')?>">
				<?= Yii::t('app', 'About Us')?>
			</a> | 
			<a href="<?=Url::toRoute('site/contact')?>">
				<?= Yii::t('app', 'Contact Us')?>
			</a> | 
			<a href="<?=Url::toRoute('site/faq')?>">
				<?= Yii::t('app', 'FAQ')?>
			</a> | 
			<a href="<?=Url::toRoute('site/privacy')?>">
				<?= Yii::t('app', 'Privacy Policy')?>
			</a>
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
