<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TbProduto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tb-produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num_produto')->textInput() ?>

    <?= $form->field($model, 'nome_produto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado_produto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco_produto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
