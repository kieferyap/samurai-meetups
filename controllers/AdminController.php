<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SiteSettings;
use app\models\Tours;
use app\models\Admins;
use app\models\Reports;
use app\models\Faq;
use app\models\Participants;
use app\models\LoginForm;

use app\models\UploadForm;
use yii\web\UploadedFile;

class AdminController extends SamuraiController
{
	private function renderAdminView($view = '', $parameters = array()) {
		if ($this->isLoggedIn()) {
            $this->addCssFile('admin.css');
            $this->setAdminTrue();
    		return $this->renderView($view, $parameters);
    	}
    	else {
    		return $this->redirect('?r=admin/login');
    	}
	}

    public function actionLogin()
    {
        if ($this->isLoggedIn()) {
            return $this->redirect('?r=admin/index');
        }
        else {
            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    $this->setLoggedIn();
                    return $this->redirect('?r=admin/index');
                }
            }
            return $this->renderView('login', [
                'model' => $model,
            ]);
        }
    }

	public function actionIndex()
    {
        $languageId = $this->getSessionLanguageCode() == 'en' ? 
            'key_description_en': 
            'key_description_jp';

        $limitCount = 12;

        $siteSettings = $this->getSiteSettings($languageId, [], $limitCount);
        $sitePolicies[] = $this->getSiteSettings($languageId, ['key_search' => 'terms_of_service']);
        $sitePolicies[] = $this->getSiteSettings($languageId, ['key_search' => 'privacy_policy']);
        $sitePolicies[] = $this->getSiteSettings($languageId, ['key_search' => 'transactions_law']);

    	return $this->renderAdminView('index', [
            'siteSettings' => $siteSettings,
            'sitePolicies' => $sitePolicies,
        ]);
    }

    private function getSiteSettings($languageId, $key, $limit=1) 
    {
        return SiteSettings::find()
            ->select([
                'key' => $languageId, 
                'value_en',
                'value_jp'
            ])
            ->where($key)
            ->limit($limit)
            ->asArray()
            ->all();
    }

    public function actionTours()
    {
        $tours = Tours::find()
            ->asArray()
            ->all();

    	return $this->renderAdminView('tours', [
            'tours' => $tours
        ]);
    }

    public function actionReports()
    {
        $this->addCssFile('reports.css');
        $reports = Reports::find()
            ->asArray()
            ->all();

    	return $this->renderAdminView('reports', [
            'reports' => $reports
        ]);
    }

    public function actionAdmins()
    {
        $admins = Admins::find(['username', 'last_logged_in'])
            ->asArray()
            ->all();
            
        return $this->renderAdminView('admins', [
            'admins' => $admins
        ]);
    }

    public function actionFaq()
    {
        $this->addJsFile('admin.js');
    
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

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->renderAdminView('upload', ['model' => $model]);
    }
}
