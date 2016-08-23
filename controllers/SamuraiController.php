<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SamuraiController extends Controller
{
	public $params = array();
	public $cssFiles = array();
	public $jsFiles = array();

	public function addCssFile($filename = '') {
		$this->cssFiles[] = $filename;
	}

	public function addJsFile($filename = '') {
		$this->jsFiles[] = $filename;
	}

	public function renderView($view = '', $parameters = array()) {
		Yii::$app->view->params['cssFiles'] = $this->cssFiles;
		Yii::$app->view->params['jsFiles'] = $this->jsFiles;
		$this->setConfigLanguageCode();
		return $this->render($view, $parameters);
	}

	public function setSessionLanguageCode($languageCode = '') 
	{
		$session = $this->getCurrentSession();
		$session['language'] = $languageCode;
	}

	public function setConfigLanguageCode()
	{
		Yii::$app->language = $this->getSessionLanguageCode();
	}

	public function getSessionLanguageCode() 
	{
		$session = $this->getCurrentSession();
		if (!$session->has('language')) {
			$session['language'] = Yii::$app->language;
		}
		return $session['language'];
	}

	public function getCurrentSession() 
	{
		$session = Yii::$app->session;
		if (!$session->isActive) {
			$session->open();
		}
		return $session;
	}

	public function closeSession()
	{
		$session->close();
		$session->destroy();
	}
}
