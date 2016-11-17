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

	<!-- TinyMCE: A WYSIWYG editor for textarea -->
	<script src="<?= Url::base() ?>js/tinymce/js/tinymce/tinymce.min.js"></script>
	<script>
		$(document).ready(function() {
			tinymce.init({
	    		selector: '.tinymce'
	  		});
		});
	</script>
	<!-- CSS which need a bit of nudge from PHP will be placed here. -->
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
Form HTML constants
-->
<div class="hidden">
	<div class="admin-form-text">
		<div class="form-group required">
			<label class="control-label" for="???">???</label>
			<input id="???" value="???" class="form-control" type="text"/>
		</div>
	</div>
	<div class="admin-form-textarea">
		<div class="form-group required">
			<label class="control-label" for="???">???</label>
			<textarea id="???" class="form-control"></textarea>
		</div>
	</div>
	<div class="admin-form-formatted">
		<div class="form-group required">
			<label class="control-label" for="???">???</label>
			<textarea id="???" class="form-control tinymce"></textarea>
		</div>
	</div>
	<div class="admin-form-image">
		<div class="form-group required">
			<label class="control-label" for="???">???</label><br/>
			<img src="???"/><br/>
			<input class="browse-file-modal" id="???" value="???" type="file"/><br/>
		</div>
	</div>
</div>

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
		<?php if($this->params['isAdmin'] == true):?>    

			<div class="container-fluid">
			<div class="row">
			<div class="col-sm-4 col-lg-3">
			  <nav class="navbar navbar-default navbar-fixed-side">
				<ul class="sidebar-nav admin-sidebar">
					<!--Everything EXCEPT the tour-->
					<li>
						<a href="<?=Url::toRoute('admin/index')?>">
							<?=Yii::t('app', '- Site Settings')?>
						</a>
					</li> 
					<!--Add the TOP PAGE TOUR information here-->
					<li>
						<a href="<?=Url::toRoute('admin/tours')?>">
							<?=Yii::t('app', '- Tour Management')?>
						</a>
					</li> 
					<li>
						<a href="<?=Url::toRoute('admin/reports')?>">
							<?=Yii::t('app', '- Report Management')?>
						</a>
					</li>
					<li>
						<a href="<?=Url::toRoute('admin/admins')?>">
							<?=Yii::t('app', '- Admin Management')?>
						</a>
					</li>
					<li>
						<a href="<?=Url::toRoute('admin/faq')?>">
							<?=Yii::t('app', '- FAQ Management')?>
						</a>
					</li>
					<li>
						<a href="<?=Url::toRoute('admin/participants')?>">
							<?=Yii::t('app', '- Check Tour Participants')?>
						</a>
					</li>
				</ul>
			  </nav>
			</div>
			<div class="col-sm-8 col-lg-9">
				<?php if (Yii::$app->session->hasFlash('success')): ?>
					<div class="alert alert-success">
						<?=Yii::t('app', 'The action was successful.')?>
					</div>
				<?php endif;?>
				<?php if (Yii::$app->session->hasFlash('failure')): ?>
					<div class="alert alert-danger">
						<?=Yii::t('app', 'The action has failed. All fields should be provided.')?>
					</div>
				<?php endif;?>
				<?= $content ?>
			</div>
			</div>
			</div>
		<?php else:?>
			<?= $content ?>
		<?php endif;?>
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
</body>
</html>
<?php $this->endPage() ?>
