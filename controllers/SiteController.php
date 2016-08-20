<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\data\Sort;
use app\models\ContactForm;
use app\models\FrontPageElements;
use app\models\Tours;
use app\models\Reports;

class SiteController extends SamuraiController
{
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['logout'],
				'rules' => [
					[
						'actions' => ['logout'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout' => ['post'],
				],
			],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

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
			['id' => 'tours', 'front_page_image_type_id' => 2, 'limit' => 3],
			['id' => 'about', 'front_page_image_type_id' => 3, 'limit' => 1],
			['id' => 'report', 'front_page_image_type_id' => 4, 'limit' => 1],
			['id' => 'samurai', 'front_page_image_type_id' => 5, 'limit' => 1],
			['id' => 'participation-image', 'front_page_image_type_id' => 6, 'limit' => 2],
			['id' => 'participation-person', 'front_page_image_type_id' => 7, 'limit' => 2],
			['id' => 'participation-text', 'front_page_image_type_id' => 8, 'limit' => 2],
			['id' => 'facebook', 'front_page_image_type_id' => 9, 'limit' => 1],
			['id' => 'icon', 'front_page_image_type_id' => 10, 'limit' => 1],
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
		$this->addCssFile('report.css');
		$this->addJsFile('report.js');
		
		$limitCount = 7;

		$lastElements = Reports::find()
			->select(['report_id', 'sidebar_image_url', 'short_description'])
			->orderBy(['report_id' => SORT_DESC])
			->asArray()
			->limit($limitCount)
			->all();

		$firstElement = Reports::find()
			->select(['worker_image_url', 'set_image_url', 'experience_image_url', 'description'])
			->orderBy(['report_id' => SORT_DESC])
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
			->orderBy(['report_id' => SORT_DESC])
			->where(['<', 'report_id', $_POST['id']])
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
	 * Tours action.
	 *
	 * @return string
	 */
	public function actionFaq()
	{
		return $this->renderView('faq');
	}

	/**
	 * Tours action.
	 *
	 * @return string
	 */
	public function actionPrivacy()
	{
		return $this->renderView('privacy');
	}

	/**
	 * Displays contact page.
	 *
	 * @return string
	 */
	public function actionContact()
	{
		return $this->renderView('about');
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
}
