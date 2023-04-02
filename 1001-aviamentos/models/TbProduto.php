<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_produto".
 *
 * @property int $num_produto
 * @property string $nome_produto
 * @property string $estado_produto
 * @property float $preco_produto
 */
class TbProduto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_produto', 'nome_produto', 'estado_produto', 'preco_produto'], 'required'],
            [['num_produto'], 'integer'],
            [['preco_produto'], 'number'],
            [['nome_produto'], 'string', 'max' => 60],
            [['estado_produto'], 'string', 'max' => 20],
            [['num_produto'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'num_produto' => 'Num Produto',
            'nome_produto' => 'Nome Produto',
            'estado_produto' => 'Estado Produto',
            'preco_produto' => 'Preco Produto',
        ];
    }
}
