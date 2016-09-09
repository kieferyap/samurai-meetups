<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\FrontPageElements;
use app\models\Tours;
use app\models\Reports;

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

		// Image ID
		$frontPageElementIds = [
			['id' => 'carousel', 'front_page_image_type_id' => 1, 'limit' => 5],
			['id' => 'tour-1', 'front_page_image_type_id' => 2, 'limit' => 1],
			['id' => 'about', 'front_page_image_type_id' => 3, 'limit' => 1],
			['id' => 'report', 'front_page_image_type_id' => 4, 'limit' => 1],
			['id' => 'samurai', 'front_page_image_type_id' => 5, 'limit' => 1],
			['id' => 'participation-image', 'front_page_image_type_id' => 6, 'limit' => 2],
			['id' => 'participation-person', 'front_page_image_type_id' => 7, 'limit' => 2],
			['id' => 'participation-text', 'front_page_image_type_id' => 8, 'limit' => 2],
			['id' => 'facebook', 'front_page_image_type_id' => 9, 'limit' => 1],
			['id' => 'icon', 'front_page_image_type_id' => 10, 'limit' => 1],
			['id' => 'tour-2', 'front_page_image_type_id' => 11, 'limit' => 1],
			['id' => 'tour-3', 'front_page_image_type_id' => 12, 'limit' => 1],
		];
		$frontPageElements = [];

		// Front Page information
		foreach($frontPageElementIds as $elementIds) {
			$element = FrontPageElements::find()
				->where(['front_page_image_type_id' => $elementIds['front_page_image_type_id']])
				->orderBy(['inserted_on' => SORT_DESC])
				->asArray()
				->limit($elementIds['limit'])
				->all();
			$frontPageElements[$elementIds['id']] = $element;
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
		$this->addCssFile('tours.css');
		$this->addJsFile('tours.js');

		$id = $_GET['id'];

		$tourElement = Tours::find()
				->where(['tour_id' => $id])
				->asArray()
				->one();

		// echo '<pre>'; print_r($tourElement); die();
		// TO-DO: If ID not found, render error.
		return $this->renderView('tours', [
			'tourElement' => $tourElement,
			'termsOfService' => Yii::$app->params['termsOfService'],
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

		$lastElements = Reports::find()
			->select(['report_id', 'sidebar_image_url', 'short_description', 'type_id'])
			->orderBy(['report_id' => SORT_ASC])
			->asArray()
			->limit($limitCount)
			->all();

		$firstElement = Reports::find()
			->select(['worker_image_url', 'set_image_url', 'experience_image_url', 'description'])
			->orderBy(['report_id' => SORT_ASC])
			->asArray()
			->one();

		$lastElement = end($lastElements);

		return $this->renderView('report', [
			'reports' => $lastElements,
			'lastElementId' => $lastElement['report_id'],
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
		
		$lastElements = Reports::find()
			->select(['report_id', 'sidebar_image_url', 'short_description'])
			->orderBy(['report_id' => SORT_ASC])
			->where(['>', 'report_id', $_POST['id']])
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
		$reportElement = Reports::find()
			->select(['worker_image_url', 'set_image_url', 'experience_image_url', 'description'])
			->where(['report_id' => $_POST['id']])
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
		return $this->showComingSoon();
		// return $this->renderView('faq');
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
		
		return $this->renderView('privacy', [
			'termsOfService' => Yii::$app->params['termsOfService'],
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

	public function actionStarbucks()
	{
		return $this->renderView('starbucks');
	}
}
