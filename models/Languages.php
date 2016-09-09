<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property integer $language_id
 * @property string $description
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'language_id' => Yii::t('app', 'Language ID'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
