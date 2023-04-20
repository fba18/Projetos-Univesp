<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TbEstoque;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\TbEstoqueSearch $model */
/** @var yii\widgets\ActiveForm $form */

$model = new TbEstoque();
?>

<div class="tb-estoque-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                <i class="fas fa-search fa-fw"></i>
                                <h4> Consultar Produtos </h4>
                                </h3>
                            </div>

                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">

                                <div class="container-fluid w-auto row">
                                    <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
                                        <?php //$form->field($model, 'num_produto')->textInput()->label('Código Produto') ?>

                                        <?= $form->field($model, 'num_produto')->widget(Select2::classname(), [
                                            'data' => TbEstoque::getEstoques(),
                                            'options' => ['placeholder' => 'Selecione um produto', 'id' => 'num_produto_select2'],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],


                                        ])->label('Código Produto');



                                        ?>
                                    </div>
                                    <!--div class="col-lg-1 col-sm-12 col-xs-12 col-md-6">
                                        < ?= $form->field($model, 'qtd_itens')->textInput()->label('Qtd Itens') ?>
                                    </div-->
                                    <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
                                        <?php //$form->field($model, 'endereco_item')->textInput(['maxlength' => true])->label('Endereço Item') ?>

                                        <?= $form->field($model, 'endereco_item')->widget(Select2::classname(), [
                                            'data' => TbEstoque::getEstoquesEnd(),
                                            'options' => ['placeholder' => 'Selecione um endereço', 'id' => 'endereco_item_select2'],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],


                                        ])->label('Endereço Produto');



                                        ?>
                                    </div>
                                    <?php //$form->field($model, 'id_estoque') ?>
                                </div>
                                <div class="container-fluid w-auto row form-group">
                                    <div class="col-lg-4 col-sm-12 col-xs-12 col-md-6 btn-sm">
                                        <?= Html::a('Vincular estoque', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
                                        <?= Html::submitButton(Yii::t('app', '<i class="bi bi-search"></i> Pesquisar'), ['class' => 'btn btn-primary btn-sm']) ?>
                                        <?= Html::a('<i class="fa fa-sync fa-spin" style="animation-iteration-count: 1;animation-duration: 0.3s"></i> Limpar Filtros', ['index'], ['class' => 'btn btn-success btn-sm'])  ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php ActiveForm::end(); ?>

</div>
