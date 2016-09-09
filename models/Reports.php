<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reports".
 *
 * @property integer $report_id
 * @property integer $order_id
 * @property integer $type_id
 * @property string $sidebar_image_url
 * @property string $worker_image_url
 * @property string $set_image_url
 * @property string $experience_image_url
 * @property string $short_description
 * @property string $description
 * @property integer $language_id
 * @property string $inserted_on
 */
class Reports extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reports';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'type_id', 'language_id'], 'integer'],
            [['sidebar_image_url', 'worker_image_url', 'set_image_url', 'experience_image_url', 'description'], 'string'],
            [['inserted_on'], 'safe'],
            [['short_description'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'report_id' => Yii::t('app', 'Report ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'type_id' => Yii::t('app', 'Type ID'),
            'sidebar_image_url' => Yii::t('app', 'Sidebar Image Url'),
            'worker_image_url' => Yii::t('app', 'Worker Image Url'),
            'set_image_url' => Yii::t('app', 'Set Image Url'),
            'experience_image_url' => Yii::t('app', 'Experience Image Url'),
            'short_description' => Yii::t('app', 'Short Description'),
            'description' => Yii::t('app', 'Description'),
            'language_id' => Yii::t('app', 'Language ID'),
            'inserted_on' => Yii::t('app', 'Inserted On'),
        ];
    }
}
