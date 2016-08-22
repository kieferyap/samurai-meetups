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
		return $this->render($view, $parameters);
	}
}
