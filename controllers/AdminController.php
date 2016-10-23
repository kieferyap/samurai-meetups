<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SiteSettings;
use app\models\Tours;
use app\models\Reports;
use app\models\Faq;
use app\models\Participants;

class AdminController extends SamuraiController
{
	private function renderAdminView($view = '', $parameters = array()) {
    	$this->addCssFile('admin.css');
    	$this->setAdminTrue();
		if ($this->isLoggedIn()) {
    		return $this->renderView($view, $parameters);
    	}
    	else {
    		return $this->goHome();
    	}
	}

	public function actionIndex()
    {
    	return $this->renderAdminView('index');
    }

    public function actionTours()
    {
    	return $this->renderAdminView('tours');
    }

    public function actionReports()
    {
    	return $this->renderAdminView('reports');
    }

    public function actionAdmins()
    {
    	return $this->renderAdminView('admins');
    }

    public function actionFaq()
    {
    	$faq = Faq::find()
			->asArray()
			->all();
    	return $this->renderAdminView('faq', [
			'faq' => $faq
		]);
    }

    public function actionParticipants()
    {
    	return $this->renderAdminView('participants');
    }
}
