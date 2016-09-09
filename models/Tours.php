<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tours".
 *
 * @property integer $tour_id
 * @property string $image_url
 * @property string $event_summary
 * @property string $meeting_time_and_place
 * @property string $place_for_visit_and_tips
 * @property string $time_schedule
 * @property string $price
 * @property string $samurai_information
 * @property string $google_doc_url
 * @property integer $language_id
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
            [['event_summary', 'meeting_time_and_place', 'place_for_visit_and_tips', 'time_schedule', 'price', 'samurai_information'], 'string'],
            [['language_id'], 'integer'],
            [['inserted_on'], 'safe'],
            [['image_url'], 'string', 'max' => 64],
            [['google_doc_url'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tour_id' => Yii::t('app', 'Tour ID'),
            'image_url' => Yii::t('app', 'Image Url'),
            'event_summary' => Yii::t('app', 'Event Summary'),
            'meeting_time_and_place' => Yii::t('app', 'Meeting Time And Place'),
            'place_for_visit_and_tips' => Yii::t('app', 'Place For Visit And Tips'),
            'time_schedule' => Yii::t('app', 'Time Schedule'),
            'price' => Yii::t('app', 'Price'),
            'samurai_information' => Yii::t('app', 'Samurai Information'),
            'google_doc_url' => Yii::t('app', 'Google Doc Url'),
            'language_id' => Yii::t('app', 'Language ID'),
            'inserted_on' => Yii::t('app', 'Inserted On'),
        ];
    }
}
