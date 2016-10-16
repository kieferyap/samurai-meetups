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
		$_SESSION['language'] = $languageCode;
	}

	public function setConfigLanguageCode()
	{
		Yii::$app->language = $this->getSessionLanguageCode();
	}

	public function getSessionLanguageCode() 
	{
		$this->startSession();
		if (!isset($_SESSION['language'])) {
			$this->setSessionLanguageCode(Yii::$app->language);
		}
		return $_SESSION['language'];
	}

	public function setLoggedIn()
	{
		$this->startSession();
		$_SESSION['logged_in'] = true;
	}

	public function isLoggedIn()
	{
		$this->startSession();
		if(!isset($_SESSION['logged_in'])) {
			return false;
		}
		return true;
	}

	public function startSession() 
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	}

	public function closeSession()
	{
		session_unset();
		session_destroy(); 
	}
}
