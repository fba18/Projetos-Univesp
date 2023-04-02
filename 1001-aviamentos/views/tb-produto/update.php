<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TbProduto $model */

$this->title = 'Update Tb Produto: ' . $model->num_produto;
$this->params['breadcrumbs'][] = ['label' => 'Tb Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->num_produto, 'url' => ['view', 'num_produto' => $model->num_produto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-produto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
