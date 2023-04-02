<?php

use app\models\TbEstoque;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\TbEstoqueSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tb Estoques';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-estoque-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tb Estoque', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_estoque',
            'num_produto',
            'qtd_itens',
            'endereco_item',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TbEstoque $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_estoque' => $model->id_estoque]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
