<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use yii\helpers\Url;
use kartik\grid\EditableColumn;
use yii\bootstrap\Collapse;
use yii\data\ActiveDataProvider;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
use kartik\editable\Editable;
use yii\widgets\DatePicker;
use app\models\TbProduto;
use kartik\select2\Select2;

use yii\helpers\ArrayHelper;
use app\models\TbProdutoSearch;
use yii\widgets\MaskedInput;

//use yii;
//use yii\grid\GridView;
$produtoModel = new TbProduto();

$this->title = Yii::t('app', 'Saldo Estoque');

/** @var yii\web\View $this */
/** @var app\models\TbEstoque $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="content">
    <?php
    //var_dump($produtoModel);die;
    //$produtos=$produtoModel->getProdutos();
    //var_dump($produtos);

    //echo "<br><br>";
    //echo "este é o resultado: ";

    ?>

    <div class="tb-estoque-form">
        <?php $form = ActiveForm::begin(); ?>
        <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    <h4>&nbsp1 - Produto:</h4>
                                    </h3>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">
                                    <div class="container-fluid w-auto row">
                                        <?php
                                            $id = Yii::$app->request->get('id_estoque');
                                            if($id !== null) {
                                                //Apenas Update(Atualização)
                                                $produtoModel->num_produto = $xb->num_produto;
                                                $produtoModel->nome_produto = $xb->nome_produto;
                                                $produtoModel->estado_produto = $xb->estado_produto;
                                                $produtoModel->preco_produto = $xb->preco_produto;
                                                //var_dump($xb->num_produto)
                                                ?>
                                                <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
                                                    <?= $form->field($produtoModel, 'num_produto')->textInput(['readonly'=> true, 'maxlength' => true])->label('Código Produto') ?>
                                                    <?php //echo $numProduto;
                                                    //var_dump(TbProduto::getProdutos()); die; ?>
                                                </div>
                                                <div class="col-lg-4 col-sm-12 col-xs-12 col-md-6">
                                                    <?= $form->field($produtoModel, 'nome_produto')->textInput(['readonly'=> true, 'maxlength' => true, 'id' => 'nome_produto', ])->label('Nome Produto') ?>
                                                </div>
                                                <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
                                                    <?= $form->field($produtoModel, 'estado_produto')->textInput(['readonly'=> true, 'maxlength' => true, 'id' => 'estado_produto'])->label('Estado Produto') ?>
                                                </div>
                                                <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
                                                    <?php //$form->field($produtoModel, 'preco_produto')->textInput(['readonly'=> true, 'id' => 'preco_produto'])->label('Preço Produto') ?>

                                                    <?= $form->field($produtoModel, 'preco_produto')->widget(MaskedInput::className(), [
                                                        'clientOptions' => [
                                                            'alias' => 'currency',
                                                            'prefix' => 'R$ ',
                                                            'digits' => 2,
                                                            'digitsOptional' => false,
                                                            'radixPoint' => ',',
                                                            'groupSeparator' => '.',
                                                            'autoGroup' => true,
                                                            'removeMaskOnSubmit' => true,
                                                        ],
                                                        'options' => ['style'=> ' ', 'class'=> 'input form-control ','readonly' => true, // Adiciona a opção para deixar somente leitura
                                                        ]
                                                    ])->label('Preço Produto') ?>
                                                    <style>
                                                        input[name="TbProduto[preco_produto]"].form-control {
                                                            text-align: left;
                                                        }
                                                    </style>
                                                <?php



                                            } else {
                                                //Apenas Create(Novo item)
                                                ?>
                                                <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
                                                    <?= $form->field($produtoModel, 'num_produto')->widget(Select2::classname(), [
                                                        'data' => TbProduto::getProdutos(),
                                                        'options' => ['placeholder' => 'Selecione um produto', 'id' => 'num_produto_select2'],
                                                        'pluginOptions' => [
                                                            'allowClear' => true,
                                                        ],
                                                        'pluginEvents' => [
                                                            "change" => "function() {
                                                                if ($(this).val().length > 3) {
                                                                    $.post('/tb-estoque/obter-dados?num_produto=' + $(this).val(), function(data) {
                                                                        var vl = JSON.parse(data);
                                                                        $('input#nome_produto').val(vl[1]);
                                                                        $('input#estado_produto').val(vl[2]);

                                                                        $('input#preco_produto').val('R$ ' + Number(vl[3]).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                                                                        $('input#num_produto_estoque').val(vl[0]);

                                                                        //Para vincular o código do produto à ID Estoque
                                                                        var num_produto_estoque = $('#num_produto_estoque').val();
                                                                        var id_estoque = $('#id_estoque');

                                                                        id_estoque.val(num_produto_estoque);

                                                                    });
                                                                } else {
                                                                    alert('Erro');
                                                                }
                                                            }",
                                                        ],
                                                    ]);



                                                    ?>
                                                    <?php //echo $numProduto;
                                                    //var_dump(TbProduto::getProdutos()); die; ?>
                                                </div>
                                                <div class="col-lg-4 col-sm-12 col-xs-12 col-md-6">
                                                    <?= $form->field($produtoModel, 'nome_produto')->textInput(['readonly'=> true, 'maxlength' => true, 'id' => 'nome_produto', ])->label('Nome Produto') ?>
                                                </div>
                                                <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
                                                    <?= $form->field($produtoModel, 'estado_produto')->textInput(['readonly'=> true, 'maxlength' => true, 'id' => 'estado_produto'])->label('Estado Produto') ?>
                                                </div>
                                                <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
                                                    <?= $form->field($produtoModel, 'preco_produto')->textInput(['readonly'=> true, 'id' => 'preco_produto'])->label('Preço Produto') ?>
                                                    <?php /*$form->field($model, 'preco_produto')->widget(MaskedInput::className(), [
                                                        'clientOptions' => [
                                                            'alias' => 'currency',
                                                            'prefix' => 'R$ ',
                                                            'digits' => 2,
                                                            'digitsOptional' => false,
                                                            'radixPoint' => ',',
                                                            'groupSeparator' => '.',
                                                            'autoGroup' => true,
                                                            'removeMaskOnSubmit' => true,
                                                        ],
                                                        'options' => ['style'=> ' ', 'class'=> 'input form-control ','readonly' => true, ]
                                                    ])->label('Preço Produto') */ ?>
                                                    <!--style>
                                                        input[name="TbProduto[preco_produto]"].form-control {
                                                            text-align: left;
                                                        }
                                                    </style-->
                                                </div>
                                            <?php

                                            }
                                        ?>
                                     </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    <h4>&nbsp2 - Saldo Estoque:</h4>
                                    </h3>
                                </div>

                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">

                                    <div class="container-fluid w-auto row">
                                    <?= $form->field($model, 'id_estoque')->textInput([
                                            'type'=>"hidden",
                                            'id' => 'id_estoque',
                                        ])->label('')
                                    ?>
                                        <!--div class="col-lg-2 col-sm-12 col-xs-12 col-md-6"-->
                                            <!--?= $form->field($model, 'id_estoque')->textInput() ?-->
                                            <?= $form->field($model, 'num_produto')->textInput(['type'=>"hidden",'id' => 'num_produto_estoque'])->label('') ?>



                                        <!--/div-->

                                        <div class="col-lg-1 col-sm-12 col-xs-12 col-md-6">
                                            <?= $form->field($model, 'qtd_itens')->textInput()->label('Qtd Itens') ?>
                                        </div>
                                        <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
                                            <?= $form->field($model, 'endereco_item')->textInput(['maxlength' => true])->label('Endereço Item') ?>
                                        </div>

                                        <!-- Botão Gravar da tela principal -->

                                        <div class="form-group col-lg-1 col-sm-12 col-xs-12 col-md-6 ">
                                            <label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Salvar') : Yii::t('app', '<i class="glyphicon glyphicon-floppy-save"></i>&nbspAtualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary btn-sm']) ?>
                                        </div>
                                        <!--div class="form-group"-->
                                            <!--?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?-->
                                        <!--/div-->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php ActiveForm::end(); ?>

    </div>
</div>




<script>

const numProdutoSelect2 = document.getElementById('num_produto_select2');
const nomeProdutoInput = document.getElementById('tbproduto-nome_produto');

numProdutoSelect2.addEventListener('change', function(){
    const selectedNumProduto = numProdutoSelect2.value;
    nomeProdutoInput.innerHTML = '';

    if(selectedNumProduto !== ''){
        const url = '<?= Url::to(['tb-produto/get-produtos']) ?>' + '?num_produto=' + encodeURIComponent(selectedNumProduto);

        fetch(url)
            .then(response => response.json())
            .then(produtos => {
                produtos.forEach(produto => {
                    const option = document.createElement('option');
                    option.value = produto;
                    option.textConten =produto;
                    nomeProdutoInput.appendChild(option);
                });

            })
            .catch(error => {
                console.error('Erro ao buscar Nome do Produto:', error);
            });
    }

});

</script>
