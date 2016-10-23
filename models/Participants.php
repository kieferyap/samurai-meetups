<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "participants".
 *
 * @property integer $id
 * @property string $name
 * @property string $gender
 * @property string $country
 * @property string $facebook_id
 * @property integer $number_of_people
 * @property string $companions_name
 * @property string $question
 * @property integer $tour_id
 * @property string $joined_on
 */
class Participants extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'participants';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number_of_people', 'tour_id'], 'integer'],
            [['question'], 'string'],
            [['joined_on'], 'safe'],
            [['name', 'companions_name'], 'string', 'max' => 128],
            [['gender'], 'string', 'max' => 8],
            [['country'], 'string', 'max' => 32],
            [['facebook_id'], 'string', 'max' => 64],
            [['name', 'gender', 'country', 'number_of_people', 'companions_name'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'gender' => 'Gender',
            'country' => 'Country',
            'facebook_id' => 'Facebook ID (facebook.com/***)',
            'number_of_people' => 'Number Of People',
            'companions_name' => 'Companion\'s Name',
            'question' => 'Question',
            'tour_id' => 'Tour ID',
            'joined_on' => 'Joined On',
        ];
    }
}
