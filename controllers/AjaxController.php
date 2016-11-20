<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use app\models\SiteSettings;
use app\models\Tours;
use app\models\Admins;
use app\models\Reports;
use app\models\Faq;
use app\models\Participants;
use app\models\LoginForm;

use app\models\UploadForm;
use yii\web\UploadedFile;

class AjaxController extends SamuraiController
{
    // FAQ
    public function actionCreateFaq() {
        $this->create(new Faq(), [
            'question_en' => $_POST['question_en'], 
            'question_jp' => $_POST['question_jp'],
            'answer_en' => $_POST['answer_en'], 
            'answer_jp' => $_POST['answer_jp']
        ]);
    }
    public function actionUpdateFaq() {
        $this->update($_POST['id'], new Faq(), [
            'question_en' => $_POST['question_en'], 
            'question_jp' => $_POST['question_jp'],
            'answer_en' => $_POST['answer_en'], 
            'answer_jp' => $_POST['answer_jp']
        ]);
    }
    public function actionDeleteFaq() {
        $this->delete($_POST['id'], new Faq());
    }

    // Reports
    public function actionCreateReport() {
        $this->create(new Reports(), [
            'question_en' => $_POST['question_en'], 
            'question_jp' => $_POST['question_jp'],
            'answer_en' => $_POST['answer_en'], 
            'answer_jp' => $_POST['answer_jp']
        ]);
    }
    public function actionUpdateReport() {
        // Data processing
        // Image
        $experienceImage = end(explode("/", $_POST['experience_image_url']));
        $sidebarImage = end(explode("/", $_POST['sidebar_image_url']));
        $workerImage = end(explode("/", $_POST['worker_image_url']));
        $setImage = end(explode("/", $_POST['set_image_url']));
        $typeId = intval($_POST['type_id']);

        // Tour Type
        $this->update($_POST['id'], new Reports(), [
            'set_image_url' => $setImage, 
            'worker_image_url' => $workerImage,
            'sidebar_image_url' => $sidebarImage, 
            'experience_image_url' => $experienceImage,
            'short_description_en' => $_POST['short_description_en'],
            'short_description_jp' => $_POST['short_description_jp'],
            'description_en' => $_POST['description_en'],
            'description_jp' => $_POST['description_jp'],
            'type_id' => $typeId
        ]);
    }
    public function actionDeleteReport() {
        $this->delete($_POST['id'], new Reports());
    }

    private function update($id = 0, $modelObject = null, $newValues = []) {
        $model = $modelObject::findOne(['id' => $id]);
        foreach ($newValues as $key => $value) {
            $model->$key = $value;
        }
        $this->returnValue($model->update());
    }

    private function delete($id = 0, $modelObject = null) {
        $model = $modelObject::findOne(['id' => $id]);
        $this->returnValue($model->delete());
    }

    private function create($modelObject = null, $newValues = []) {
        foreach ($newValues as $key => $value) {
            $modelObject->$key = $value;
        }
        $this->returnValue($modelObject->save());
    }

    private function returnValue($input = false) {
        // update() and delete() returns false if unsuccessful, but returns the number of affected rows if otherwise.
        $result = 'success';
        if ($input == false) {
            $result = 'failure';
        }

        Yii::$app->session->setFlash($result);
        echo $result;
    }

    // Image upload
    public function actionUploadImage() {
        //TO-DO: File checks (http://www.w3schools.com/php/php_file_upload.asp)
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $_POST['image']));
        file_put_contents('images/'.$_POST['filename'], $data);
        echo Url::base().'images/'.$_POST['filename'];
    }
}
