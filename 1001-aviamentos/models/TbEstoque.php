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
            'num_produto' => 'Num Produto',
            'qtd_itens' => 'Qtd Itens',
            'endereco_item' => 'Endereco Item',
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
}
