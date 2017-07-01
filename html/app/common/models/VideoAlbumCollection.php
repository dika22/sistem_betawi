<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video_album_collection".
 *
 * @property integer $id
 * @property integer $video_id
 * @property integer $video_album_id
 * @property string $title
 * @property string $desc
 * @property integer $created_by
 * @property integer $modified_by
 * @property string $created_at
 * @property string $modified_at
 *
 * @property VideoAlbum $videoAlbum
 * @property Video $video
 */
class VideoAlbumCollection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video_album_collection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['video_id', 'video_album_id'], 'required'],
            [['video_id', 'video_album_id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['desc'], 'string', 'max' => 500],
            [['video_album_id'], 'exist', 'skipOnError' => true, 'targetClass' => VideoAlbum::className(), 'targetAttribute' => ['video_album_id' => 'id']],
            [['video_id'], 'exist', 'skipOnError' => true, 'targetClass' => Video::className(), 'targetAttribute' => ['video_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video_id' => 'Video ID',
            'video_album_id' => 'Video Album ID',
            'title' => 'Title',
            'desc' => 'Desc',
            'created_by' => 'Created By',
            'modified_by' => 'Modified By',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoAlbum()
    {
        return $this->hasOne(VideoAlbum::className(), ['id' => 'video_album_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Video::className(), ['id' => 'video_id']);
    }
}
