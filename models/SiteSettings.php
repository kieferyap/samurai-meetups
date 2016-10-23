<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_settings".
 *
 * @property integer $id
 * @property string $key_search
 * @property string $key_description
 * @property string $value_en
 * @property string $value_jp
 * @property string $extra_information
 */
class SiteSettings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key_description', 'value_en', 'value_jp', 'extra_information'], 'string'],
            [['key_search'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key_search' => 'Key Search',
            'key_description' => 'Key Description',
            'value_en' => 'Value En',
            'value_jp' => 'Value Jp',
            'extra_information' => 'Extra Information',
        ];
    }
}
