<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property integer $id
 * @property string $question_en
 * @property string $question_jp
 * @property string $answer_en
 * @property string $answer_jp
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_en', 'question_jp', 'answer_en', 'answer_jp'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_en' => 'Question En',
            'question_jp' => 'Question Jp',
            'answer_en' => 'Answer En',
            'answer_jp' => 'Answer Jp',
        ];
    }
}
