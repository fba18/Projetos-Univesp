<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TbFuncionarioSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tb-funcionario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_matricula_funcionario') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'data_nascimento') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'tipo_funcionario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
