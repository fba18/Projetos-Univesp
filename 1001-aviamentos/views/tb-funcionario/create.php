<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TbFuncionario $model */

$this->title = 'Create Tb Funcionario';
$this->params['breadcrumbs'][] = ['label' => 'Tb Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-funcionario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
