<?php

namespace app\models;


use Yii;
use yii\behaviors\AttibyteBehavior;
use yii\db\ActiveRecord;
use yii\web\Response;
use yii\db\Expression;

/**
 * This is the model class for table "tb_estoque".
 *
 * @property int $id_estoque
 * @property int $num_produto
 * @property int $qtd_itens
 * @property string $endereco_item
 */
class TbEstoque extends \yii\db\ActiveRecord
{
    public $nome_produto;
    public $estado_produto;
    public $preco_produto;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_estoque';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'num_produto', 'qtd_itens', 'endereco_item'], 'required'],
            [['id_estoque', 'num_produto', 'qtd_itens'], 'integer'],
            [['endereco_item'], 'string', 'max' => 20],
            [['id_estoque'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estoque' => 'Id Estoque',
            'num_produto' => 'Cód. Produto',
            'qtd_itens' => 'Qtd. Itens',
            'endereco_item' => 'Endereço Item',

            'nome_produto' => 'Nome do Produto',
            'estado_produto' => 'Estado do Produto',
            'preco_produto' => 'Preço do Produto'
        ];
    }

    public static function getEstoques()
    {
        $estoques = self::find()->all();
        $data = [];
        foreach ($estoques as $estoque) {
            $data[$estoque->num_produto] = $estoque->num_produto;
        }
        return $data;
    }

    public static function getEstoquesEnd()
    {
        $estoques = self::find()->all();
        $data = [];
        foreach ($estoques as $estoque) {
            $data[$estoque->endereco_item] = $estoque->endereco_item;
        }
        return $data;
    }

    public function getProduto()
    {
        return $this->hasOne(TbProduto::className(), ['num_produto' => 'num_produto']);
    }

    public function fields()
    {
        $fields = parent::fields();
        $fields[] = 'nome_produto';
        $fields[] = 'estado_produto';
        $fields[] = 'preco_produto';
        return $fields;
    }
}
