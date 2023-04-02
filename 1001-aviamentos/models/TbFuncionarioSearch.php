<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbFuncionario;

/**
 * TbFuncionarioSearch represents the model behind the search form of `app\models\TbFuncionario`.
 */
class TbFuncionarioSearch extends TbFuncionario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_matricula_funcionario'], 'integer'],
            [['nome', 'data_nascimento', 'email', 'tipo_funcionario'], 'safe'],
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
        $query = TbFuncionario::find();

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
            'id_matricula_funcionario' => $this->id_matricula_funcionario,
            'data_nascimento' => $this->data_nascimento,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'tipo_funcionario', $this->tipo_funcionario]);

        return $dataProvider;
    }
}
