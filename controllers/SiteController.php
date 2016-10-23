<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SiteSettings;
use app\models\Tours;
use app\models\Reports;
use app\models\Faq;
use app\models\Participants;
use app\models\LoginForm;

use app\models\ContactForm;

class SiteController extends SamuraiController
{
	/**
	 * Displays the homepage.
	 *
	 * @return string
	 */
	public function actionIndex()
	{
		$this->addCssFile('index.css');
		$this->addJsFile('index.js');

		$allElementKeys = [
			'slideshow', 
			'tour', 
			'report', 
			'about', 
			'samurai', 
			'voice',
			'voice_image',
			'samurai_bottom'
		];

		$languageId = 
			$this->getSessionLanguageCode() == 'en' ? 
			'value_en' : 
			'value_jp';

		$frontPageElements = [];
		foreach($allElementKeys as $elementKey) {
			$element = SiteSettings::find()
				->select(['value' => $languageId, 'extra_information'])
				->where(['key_search' => $elementKey])
				->orderBy(['id' => SORT_DESC])
				->asArray()
				->all();
			$frontPageElements[$elementKey] = $element;
		} 

		return $this->renderView('index', [
			'frontPageElements' => $frontPageElements,
		]);
	}

	/**
	 * Tours action.
	 *
	 * @return string
	 */
	public function actionTours()
	{
		$this->loadTourWithId($_GET['id']);
	}

	private function loadTourWithId($id) {
		$this->addCssFile('tours.css');
		$this->addJsFile('tours.js');

		$tourElement = Tours::find()
			->where(['id' => $id])
			->asArray()
			->one();
		
		$allText = $this->getPrivacyPolicyAndFriends();

		// echo '<pre>'; print_r($tourElement); die();
		// TO-DO: If ID not found, render error.
		return $this->renderView('tours', [
			'tourElement' => $tourElement,
			'termsOfService' => $allText
		]);
	}
	/**
	 * Tours action.
	 *
	 * @return string
	 */
	public function actionReport()
	{
		$this->addCssFile('reports.css');
		$this->addJsFile('reports.js');
		
		$limitCount = 7;
		$shortDescriptionId = 
			$this->getSessionLanguageCode() == 'en' ? 
			'short_description_en': 
			'short_description_jp';
		$descriptionId = 
			$this->getSessionLanguageCode() == 'en' ? 
			'description_en': 
			'description_jp';

		$lastElements = Reports::find()
			->select([
				'id', 
				'sidebar_image_url', 
				'short_description' => $shortDescriptionId, 
				'type_id'
			])
			->orderBy(['id' => SORT_ASC])
			->asArray()
			->limit($limitCount)
			->all();

		$firstElement = Reports::find()
			->select([
				'worker_image_url', 
				'set_image_url', 
				'experience_image_url', 
				'description' => $descriptionId
			])
			->orderBy(['id' => SORT_ASC])
			->asArray()
			->one();

		$lastElement = end($lastElements);

		return $this->renderView('report', [
			'reports' => $lastElements,
			'lastElementId' => $lastElement['id'],
			'elementDisplay' => $firstElement
		]);
	}


	/**
	 * Get Report action.
	 *
	 * @return string
	 */
	public function actionGetReport()
	{
		$limitCount = 7;
		
		$shortDescriptionId = 
			$this->getSessionLanguageCode() == 'en' ? 
			'short_description_en': 
			'short_description_jp';
		$lastElements = Reports::find()
			->select([
				'id', 
				'sidebar_image_url', 
				'short_description' => $shortDescriptionId, 
				'type_id'
			])
			->orderBy(['id' => SORT_ASC])
			->where(['>', 'id', $_POST['id']])
			->asArray()
			->limit($limitCount)
			->all();

		echo json_encode($lastElements);
	}


	/**
	 * Report Data action.
	 *
	 * @return string
	 */
	public function actionReportData()
	{
		$descriptionId = 
			$this->getSessionLanguageCode() == 'en' ? 
			'description_en': 
			'description_jp';
		$reportElement = Reports::find()
			->select([
				'worker_image_url', 
				'set_image_url', 
				'experience_image_url', 
				'description' => $descriptionId
			])
			->where(['id' => $_POST['id']])
			->asArray()
			->one();

		echo json_encode($reportElement);
	}

	/**
	 * Action which toggles the language
	 *
	 * @return string
	 */
	public function actionToggleLanguage() 
	{
		$sourceLanguageCode = $this->getSessionLanguageCode();
		$targetLanguageCode = '';
		switch ($sourceLanguageCode) {
			case 'en':
				$targetLanguageCode = 'ja';
				break;
			case 'ja':
				$targetLanguageCode = 'en';
				break;
			default:
				$targetLanguageCode = 'en';
				break;
		}

		$this->setSessionLanguageCode($targetLanguageCode);
	}

	/**
	 * Tours action.
	 *
	 * @return string
	 */
	public function actionFaq()
	{
		$this->addCssFile('faq.css');
		$questionId = 
			$this->getSessionLanguageCode() == 'en' ? 
			'question_en' : 
			'question_jp';
		$answerId = 
			$this->getSessionLanguageCode() == 'en' ? 
			'answer_en' : 
			'answer_jp';
		$faq = Faq::find()
			->select(['question' => $questionId, 'answer' => $answerId])
			->asArray()
			->all();

		if (count($faq)) {
			return $this->renderView('faq', [
				'faq' => $faq
			]);
		}

		return $this->showComingSoon();
	}


	/**
	 * Tours action.
	 *
	 * @return string
	 */
	public function actionSamurai()
	{
		return $this->showComingSoon();
		// return $this->renderView('samurai');
	}

	/**
	 * Tours action.
	 *
	 * @return string
	 */
	public function actionPrivacy()
	{
		$this->addCssFile('privacy.css');
		
		$allText = $this->getPrivacyPolicyAndFriends();

		return $this->renderView('privacy', [
			'termsOfService' => $allText,
		]);
	}

	/**
	 * Displays contact page.
	 *
	 * @return string
	 */
	public function actionContact()
	{
		$adminEmailAddress = Yii::$app->params['adminEmail'];
		$this->addJsFile('contact.js');
		return $this->renderView('contact', [
			'adminEmail' => $adminEmailAddress
		]);
	}

	/**
	 * Displays about page.
	 *
	 * @return string
	 */
	public function actionAbout()
	{
		return $this->renderView('about');
	}

	/**
	 * Displays error page.
	 *
	 * @return string
	 */
	public function actionError()
	{
		return $this->renderView('error');
	}


	/**
	 * Displays coming soon page.
	 *
	 * @return string
	 */
	public function showComingSoon()
	{
		return $this->renderView('coming-soon');
	}

	private function getPrivacyPolicyAndFriends()
	{
		$languageId = 
			$this->getSessionLanguageCode() == 'en' ? 
			'value_en' : 
			'value_jp';

		$termsOfService = SiteSettings::find()
			->select(['value' => $languageId])
			->where(['key_search' => 'terms_of_service'])
			->asArray()
			->all();

		$privacyPolicy = SiteSettings::find()
			->select(['value' => $languageId])
			->where(['key_search' => 'privacy_policy'])
			->asArray()
			->all();

		$transactionsLaw = SiteSettings::find()
			->select(['value' => $languageId])
			->where(['key_search' => 'transactions_law'])
			->asArray()
			->all();

		$termsOfServiceText = $termsOfService[0]['value'];
		$privacyPolicyText = $privacyPolicy[0]['value'];
		$transactionsLawText = $transactionsLaw[0]['value'];

		$divOpening = '<div class="col-md-12 terms-of-service">';
		$separator = '<hr/>';
		$divEnding = '</div>';

		return $divOpening
			.$termsOfServiceText.$separator
			.$privacyPolicyText.$separator
			.$transactionsLawText.$divEnding;
	}

	public function actionJoinTour()
	{
		// echo 'here'; die();
		$this->addCssFile('join-tour.css');
		$tourId = $_GET['id'];

		$tourElement = Tours::find()
			->where(['id' => $tourId])
			->asArray()
			->one();

	    $model = new Participants();

	    if ($model->load(Yii::$app->request->post())) {
	        if ($model->validate()) {
	        	$model->save();
	        	Yii::$app->session->setFlash('tourJoined');
	            // form inputs are valid, do something here
	            return $this->loadTourWithId($tourId);
	        }
	    }

	    return $this->renderView('join-tour', [
	        'model' => $model,
	        'tourId' => $tourId,
	        'tourBanner' => $tourElement['image_url']
	    ]);
	}

	public function actionLogin()
    {
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
