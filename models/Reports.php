<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reports".
 *
 * @property integer $id
 * @property string $sidebar_image_url
 * @property string $worker_image_url
 * @property string $set_image_url
 * @property string $experience_image_url
 * @property string $short_description_en
 * @property string $short_description_jp
 * @property string $description_en
 * @property string $description_jp
 * @property integer $type_id
 * @property string $inserted_on
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
            [['sidebar_image_url', 'worker_image_url', 'set_image_url', 'experience_image_url', 'short_description_jp', 'description_en', 'description_jp'], 'string'],
            [['type_id'], 'integer'],
            [['inserted_on'], 'safe'],
            [['short_description_en'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sidebar_image_url' => 'Sidebar Image Url',
            'worker_image_url' => 'Worker Image Url',
            'set_image_url' => 'Set Image Url',
            'experience_image_url' => 'Experience Image Url',
            'short_description_en' => 'Short Description En',
            'short_description_jp' => 'Short Description Jp',
            'description_en' => 'Description En',
            'description_jp' => 'Description Jp',
            'type_id' => 'Type ID',
            'inserted_on' => 'Inserted On',
        ];
    }
}
