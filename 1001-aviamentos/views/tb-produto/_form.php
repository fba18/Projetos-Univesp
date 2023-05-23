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

use yii\helpers\ArrayHelper;
use app\models\TbProdutoSearch;
use yii\widgets\MaskedInput;

//use yii;
//use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TbProduto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="content">
    <div class="tb-produto-form">

        <?php $form = ActiveForm::begin(); ?>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    <h4>&nbspProduto:</h4>
                                    </h3>
                                </div>

                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">

                                    <div class="container-fluid w-auto row">
                                        <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
                                            <?= $form->field($model, 'num_produto')->textInput()->label('Código Produto') ?>
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-xs-12 col-md-6">
                                            <?= $form->field($model, 'nome_produto')->textInput(['maxlength' => true])->label('Nome Produto') ?>
                                        </div>
                                        <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
                                            <?php //$form->field($model, 'estado_produto')->textInput(['maxlength' => true])->label('Estado Produto') ?>
                                            <?= $form->field($model, 'estado_produto')->dropDownList([
                                                'Novo' => 'Novo',
                                                'Usado' => 'Usado',
                                            ], ['prompt' => 'Selecione uma opção']) ?>
                                        </div>
                                        <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
                                            <?= $form->field($model, 'preco_produto')->widget(MaskedInput::className(), [
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
                                                'options' => ['style'=> ' ', 'class'=> 'input form-control ']
                                            ])->label('Preço Produto') ?>
                                            <style>
                                                input[name="TbProduto[preco_produto]"].form-control {
                                                    text-align: left;
                                                }
                                            </style>
                                        </div>
                                        <div class="form-group col-lg-1 col-sm-12 col-xs-12 col-md-6 ">
                                            <label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Salvar') : Yii::t('app', '<i class="glyphicon glyphicon-floppy-save"></i>&nbspAtualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary btn-sm']) ?>
                                            <!--div class="form-group"-->
                                                <!--?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?-->
                                            <!--/div-->
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
</div>