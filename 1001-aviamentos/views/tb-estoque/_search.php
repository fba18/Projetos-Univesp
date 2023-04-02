<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TbEstoqueSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tb-estoque-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_estoque') ?>

    <?= $form->field($model, 'num_produto') ?>

    <?= $form->field($model, 'qtd_itens') ?>

    <?= $form->field($model, 'endereco_item') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
