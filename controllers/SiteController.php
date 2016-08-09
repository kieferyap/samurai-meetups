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

class SiteController extends Controller
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
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

        // Carousel information
        foreach($frontPageElementIds as $elementIds) {
            $element = FrontPageElements::find()
                ->where(['front_page_image_type_id' => $elementIds['front_page_image_type_id']])
                ->orderBy(['inserted_on' => SORT_DESC])
                ->asArray()
                ->limit($elementIds['limit'])
                ->all();
            $frontPageElements[$elementIds['id']] = $element;
        }
        
        // Testing
        echo '<pre>';
        print_r($frontPageElements); 
        echo '</pre>';
        die();
        return $this->render('index');
    }

    /**
     * Tours action.
     *
     * @return string
     */
    public function actionTours()
    {
        return $this->render('tours');
    }

    /**
     * Tours action.
     *
     * @return string
     */
    public function actionReport()
    {
        return $this->render('report');
    }

    /**
     * Tours action.
     *
     * @return string
     */
    public function actionFaq()
    {
        return $this->render('faq');
    }

    /**
     * Tours action.
     *
     * @return string
     */
    public function actionPrivacy()
    {
        return $this->render('privacy');
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
