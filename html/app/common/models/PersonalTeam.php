<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "personal_team".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $code
 * @property string $jabatan
 * @property string $avatar
 * @property string $profile
 * @property string $created_at
 * @property integer $created_by
 * @property string $modified_at
 * @property integer $modified_by
 *
 * @property User $user
 */
class PersonalTeam extends \common\models\HActiveRecord
{
    /**
     * @inheritdoc
     */
    public $upload;
    public static function tableName()
    {
        return 'personal_team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'jabatan', 'profile'], 'required'],
            [['user_id', 'created_by', 'modified_by'], 'integer'],
            [['upload'], 'required', 'on'=>'create'],
            [['upload'], 'file', 'extensions'=>'png, jpg', 'maxSize'=>1000000], // max 1mb
            [['profile'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['name', 'avatar'], 'string', 'max' => 20],
            [['code'], 'string', 'max' => 10],
            [['jabatan'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'code' => 'Code',
            'jabatan' => 'Jabatan',
            'upload'=>'upload',
            'avatar' => 'Avatar',
            'profile' => 'Profile',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
