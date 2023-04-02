<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbProduto;

/**
 * TbProdutoSearch represents the model behind the search form of `app\models\TbProduto`.
 */
class TbProdutoSearch extends TbProduto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_produto'], 'integer'],
            [['nome_produto', 'estado_produto'], 'safe'],
            [['preco_produto'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TbProduto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'num_produto' => $this->num_produto,
            'preco_produto' => $this->preco_produto,
        ]);

        $query->andFilterWhere(['like', 'nome_produto', $this->nome_produto])
            ->andFilterWhere(['like', 'estado_produto', $this->estado_produto]);

        return $dataProvider;
    }
}
