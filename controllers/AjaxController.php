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

class AjaxController extends SamuraiController
{
    public function actionCreateFaq() {
        $this->create(new Faq(), [
            'question_en' => 'YAY', 
            'question_jp' => 'YAYY', 
            'answer_en' => 'MON', 
            'answer_jp' => 'TUE'
        ]);
    }
    public function actionUpdateFaq() {
        $this->update(2, new Faq(), [
            'question_en' => 'MMF', 
            'question_jp' => 'MMFH'
        ]);
    }
    public function actionDeleteFaq() {
        $this->delete(3, new Faq());
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
        if ($input == false) {
            echo 'failure';
        }
        else {
            echo 'success';
        }
    }
}
