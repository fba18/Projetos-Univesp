<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TbProduto $model */

$this->title = 'Atualizar Produto - Código: ' . $model->num_produto;
$this->params['breadcrumbs'][] = ['label' => 'Voltar', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->num_produto, 'url' => ['view', 'num_produto' => $model->num_produto]];
$this->params['breadcrumbs'][] = 'Atualizar Produto';
?>
<div class="tb-produto-update">

    <!--h1><?= Html::encode($this->title) ?></h1-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
