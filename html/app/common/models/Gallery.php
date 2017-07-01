<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property string $title
 * @property string $credit
 * @property string $caption
 * @property integer $photographer
 * @property string $image
 * @property string $extension
 * @property string $base_name
 * @property string $created_at
 * @property string $modified_at
 * @property integer $created_by
 * @property integer $modified_by
 *
 * @property GalleryAlbumCollection[] $galleryAlbumCollections
 */
class Gallery extends \common\models\HActiveRecord
{
    public $upload;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'credit', 'image', 'extension', 'base_name'], 'required'],
            [['upload'],'required','on'=>'create'],
            [['created_by', 'modified_by'], 'integer'],
            [['upload'],'file','extensions'=>'jpg, png', 'maxSize'=>1000000], //max 1 mb
            //[['image'], 'file', 'extension'=>['jpg', 'png']],
            [['created_at', 'modified_at'], 'safe'],
            [['title', 'image', 'base_name'], 'string', 'max' => 1000],
            [['credit'], 'string', 'max' => 200],
            [['caption'], 'string', 'max' => 500],
            [['extension'], 'string', 'max' => 10],
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
            'credit' => 'Credit',
            'caption' => 'Caption',
            'image' => 'Image',
            'upload'=>'upload',
            'extension' => 'Extension',
            'base_name' => 'Base Name',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
            'created_by' => 'Created By',
            'modified_by' => 'Modified By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryAlbumCollections()
    {
        return $this->hasMany(GalleryAlbumCollection::className(), ['gallery_id' => 'id']);
    }

    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModifiedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'modified_by']);
    }

}
