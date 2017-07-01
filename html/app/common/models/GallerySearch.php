<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Gallery;

/**
 * GallerySearch represents the model behind the search form about `common\models\Gallery`.
 */
class GallerySearch extends Gallery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'modified_by'], 'integer'],
            [['title', 'credit', 'caption', 'image', 'extension', 'base_name', 'created_at', 'modified_at'], 'safe'],
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
         $query = Gallery::find();
        //$query->joinWith(['photoGrapher']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);

        // $dataProvider->sort->attributes['photoGrapher.name'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            //'defaultOrder' => ['user.username'=>SORT_ASC],
            // 'asc' => ['photoGrapher.name' => SORT_ASC],
            // 'desc' => ['photoGrapher.name' => SORT_DESC],
        // ];

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'photographer' => $this->photographer,
            'created_at' => $this->created_at,
            'modified_at' => $this->modified_at,
            'created_by' => $this->created_by,
            'modified_by' => $this->modified_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'credit', $this->credit])
            ->andFilterWhere(['like', 'caption', $this->caption])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'extension', $this->extension])
            ->andFilterWhere(['like', 'base_name', $this->base_name]);

        return $dataProvider;
    }
}
