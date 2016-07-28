<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reports".
 *
 * @property integer $report_id
 * @property string $sidebar_image_url
 * @property string $worker_image_url
 * @property string $set_image_url
 * @property string $experience_image_url
 * @property string $description
 */
class Reports extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reports';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sidebar_image_url', 'worker_image_url', 'set_image_url', 'experience_image_url', 'description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'report_id' => 'Report ID',
            'sidebar_image_url' => 'Sidebar Image Url',
            'worker_image_url' => 'Worker Image Url',
            'set_image_url' => 'Set Image Url',
            'experience_image_url' => 'Experience Image Url',
            'description' => 'Description',
        ];
    }
}
