<?php

use app\models\TbFuncionario;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\TbFuncionarioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tb Funcionarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-funcionario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tb Funcionario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_matricula_funcionario',
            'nome',
            'data_nascimento',
            'email:email',
            'tipo_funcionario',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TbFuncionario $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_matricula_funcionario' => $model->id_matricula_funcionario]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
