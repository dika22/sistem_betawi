<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery_album".
 *
 * @property integer $id
 * @property string $title
 * @property string $type
 * @property string $desc
 * @property string $status
 * @property integer $viewed
 * @property integer $created_by
 * @property integer $modified_by
 * @property string $created_at
 * @property string $modified_at
 * @property string $tags
 * @property string $post_date
 *
 * @property GalleryAlbumCollection[] $galleryAlbumCollections
 */
class GalleryAlbum extends \common\models\HActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_album';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'type'], 'required'],
            [['type', 'status', 'tags'], 'string'],
            [['viewed', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at', 'post_date'], 'safe'],
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
            'type' => 'Type',
            'desc' => 'Desc',
            'status' => 'Status',
            'viewed' => 'Viewed',
            'created_by' => 'Created By',
            'modified_by' => 'Modified By',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
            'tags' => 'Tags',
            'post_date' => 'Post Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryAlbumCollections()
    {
        return $this->hasMany(GalleryAlbumCollection::className(), ['gallery_album_id' => 'id']);
    }
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getThumbnail()
    {
        return $this->hasOne(GalleryAlbumCollection::className(), ['gallery_album_id' => 'id']);;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModifiedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'modified_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}