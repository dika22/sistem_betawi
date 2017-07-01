<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property string $setting_name
 * @property string $value
 * @property string $value2
 * @property string $min_date
 * @property string $max_date
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['setting_name', 'value'], 'required'],
            [['value', 'value2'], 'string'],
            [['min_date', 'max_date'], 'safe'],
            [['setting_name'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'setting_name' => 'Setting Name',
            'value' => 'Value',
            'value2' => 'Value2',
            'min_date' => 'Min Date',
            'max_date' => 'Max Date',
        ];
    }
}
