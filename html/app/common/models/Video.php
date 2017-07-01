<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property integer $id
 * @property string $credit
 * @property string $title
 * @property string $description
 * @property string $youtube_id
 * @property string $status
 * @property integer $viewed
 * @property string $featured
 * @property string $tags
 * @property string $post_date
 * @property integer $videographer
 * @property string $created_at
 * @property string $modified_at
 * @property integer $created_by
 * @property integer $modified_by
 *
 * @property VideoAlbumCollection[] $videoAlbumCollections
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['credit', 'title', 'youtube_id', 'post_date'], 'required'],
            [['description', 'status', 'featured'], 'string'],
            [['viewed', 'videographer', 'created_by', 'modified_by'], 'integer'],
            [['post_date', 'created_at', 'modified_at'], 'safe'],
            [['credit', 'tags'], 'string', 'max' => 500],
            [['title', 'youtube_id'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'credit' => 'Credit',
            'title' => 'Title',
            'description' => 'Description',
            'youtube_id' => 'Youtube ID',
            'status' => 'Status',
            'viewed' => 'Viewed',
            'featured' => 'Featured',
            'tags' => 'Tags',
            'post_date' => 'Post Date',
            'videographer' => 'Videographer',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
            'created_by' => 'Created By',
            'modified_by' => 'Modified By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoAlbumCollections()
    {
        return $this->hasMany(VideoAlbumCollection::className(), ['video_id' => 'id']);
    }
}
