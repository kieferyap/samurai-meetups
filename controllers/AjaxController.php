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
        $this->debugPrint('Create Faq');
    }
    public function actionUpdateFaq() {
        $this->update(2, new Faq(), ['question_en' => 'YAY', 'question_jp' => 'YAYY']);
    }
    public function actionDeleteFaq() {
        $this->debugPrint('Delete Faq');
    }

    private function update($id = 0, $modelObject = null, $newValues = []) {
        $modelObject::find($id)->where(['id' => $id])->one();
        foreach ($newValues as $key => $value) {
            $modelObject->$$key = $value;
        }
        $modelObject->update();
        echo 'reached the end';
        die();
    }
}
