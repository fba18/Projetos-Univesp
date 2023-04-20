<?php
/**
 * @var yii\web\View $this
 * @var array $permissionsByGroup
 * @var webvimark\modules\UserManagement\models\User $user
 */

use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\rbacDB\Role;
use webvimark\modules\UserManagement\UserManagementModule;
//use yii\bootstrap\BootstrapPluginAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;


//BootstrapPluginAsset::register($this);
$this->title = UserManagementModule::t('back', 'Regras e permissões para o usuário:') . ' ' . $user->username;

$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Usuários'), 'url' => ['/user-management/user/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content">


	<!--h2 class="lte-hide-title"><?= $this->title ?></h2-->

	<?php if ( Yii::$app->session->hasFlash('success') ): ?>
		<div class="alert alert-success text-center">
			<?= Yii::$app->session->getFlash('success') ?>
		</div>
	<?php endif; ?>

	<?= Html::beginForm(['set-roles', 'id'=>$user->id]) ?>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h3 class="card-title">
							<i class="fas fa-edit"></i>
							<h4>&nbspGerenciar Regras:</h4>
							</h3>
						</div>

						<div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">

							<div class="container-fluid w-auto row">
								<div class="col-lg-4 col-sm-12 col-xs-12 col-md-6">
									<div class="card">
										<div class="card-header">
											<h5 class="card-title">
												<span class="fa fa-th"></span><?= UserManagementModule::t('back', '&nbspRegras') ?>
											</h5>
										</div>
										<div class="card-body">

												<?php foreach (Role::getAvailableRoles() as $aRole): ?>
													<div class="form-check">
														<label class="form-check-label">
															<?php $isChecked = in_array($aRole['name'], ArrayHelper::map(Role::getUserRoles($user->id), 'name', 'name')) ? 'checked' : '' ?>

															<?php if ( Yii::$app->getModule('user-management')->userCanHaveMultipleRoles ): ?>
																<input class="form-check-input" type="checkbox" <?= $isChecked ?> name="roles[]" value="<?= $aRole['name'] ?>">

															<?php else: ?>
																<input class="form-check-input" type="radio" <?= $isChecked ?> name="roles" value="<?= $aRole['name'] ?>">

															<?php endif; ?>

															<?= $aRole['description'] ?>
														</label>
														<label class="form-check-label">
															<?= GhostHtml::a(
																'<span class="fa fa-edit"></span>',
																['/user-management/role/view', 'id'=>$aRole['name']],
																['target'=>'_blank', 'class' => 'ml-2']
															) ?>
														</label>
													</div>

												<?php endforeach ?>

												<br/>

												<?php if ( Yii::$app->user->isSuperadmin OR Yii::$app->user->id != $user->id ): ?>

													<?= Html::submitButton(
														'<span class="fa fa-check"></span> ' . UserManagementModule::t('back', 'Salvar'),
														['class'=>'btn btn-primary mt-3']
													) ?>
												<?php else: ?>
													<div class="alert alert-warning well-sm text-center">
														<?= UserManagementModule::t('back', 'Você não pode alterar suas próprias permissões') ?>
													</div>
												<?php endif; ?>


												<?= Html::endForm() ?>

										</div>
									</div>
								</div>

								<div class="col-lg-8 col-sm-12 col-xs-12 col-md-6">
									<div class="card">
										<div class="card-header">
											<h5 class="card-title">
												<span class="fa fa-th"></span> <?= UserManagementModule::t('back', 'Permissões') ?>
											</h5>
										</div>
										<div class="card-body">
											<div class="container-fluid w-auto row">
												<?php foreach ($permissionsByGroup as $groupName => $permissions): ?>

													<div class="col-sm-6">
														<fieldset>
															<legend><?= $groupName ?></legend>

															<ul>
																<?php foreach ($permissions as $permission): ?>
																	<li>
																		<?= $permission->description ?>

																		<?= GhostHtml::a(
																			'<span class="fa fa-edit"></span>',
																			['/user-management/permission/view', 'id'=>$permission->name],
																			['target'=>'_blank', 'class' => 'ml-2']
																		) ?>
																	</li>
																<?php endforeach ?>
															</ul>
														</fieldset>

														<br/>
													</div>

												<?php endforeach ?>
											</div>
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