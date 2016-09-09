<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "front_page_elements".
 *
 * @property integer $id
 * @property string $image_url
 * @property string $clickable_url
 * @property string $description
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
            [['language_id', 'front_page_image_type_id'], 'integer'],
            [['inserted_on'], 'safe'],
            [['image_url', 'clickable_url'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'image_url' => Yii::t('app', 'Image Url'),
            'clickable_url' => Yii::t('app', 'Clickable Url'),
            'description' => Yii::t('app', 'Description'),
            'language_id' => Yii::t('app', 'Language ID'),
            'front_page_image_type_id' => Yii::t('app', 'Front Page Image Type ID'),
            'inserted_on' => Yii::t('app', 'Inserted On'),
        ];
    }
}
