<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "front_page_elements".
 *
 * @property string $image_url
 * @property string $clickable_url
 * @property integer $language_id
 * @property integer $front_page_image_type_id
 * @property string $inserted_on
 */
class FrontPageElements extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'front_page_elements';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_url', 'clickable_url'], 'string'],
            [['language_id', 'front_page_image_type_id'], 'integer'],
            [['inserted_on'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'image_url' => 'Image Url',
            'clickable_url' => 'Clickable Url',
            'language_id' => 'Language ID',
            'front_page_image_type_id' => 'Front Page Image Type ID',
            'inserted_on' => 'Inserted On',
        ];
    }
}
