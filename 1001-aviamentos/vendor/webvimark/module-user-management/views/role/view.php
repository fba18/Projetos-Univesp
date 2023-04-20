<?php
/**
 * @var yii\widgets\ActiveForm $form
 * @var array $childRoles
 * @var array $allRoles
 * @var array $routes
 * @var array $currentRoutes
 * @var array $permissionsByGroup
 * @var array $currentPermissions
 * @var yii\rbac\Role $role
 */

use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\rbacDB\Role;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = UserManagementModule::t('back', 'Permissões para os Papéis:') . ' '. $role->description;
$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Papéis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content">
	<!--h2 class="lte-hide-title"><?= $this->title ?></h2-->

	<?php if ( Yii::$app->session->hasFlash('success') ): ?>
		<div class="alert alert-success text-center">
			<?= Yii::$app->session->getFlash('success') ?>
		</div>
	<?php endif; ?>

	<p>
		<?= GhostHtml::a(UserManagementModule::t('back', 'Editar'), ['update', 'id' => $role->name], ['class' => 'btn btn-sm btn-primary']) ?>
		<?= GhostHtml::a(UserManagementModule::t('back', 'Novo'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
	</p>


	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h3 class="card-title">
							<i class="fas fa-edit"></i>
							<h4>&nbspGerenciar Papéis:</h4>
							</h3>
						</div>

						<div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">

							<div class="container-fluid w-auto row">
								<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6">
									<div class="card">
										<div class="card-header">
											<h5 class="card-title">
												<span class="fa fa-th"></span> <?= UserManagementModule::t('back', '&nbspPapéis Filho') ?>
											</h5>
										</div>
										<div class="card-body">
											<?= Html::beginForm(['set-child-roles', 'id'=>$role->name]) ?>
												<div class="container-fluid w-auto row">
													<?php foreach ($allRoles as $aRole): ?>
														<div class="col-sm-6">
															<label>
																<?php $isChecked = in_array($aRole['name'], ArrayHelper::map($childRoles, 'name', 'name')) ? 'checked' : '' ?>
																<input type="checkbox" <?= $isChecked ?> name="child_roles[]" value="<?= $aRole['name'] ?>">
																<?= $aRole['description'] ?>
															</label>

															<?= GhostHtml::a(
																'<span class="glyphicon glyphicon-edit"></span>',
																['/user-management/role/view', 'id'=>$aRole['name']],
																['target'=>'_blank']
															) ?>
															<br/>
														</div>
													<?php endforeach ?>
												</div>

												<hr/>
												<?= Html::submitButton(
													'<span class="glyphicon glyphicon-ok"></span> ' . UserManagementModule::t('back', 'Save'),
													['class'=>'btn btn-primary btn-sm']
												) ?>



											<?= Html::endForm() ?>
										</div>
									</div>
								</div>

								<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6">
									<div class="card">
										<div class="card-header">
											<h5 class="card-title">
												<span class="fa fa-th"></span> <?= UserManagementModule::t('back', 'Permissões') ?>
											</h5>
										</div>

										<div class="card-body">
											<?= Html::beginForm(['set-child-permissions', 'id'=>$role->name]) ?>
												<div class="container-fluid w-auto row">


													<?php foreach ($permissionsByGroup as $groupName => $permissions): ?>
														<div class="col-sm-6">
															<fieldset>
																<legend><?= $groupName ?></legend>

																<?php foreach ($permissions as $permission): ?>
																	<label>
																		<?php $isChecked = in_array($permission->name, ArrayHelper::map($currentPermissions, 'name', 'name')) ? 'checked' : '' ?>
																		<input type="checkbox" <?= $isChecked ?> name="child_permissions[]" value="<?= $permission->name ?>">
																		<?= $permission->description ?>
																	</label>

																	<?= GhostHtml::a(
																		'<span class="fa fa-edit"></span>',
																		['/user-management/permission/view', 'id'=>$permission->name],
																		['target'=>'_blank', 'class' => 'ml-2']
																	) ?>
																	<br/>
																<?php endforeach ?>

															</fieldset>
															<br/>
														</div>


													<?php endforeach ?>
												</div>

												<hr/>
												<?= Html::submitButton(
													'<span class="fa fa-check"></span> ' . UserManagementModule::t('back', 'Salvar'),
													['class'=>'btn btn-primary btn-sm']
												) ?>

											<?= Html::endForm() ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</div>



<?php
$this->registerJs(<<<JS

$('.role-help-btn').off('mouseover mouseleave')
	.on('mouseover', function(){
		var _t = $(this);
		_t.popover('show');
	}).on('mouseleave', function(){
		var _t = $(this);
		_t.popover('hide');
	});
JS
);
?>