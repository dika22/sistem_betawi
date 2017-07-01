<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery_album_collection".
 *
 * @property integer $id
 * @property integer $gallery_id
 * @property integer $gallery_album_id
 * @property string $title
 * @property string $desc
 * @property integer $created_by
 * @property integer $modified_by
 * @property string $created_at
 * @property string $modified_at
 *
 * @property GalleryAlbum $galleryAlbum
 * @property Gallery $gallery
 */
class GalleryAlbumCollection extends \common\models\HActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_album_collection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gallery_id', 'gallery_album_id'], 'required'],
            [['gallery_id', 'gallery_album_id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['desc'], 'string', 'max' => 500],
            [['gallery_album_id'], 'exist', 'skipOnError' => true, 'targetClass' => GalleryAlbum::className(), 'targetAttribute' => ['gallery_album_id' => 'id']],
            [['gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gallery::className(), 'targetAttribute' => ['gallery_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gallery_id' => 'Gallery ID',
            'gallery_album_id' => 'Gallery Album ID',
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
    public function getGalleryAlbum()
    {
        return $this->hasOne(GalleryAlbum::className(), ['id' => 'gallery_album_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(Gallery::className(), ['id' => 'gallery_id']);
    }
}
