<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TbProduto;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\TbProdutoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tb-produto-search">

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
                                        <?php //$form->field($model, 'num_produto')->label('Código Produto') ?>
                                        <?= $form->field($model, 'num_produto')->widget(Select2::classname(), [
                                            'data' => TbProduto::getProdutos(),
                                            'options' => ['placeholder' => 'Selecione cód produto', 'id' => 'num_produto_select2'],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],


                                            ])->label('Código Produto');
                                        ?>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-xs-12 col-md-6">
                                        <?php // $form->field($model, 'nome_produto')->textInput(['maxlength' => true])->label('Nome Produto') ?>
                                        <?= $form->field($model, 'nome_produto')->widget(Select2::classname(), [
                                            'data' => TbProduto::getProdutosNome(),
                                            'options' => ['placeholder' => 'Selecione um produto', 'id' => 'endereco_item_select2'],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],


                                            ])->label('Nome Produto');
                                        ?>
                                    </div>
                                    <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
                                        <?php //$form->field($model, 'estado_produto')->textInput(['maxlength' => true])->label('Estado Produto') ?>
                                        <?= $form->field($model, 'estado_produto')->widget(Select2::classname(), [
                                            'data' => TbProduto::getProdutosEstadoProd(),
                                            'options' => ['placeholder' => 'Selecione estado', 'id' => 'estado_produto_select2'],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],


                                            ])->label('Estado Produto');
                                        ?>
                                    </div>
                                    <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
                                        <?php //$form->field($model, 'preco_produto')->textInput()->label('Preço Produto') ?>
                                        <?= $form->field($model, 'preco_produto')->widget(Select2::classname(), [
                                            'data' => TbProduto::getProdutosPreco(),
                                            'options' => ['placeholder' => 'Selecione preço', 'id' => 'preco_produto_select2'],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],


                                            ])->label('Preço Produto');
                                        ?>
                                    </div>
                                </div>
                                <div class="container-fluid w-auto row form-group">
                                    <div class="col-lg-4 col-sm-12 col-xs-12 col-md-6 btn-sm">
                                        <?= Html::a('Cadastrar Produto', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
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
