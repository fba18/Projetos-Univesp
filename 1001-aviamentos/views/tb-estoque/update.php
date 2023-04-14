<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TbEstoque $model */

$this->title = 'Atualizar Saldo Estoque: ';
$this->params['breadcrumbs'][] = ['label' => 'Voltar', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id_estoque, 'url' => ['view', 'id_estoque' => $model->id_estoque]];
$this->params['breadcrumbs'][] = 'Atualizar Saldo Estoque';
?>
<div class="tb-estoque-update">

    <!--h1><?= Html::encode($this->title) ?></h1-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
