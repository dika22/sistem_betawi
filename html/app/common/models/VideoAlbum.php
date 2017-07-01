<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video_album".
 *
 * @property integer $id
 * @property string $title
 * @property string $desc
 * @property string $status
 * @property integer $created_by
 * @property integer $modified_by
 * @property string $created_at
 * @property string $modified_at
 *
 * @property VideoAlbumCollection[] $videoAlbumCollections
 */
class VideoAlbum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video_album';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status'], 'string'],
            [['created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['desc'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'desc' => 'Desc',
            'status' => 'Status',
            'created_by' => 'Created By',
            'modified_by' => 'Modified By',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoAlbumCollections()
    {
        return $this->hasMany(VideoAlbumCollection::className(), ['video_album_id' => 'id']);
    }
}
