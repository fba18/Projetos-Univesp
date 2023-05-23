<?php

use app\models\TbProduto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;

use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\grid\EditableColumn;
use yii\bootstrap\Collapse;
use yii\data\ActiveDataProvider;
use yii\bootstrap\Modal;
use kartik\export\ExportMenu;
use kartik\editable\Editable;

/** @var yii\web\View $this */
/** @var app\models\TbProdutoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tb-produto-index">

    <!--h1><?= Html::encode($this->title) ?></h1-->
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <!--?= Html::a('Create Tb Produto', ['create'], ['class' => 'btn btn-success']) ?-->
    </p>

    <?php Pjax::begin(); ?>


        <div class="table-responsive col-lg-12 col-xs-12 col-sm-12  " >
            <?= GridView::widget(
                [
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'responsive'=>true,
                    'resizableColumns'=>false,
                    'responsiveWrap' => false,
                    'striped'=>true,
                    'containerOptions'=>['style'=>'overflow: auto; font-size:1.0em;',],
                    'options' =>['class'=>'table table-condensed' ,'style'=>'font-size:1.0em'],
                    'toolbar'=>[
                        '{export}',
                        '{toggleData}'
                    ],
                    'hover'=>true,
                    'panel' => [

                        'heading'=>'&nbsp',

                        'type'=>'primary',

                        'before'=>
                            Html::a('<i class="fa fa-sync fa-spin" style="animation-iteration-count: 1;animation-duration: 0.3s"></i> Limpar Filtros'
                            , ['index'], ['class' => 'btn btn-primary btn-sm']),


                        'footer'=>'',
                    ],
                    'columns' => [
                        //['class' => 'yii\grid\SerialColumn'],

                        'num_produto',
                        'nome_produto',
                        'estado_produto',

                        //'preco_produto',
                        [
                            'attribute' => 'preco_produto',
                            'format' => ['raw'],
                            //'label' => 'Preço Produto',
                            'value' => function ($model) {
                               return \Yii::$app->formatter->asCurrency($model->preco_produto, 'R$ ');
                            }
                         ],
                        /*[
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, TbProduto $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'num_produto' => $model->num_produto]);
                            }
                        ],*/
                        [

                            'label' => 'Ações',
                            'format' => 'raw',
                            'attribute'=>'acoes',

                            // here comes the problem - instead of parent_region I need to have parent
                            'value' => function ($dataProvider) {
                                return Html::a('<i class="bi bi-pencil"></i> Tratar',  Url::to("/tb-produto/update?num_produto=".$dataProvider['num_produto'], true), ['class' => 'btn btn-danger btn-sm', 'role' => 'modal-remote','target'=>'_blank']);
                            }
                        ],
                    ],

                ]);
            ?>
        </div>
    <?php Pjax::end(); ?>

</div>
