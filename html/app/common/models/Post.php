<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $content
 * @property integer $image
 * @property string $teaser
 * @property string $tags
 * @property integer $author
 * @property integer $editor
 * @property string $keyword
 * @property string $post_date
 * @property integer $featured
 * @property string $modified_at
 * @property integer $created_by
 * @property string $created_at
 * @property integer $modified_by
 * @property integer $counter
 * @property string $draft
 * @property string $headline_home
 * @property string $headline_kanal
 * @property integer $gallery_album_id
 * @property integer $video_album_id
 
 *
 * @property PostCategories $category
 * @property PersonalTeam $editor0
 * @property PersonalTeam $author0
 */
class Post extends \common\models\HActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'content', 'teaser', 'post_date'], 'required'],
            [['category_id','sub_category', 'image', 'author', 'featured', 'created_by', 'modified_by', 'counter', 'gallery_album_id', 'video_album_id'], 'integer'],
            [['content', 'draft', 'headline_home', 'headline_kanal'], 'string'],
            [['post_date', 'modified_at', 'created_at'], 'safe'],
            [['title'], 'string', 'max' => 300],
            [['teaser', 'tags'], 'string', 'max' => 200],
            [['keyword'], 'string', 'max' => 500],
            [['sub_category'], 'exist', 'skipOnError' => true, 'targetClass' => SubCategory::className(), 'targetAttribute' => ['sub_category' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostCategories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['author'], 'exist', 'skipOnError' => true, 'targetClass' => PersonalTeam::className(), 'targetAttribute' => ['author' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sub_category' => 'Sub Category',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'content' => 'Content',
            'image' => 'Image',
            'teaser' => 'Teaser',
            'tags' => 'Tags',
            'author' => 'Author',
            'keyword' => 'Keyword',
            'post_date' => 'Post Date',
            'featured' => 'Featured',
            'modified_at' => 'Modified At',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'modified_by' => 'Modified By',
            'counter' => 'Counter',
            'draft' => 'Draft',
            'headline_home' => 'Headline Home',
            'headline_kanal' => 'Headline Kanal',
            'gallery_album_id' => 'Gallery Album ID',
            'video_album_id' => 'Video Album ID',

        ];
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubCategory()
    {
        return $this->hasOne(SubCategory::className(), ['id' => 'sub_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(PostCategories::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor0()
    {
        return $this->hasOne(PersonalTeam::className(), ['id' => 'author']);
    }
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getThumbnail()
    {
        return $this->hasOne(Gallery::className(), ['id' => 'image']);
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
