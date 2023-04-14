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
//use yii;
//use yii\grid\GridView;

$this->title = Yii::t('app', 'Saldo Estoque');

/** @var yii\web\View $this */
/** @var app\models\TbEstoque $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="content">
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
                                    <h4>&nbsp2 - Saldo Estoque:</h4>
                                    </h3>
                                </div>

                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">

                                    <div class="container-fluid w-auto row">
                                        <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
                                            <!--?= $form->field($model, 'id_estoque')->textInput() ?-->
                                            <?= $form->field($model, 'num_produto')->textInput()->label('Código Produto') ?>
                                        </div>
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
