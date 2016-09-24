<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tours".
 *
 * @property integer $id
 * @property string $image_url
 * @property string $event_summary
 * @property string $meeting_time_and_place
 * @property string $place_for_visit_and_tips
 * @property string $time_schedule
 * @property string $price
 * @property string $samurai_information
 * @property string $google_doc_url
 * @property string $inserted_on
 */
class Tours extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tours';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_url', 'event_summary', 'meeting_time_and_place', 'place_for_visit_and_tips', 'time_schedule', 'price', 'samurai_information', 'google_doc_url', 'inserted_on'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_url' => 'Image Url',
            'event_summary' => 'Event Summary',
            'meeting_time_and_place' => 'Meeting Time And Place',
            'place_for_visit_and_tips' => 'Place For Visit And Tips',
            'time_schedule' => 'Time Schedule',
            'price' => 'Price',
            'samurai_information' => 'Samurai Information',
            'google_doc_url' => 'Google Doc Url',
            'inserted_on' => 'Inserted On',
        ];
    }
}
