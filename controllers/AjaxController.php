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
        // Data processing
        // Image
        $experienceImage = end(explode("/", $_POST['experience_image_url']));
        $sidebarImage = end(explode("/", $_POST['sidebar_image_url']));
        $workerImage = end(explode("/", $_POST['worker_image_url']));
        $setImage = end(explode("/", $_POST['set_image_url']));
        $typeId = intval($_POST['type_id']);

        // Tour Type
        $this->create(new Reports(), [
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

    // Tours
    // Reports
    public function actionCreateTour() {
        // Data processing
        // Image
        $imageUrl = end(explode("/", $_POST['image_url']));
        $topImageUrl = end(explode("/", $_POST['top_image_url']));

        // Tour Type
        $this->create(new Tours(), [
            'event_summary' => $_POST['event_summary'], 
            'meeting_time_and_place' => $_POST['meeting_time_and_place'],
            'place_for_visit_and_tips' => $_POST['place_for_visit_and_tips'], 
            'time_schedule' => $_POST['time_schedule'],
            'price' => $_POST['price'],
            'samurai_information' => $_POST['samurai_information'],
            'image_url' => $imageUrl,
            'top_image_url' => $topImageUrl
        ]);
    }
    public function actionUpdateTour() {
        // Data processing
        // Image
        $imageUrl = end(explode("/", $_POST['image_url']));
        $topImageUrl = end(explode("/", $_POST['top_image_url']));

        // Tour Type
        $this->update($_POST['id'], new Tours(), [
            'event_summary' => $_POST['event_summary'], 
            'meeting_time_and_place' => $_POST['meeting_time_and_place'],
            'place_for_visit_and_tips' => $_POST['place_for_visit_and_tips'], 
            'time_schedule' => $_POST['time_schedule'],
            'price' => $_POST['price'],
            'samurai_information' => $_POST['samurai_information'],
            'image_url' => $imageUrl,
            'top_image_url' => $topImageUrl
        ]);
    }
    public function actionDeleteTour() {
        $this->delete($_POST['id'], new Tours());
    }

    // Site Settings
    public function actionUpdateSiteSettings() {
        // Get the key type based on the ID
        $id = $_POST['id'];

        // Gather information about the setting.
        $inputType = SiteSettings::find()
            ->select(['key_type'])
            ->where(['id' => $id])
            ->asArray()
            ->one();

        // If the data is an image, process it as an image. Else, process it normally.
        $valueEn = $_POST['value_en'];
        $valueJp = $_POST['value_jp'];
        if ($inputType[0]['key_type'] == 'image-upload') {
            $valueEn = end(explode("/", $_POST['value_en']));
            $valueJp = end(explode("/", $_POST['value_jp']));
        }

        // Update the database
        $this->update($_POST['id'], new SiteSettings(), [
            'value_en' => $valueEn,
            'value_jp' => $valueJp
        ]);
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
        //Filechecks:
        $success = false;
        $message = "Sorry, there was an error in uploading the file.";
        
        if (intval($_POST['size']) > 10000000) {
            $message = "Sorry, the file size is too large. (It exceeds 10MB.)";
        }
        else if (
            $_POST['type'] != "image/jpg" 
            && $_POST['type'] != "image/jpeg" 
            && $_POST['type'] != "image/png"
            && $_POST['type'] != "image/gif"
        ) {
            $message = "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        }
        else {
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $_POST['image']));
            file_put_contents('images/'.$_POST['filename'], $data);
            $success = true;
            $message = Url::base().'images/'.$_POST['filename'];
        }

        echo json_encode(array(
            "success" => $success,
            "message" => $message
        ));
    }
}
