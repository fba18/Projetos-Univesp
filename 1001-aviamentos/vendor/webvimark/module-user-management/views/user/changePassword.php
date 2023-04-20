<?php

use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\UserManagement\models\User $model
 */

$this->title = UserManagementModule::t('back', 'Alterar senha do usuário: ') . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Users'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = UserManagementModule::t('back', 'Alterar senha do usuário');
?>



<div class="content">

	<div class="user-form">

		<?php $form = ActiveForm::begin([
			'id'=>'user',
			//'layout'=>'horizontal',
		]); ?>

			<section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    <h4>&nbspAlterar Senha:</h4>
                                    </h3>
                                </div>

                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">

                                    <div class="container-fluid w-auto row">
										<div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">
											<?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off'])->label('Senha:') ?>
										</div>
									</div>
									<div class="container-fluid w-auto row">
										<div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">
											<?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off'])->label('Repita a senha:') ?>
										</div>
									</div>
									<div class="container-fluid w-auto row">
										<div class="form-group col-lg-6 col-sm-12 col-xs-12 col-md-6">
											<?php if ( $model->isNewRecord ): ?>
												<?= Html::submitButton(
													'<span class="glyphicon glyphicon-plus-sign"></span> ' . UserManagementModule::t('back', 'Create'),
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