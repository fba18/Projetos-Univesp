<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TbProduto $model */

$this->title = $model->num_produto;
$this->params['breadcrumbs'][] = ['label' => 'Tb Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tb-produto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'num_produto' => $model->num_produto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'num_produto' => $model->num_produto], [
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
            'num_produto',
            'nome_produto',
            'estado_produto',
            'preco_produto',
        ],
    ]) ?>

</div>
