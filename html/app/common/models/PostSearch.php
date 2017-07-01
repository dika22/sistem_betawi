<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Post;

/**
 * PostSearch represents the model behind the search form about `common\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'image', 'author', 'featured', 'created_by', 'modified_by', 'counter', 'gallery_album_id', 'video_album_id'], 'integer'],
            [['title', 'content', 'teaser', 'tags', 'keyword', 'post_date', 'modified_at', 'created_at', 'draft', 'headline_home', 'headline_kanal'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
       $query = Post::find();
        $query->joinWith(['category', 'createdBy']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['post_date'=>SORT_DESC]]
        ]);

        $dataProvider->sort->attributes['category'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'defaultOrder' => ['d_post_categories.name'=>SORT_ASC],
            'asc' => ['d_post_categories.name' => SORT_ASC],
            'desc' => ['d_post_categories.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['createdBy'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'defaultOrder' => ['user.username'=>SORT_ASC],
            'asc' => ['user.username' => SORT_ASC],
            'desc' => ['user.username' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'image' => $this->image,
            'author' => $this->author,
            'post_date' => $this->post_date,
            'featured' => $this->featured,
            'modified_at' => $this->modified_at,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'modified_by' => $this->modified_by,
            'counter' => $this->counter,
            'gallery_album_id' => $this->gallery_album_id,
            'video_album_id' => $this->video_album_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'teaser', $this->teaser])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'draft', $this->draft])
            ->andFilterWhere(['like', 'headline_home', $this->headline_home])
            ->andFilterWhere(['like', 'headline_kanal', $this->headline_kanal]);

        return $dataProvider;
    }
}
