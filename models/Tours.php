<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tours".
 *
 * @property integer $tour_id
 * @property string $image_url
 * @property string $description
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
            [['image_url', 'description'], 'string'],
            [['inserted_on'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tour_id' => 'Tour ID',
            'image_url' => 'Image Url',
            'description' => 'Description',
            'inserted_on' => 'Inserted On',
        ];
    }
}
