<?php
/**
 * @var yii\widgets\ActiveForm $form
 * @var webvimark\modules\UserManagement\models\rbacDB\Permission $model
 */

use webvimark\modules\UserManagement\models\rbacDB\AuthItemGroup;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>



<div class="content">
	<?php $form = ActiveForm::begin([
		'id'      => 'role-form',
		//'layout'=>'horizontal',
		'validateOnBlur' => false,
	]) ?>

		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h3 class="card-title">
								<i class="fas fa-edit"></i>
								<h4>&nbspPermissões:</h4>
								</h3>
							</div>

							<div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">

								<div class="container-fluid w-auto row">
									<div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">
										<?= $form->field($model, 'description')->textInput(['maxlength' => 255, 'autofocus'=>$model->isNewRecord ? true:false])->label('Descrição') ?>
									</div>
								</div>

								<div class="container-fluid w-auto row">
									<div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">
									<?= $form->field($model, 'name')->textInput(['maxlength' => 64])->label('Código') ?>
									</div>
								</div>

								<div class="container-fluid w-auto row">
									<div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">
										<?= $form->field($model, 'group_code')->dropDownList(ArrayHelper::map(AuthItemGroup::find()->asArray()->all(), 'code', 'name'), ['prompt'=>''])->label('Grupo') ?>
									</div>
								</div>

								<div class="container-fluid w-auto row">
									<div class="form-group col-lg-6 col-sm-12 col-xs-12 col-md-6">
										<?php if ( $model->isNewRecord ): ?>
											<?= Html::submitButton(
												'<span class="glyphicon glyphicon-plus-sign"></span> ' . UserManagementModule::t('back', 'Atualizar'),
												['class' => 'btn btn-success']
											) ?>
										<?php else: ?>
											<?= Html::submitButton(
												'<span class="glyphicon glyphicon-ok"></span> ' . UserManagementModule::t('back', 'Salvar'),
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
	<?php ActiveForm::end() ?>
</div>