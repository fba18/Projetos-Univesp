<?php

use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\UserManagement\models\forms\ChangeOwnPasswordForm $model
 */

$this->title = UserManagementModule::t('back', '');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content">


	<div class="change-own-password" width="200px">

		<?php if ( Yii::$app->session->hasFlash('success') ): ?>
			<div class="alert alert-success text-center">
				<?= Yii::$app->session->getFlash('success') ?>
			</div>
		<?php endif; ?>

		<div class="user-form">

			<?php $form = ActiveForm::begin([
				'id'=>'user',
				//'layout'=>'horizontal',
				'validateOnBlur'=>false,
			]); ?>


				<section class="content" style='font-family:calibri; padding: 20px 0 0 400px'>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
								<div class="card card-primary card-outline">
									<div class="card-header">
										<h3 class="card-title">
										<i class="fas fa-edit"></i>
										<h4><strong> &nbsp Alterar Senha:</strong></h4>
										</h3>
									</div>

									<div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">

										<div class="container-fluid w-auto row">
											<div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">
												<?php if ( $model->scenario != 'restoreViaEmail' ): ?>
													<?= $form->field($model, 'current_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off'])->label('Senha Atual') ?>
												<?php endif; ?>
											</div>
										</div>
										<div class="container-fluid w-auto row">
											<div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">
												<?php if ( $model->scenario != 'restoreViaEmail' ): ?>
													<?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off'])->label('Nova Senha') ?>
												<?php endif; ?>
											</div>
										</div>
										<div class="container-fluid w-auto row">
											<div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">
												<?php if ( $model->scenario != 'restoreViaEmail' ): ?>
													<?= $form->field($model, 'repeat_password')->passwordInput(['maxlength' => 255, 'autocomplete'=>'off'])->label('Repita a nova senha') ?>
												<?php endif; ?>
											</div>
										</div>
										<div class="container-fluid w-auto row">
											<div class="form-group col-lg-6 col-sm-12 col-xs-12 col-md-6">

												<?= Html::submitButton('<span class="glyphicon glyphicon-ok"></span> ' . UserManagementModule::t('back', 'Salvar'),['class' => 'btn btn-primary']) ?>
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
</div>