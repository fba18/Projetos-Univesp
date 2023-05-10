<?php

use webvimark\modules\UserManagement\models\User;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use webvimark\extensions\BootstrapSwitch\BootstrapSwitch;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\UserManagement\models\User $model
 * @var yii\bootstrap\ActiveForm $form
 */
?>



<div class="content">

	<div class="user-form">
		<?php $form = ActiveForm::begin(
			[
				'id'=>'user',
				//'layout'=>'horizontal',
				'validateOnBlur' => false,
			]);
		?>

			<section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    <h4>&nbspInformações do usuário:</h4>
                                    </h3>
                                </div>

                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">

                                    <div class="container-fluid w-auto row">
										<div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
											<?= $form->field($model->loadDefaultValues(), 'status')->dropDownList(User::getStatusList()) ?>
										</div>
										<div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
											<?= $form->field($model, 'matricula')->textInput(['maxlength' => 11, 'autocomplete'=>'off']) ?>
										</div>
										<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6">
											<?= $form->field($model, 'nome')->textInput(['maxlength' => 100, 'autocomplete'=>'off']) ?>
										</div>
										<div class="col-lg-2 col-sm-12 col-xs-12 col-md-6">
										<?= $form->field($model, 'data_nascimento')->textInput(['type' => 'date','class'=>'form-control datepicker']) ?>
										</div>
									</div>

									<div class="container-fluid w-auto row">
										<div class="col-lg-3 col-sm-12 col-xs-12 col-md-6">
											<?= $form->field($model, 'tipo_funcionario')->dropdownList(
													['Operacional' => 'Operacional', 'Gestor' => 'Gestor'],
													[
														'style' => 'font-size: 100%',
														'prompt' => 'Selecione Status',
														'id' => 'tipo_funcionario',
														'onchange' => '
															var tipo_funcionario = $("#tipo_funcionario").val();
															var superadmin = $("#superadmin");

															if(tipo_funcionario == "Gestor"){
																superadmin.val(1);
															} else {
																superadmin.val(0);
															}
														'
													]
												)->label('Tipo de Funcionário')
											?>
										</div>
										<div class="col-lg-3 col-sm-12 col-xs-12 col-md-6">
											<?= $form->field($model, 'username')->textInput(['maxlength' => 255, 'autocomplete'=>'off'])->label('Usuário') ?>
										</div>

										<div class="col-lg-3 col-sm-12 col-xs-12 col-md-6">
											<?= $form->field($model, 'superadmin')->textInput(['type'=>"hidden",'id' => 'superadmin'])->label('') ?>

										</div>


										<?php if ( $model->isNewRecord ): ?>

											<div class="col-lg-3 col-sm-12 col-xs-12 col-md-6">
												<?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off'])->label('Senha') ?>
											</div>


											<div class="col-lg-3 col-sm-12 col-xs-12 col-md-6">
												<?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off'])->label('Repita a senha') ?>
											</div>

										<?php endif; ?>
									</div>
									<div class="container-fluid w-auto row">
										<?php /*if ( User::hasPermission('bindUserToIp') ): ?>
											<div class="col-lg-3 col-sm-12 col-xs-12 col-md-6">
												<?= $form->field($model, 'bind_to_ip')
													->textInput(['maxlength' => 255])
													->hint(UserManagementModule::t('back','For example: 123.34.56.78, 168.111.192.12')) ?>
											</div>
										<?php endif;*/ ?>
										<?php if ( User::hasPermission('editUserEmail') ): ?>
											<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6">
												<?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
											</div>
											<div class="col-lg-3 col-sm-12 col-xs-12 col-md-6">
												<label>&nbsp</label>
												<?= $form->field($model, 'email_confirmed')->checkbox()->label('E-mail Confirmado') ?>
											</div>


										<?php endif; ?>
									</div>
									<div class="container-fluid w-auto row">
										<div class="form-group col-lg-6 col-sm-12 col-xs-12 col-md-6">
											<?php if ( $model->isNewRecord ): ?>
												<?= Html::submitButton(
													'<span class="glyphicon glyphicon-plus-sign"></span> ' . UserManagementModule::t('back', 'Salvar'),
													['class' => 'btn btn-success']
												) ?>
											<?php else: ?>
												<?= Html::submitButton(
													'<span class="glyphicon glyphicon-ok"></span> ' . UserManagementModule::t('back', 'Atualizar'),
													['class' => 'btn btn-primary']
												) ?>
											<?php endif; ?>
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

<?php BootstrapSwitch::widget() ?>