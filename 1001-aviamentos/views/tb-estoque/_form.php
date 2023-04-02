<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TbEstoque $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tb-estoque-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_estoque')->textInput() ?>

    <?= $form->field($model, 'num_produto')->textInput() ?>

    <?= $form->field($model, 'qtd_itens')->textInput() ?>

    <?= $form->field($model, 'endereco_item')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
