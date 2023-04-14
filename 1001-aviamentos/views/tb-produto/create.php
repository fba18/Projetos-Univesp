<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TbProduto $model */

$this->title = 'Cadastrar Novo Produto';
$this->params['breadcrumbs'][] = ['label' => 'Voltar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-produto-create">

    <!--h1><?= Html::encode($this->title) ?></h1-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
