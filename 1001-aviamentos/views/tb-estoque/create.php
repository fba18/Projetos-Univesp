<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TbEstoque $model */

$this->title = 'Create Tb Estoque';
$this->params['breadcrumbs'][] = ['label' => 'Tb Estoques', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-estoque-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
