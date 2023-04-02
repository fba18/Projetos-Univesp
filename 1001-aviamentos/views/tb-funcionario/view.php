<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TbFuncionario $model */

$this->title = $model->id_matricula_funcionario;
$this->params['breadcrumbs'][] = ['label' => 'Tb Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tb-funcionario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_matricula_funcionario' => $model->id_matricula_funcionario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_matricula_funcionario' => $model->id_matricula_funcionario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_matricula_funcionario',
            'nome',
            'data_nascimento',
            'email:email',
            'tipo_funcionario',
        ],
    ]) ?>

</div>
