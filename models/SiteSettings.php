<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_settings".
 *
 * @property integer $id
 * @property string $key_search
 * @property string $key_description_jp
 * @property string $key_description_en
 * @property string $value_en
 * @property string $value_jp
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
            [['key_description_jp', 'value_en', 'value_jp'], 'string'],
            [['key_search'], 'string', 'max' => 128],
            [['key_description_en'], 'string', 'max' => 64],
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
            'key_description_jp' => 'Key Description Jp',
            'key_description_en' => 'Key Description En',
            'value_en' => 'Value En',
            'value_jp' => 'Value Jp',
        ];
    }
}
