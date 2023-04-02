<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_funcionario".
 *
 * @property int $id_matricula_funcionario
 * @property string $nome
 * @property string $data_nascimento
 * @property string $email
 * @property string $tipo_funcionario
 */
class TbFuncionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_matricula_funcionario', 'nome', 'data_nascimento', 'email', 'tipo_funcionario'], 'required'],
            [['id_matricula_funcionario'], 'integer'],
            [['data_nascimento'], 'safe'],
            [['nome'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 60],
            [['tipo_funcionario'], 'string', 'max' => 20],
            [['id_matricula_funcionario'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_matricula_funcionario' => 'Id Matricula Funcionario',
            'nome' => 'Nome',
            'data_nascimento' => 'Data Nascimento',
            'email' => 'Email',
            'tipo_funcionario' => 'Tipo Funcionario',
        ];
    }
}
