<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TbFuncionario $model */

$this->title = 'Update Tb Funcionario: ' . $model->id_matricula_funcionario;
$this->params['breadcrumbs'][] = ['label' => 'Tb Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_matricula_funcionario, 'url' => ['view', 'id_matricula_funcionario' => $model->id_matricula_funcionario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-funcionario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
