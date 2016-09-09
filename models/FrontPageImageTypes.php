<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "front_page_image_types".
 *
 * @property integer $front_page_image_type_id
 * @property string $description
 */
class FrontPageImageTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'front_page_image_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'front_page_image_type_id' => Yii::t('app', 'Front Page Image Type ID'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
