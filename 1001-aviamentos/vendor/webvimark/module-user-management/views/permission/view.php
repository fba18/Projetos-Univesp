<?php
/**
 * @var $this yii\web\View
 * @var yii\widgets\ActiveForm $form
 * @var array $routes
 * @var array $childRoutes
 * @var array $permissionsByGroup
 * @var array $childPermissions
 * @var yii\rbac\Permission $item
 */

use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\BootstrapPluginAsset;
BootstrapPluginAsset::register($this);
//use yii\bootstrap4\BootstrapAsset;
//BootstrapAsset::register($this);
//use yii\bootstrap4\BootstrapPluginAsset;
//BootstrapPluginAsset::register($this);


$this->title = UserManagementModule::t('back', 'Configurações de permissões') . ': ' . $item->description;
$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Permissões'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
	body {
		font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		font-size: 14px;
	}

	legend {
		font-size: 21px;
	}

	.card-header {
		padding: 10px 15px;
		font-size: 14px;
	}

	.btn-group-sm>.btn, .btn-sm {

    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
	}
	.sidebar-mini.sidebar-collapse .main-sidebar, .sidebar-mini.sidebar-collapse .main-sidebar::before {
		margin-left: 0;
		width: 7.28rem;
	}
	.sidebar-mini.sidebar-collapse .content-wrapper, .sidebar-mini.sidebar-collapse .main-footer, .sidebar-mini.sidebar-collapse .main-header {
		margin-left: 7.28rem!important;
	}
	.navbar {
	height: 66px;
	}
	aside {
	font-size: 16px;
	}
	.nav-sidebar>.nav-item .nav-icon.fa, .nav-sidebar>.nav-item .nav-icon.fab, .nav-sidebar>.nav-item .nav-icon.fad, .nav-sidebar>.nav-item .nav-icon.fal, .nav-sidebar>.nav-item .nav-icon.far, .nav-sidebar>.nav-item .nav-icon.fas, .nav-sidebar>.nav-item .nav-icon.ion, .nav-sidebar>.nav-item .nav-icon.svg-inline--fa {
		font-size: 1.7rem;
	}
	.user-panel, .user-panel .info {
		padding: 10px;
	}

	.brand-link {
		margin-left: 3px;
		margin-right: 12px;
	}

	.user-panel img {
		height: auto;
		width: 3.3rem;
		margin-left: -4px;
	}

	.nav {
		padding-left: 3px;
	}

	.form-control-sm {
		height: calc(2.5rem + 3px);
		padding: 0.25rem 0.5rem;
		font-size: 14px;
		line-height: 1.5;
		border-radius: 0.2rem;
	}

</style>

<div class="content">
	<!--h2 class="lte-hide-title"><?= $this->title ?></h2-->


	<?php if ( Yii::$app->session->hasFlash('success') ): ?>
		<div class="alert alert-success text-center">
			<?= Yii::$app->session->getFlash('success') ?>
		</div>
	<?php endif; ?>

	<p>
		<?= GhostHtml::a(UserManagementModule::t('back', 'Editar'), ['update', 'id' => $item->name], ['class' => 'btn btn-sm btn-primary']) ?>
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
								<h4>&nbspGerenciar Regras:</h4>
								</h3>
							</div>

							<div class="col-lg-12 col-sm-12 col-xs-12 col-md-6">

								<div class="container-fluid w-auto row">
									<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6">
										<div class="card">
											<div class="card-header">
												<h5 class="card-title">
													<span class="fa fa-th"></span><?= UserManagementModule::t('back', '&nbspPermissões Filho') ?>
												</h5>
											</div>
											<div class="card-body">
												<?= Html::beginForm(['set-child-permissions', 'id'=>$item->name]) ?>
													<div class="container-fluid w-auto row">
														<?php foreach ($permissionsByGroup as $groupName => $permissions): ?>
															<div class="col-sm-6">
																<fieldset>
																	<legend><?= $groupName ?></legend>
																	<!--hr/-->
																	<?php foreach ($permissions as $permission): ?>
																		<label>
																			<?php $isChecked = in_array($permission->name, ArrayHelper::map($childPermissions, 'name', 'name')) ? 'checked' : '' ?>
																			<input type="checkbox" <?= $isChecked ?> name="child_permissions[]" value="<?= $permission->name ?>">
																			<?= $permission->description ?>
																		</label>

																		<?= GhostHtml::a(
																			'<span class="fa fa-edit"></span>',
																			['view', 'id'=>$permission->name],
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
													)  ?>

												<?= Html::endForm() ?>
											</div>
										</div>
									</div>

									<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6">
										<div class="card">
											<div class="card-header">
												<h5 class="card-title">
													<span class="fa fa-th"></span> Rotas

													<?= Html::a(
														'Atualize as rotas (e exclua as não utilizadas)',
														['refresh-routes', 'id'=>$item->name, 'deleteUnused'=>1],
														[
															'class' => 'btn btn-default btn-sm pull-right',
															'style'=>'margin-top:-5px; text-transform:none;',
															'data-confirm'=>UserManagementModule::t('back', 'As rotas que não existem neste aplicativo serão excluídas. Não recomendado para aplicação com estrutura "avançada", pois frontend e backend possuem rotas próprias.'),
														]
													) ?>

													<?= Html::a(
														'Atualizar rotas',
														['refresh-routes', 'id'=>$item->name],
														[
															'class' => 'btn btn-default btn-sm float-right mr-2',
															'style'=>'margin-top:-5px; text-transform:none;',
														]
													) ?>
												</h5>
											</div>

											<div class="card-body">


												<?= Html::beginForm(['set-child-routes', 'id'=>$item->name]) ?>

													<div class="container-fluid w-auto row">
														<div class="col-sm-3">
															<?= Html::submitButton(
																'<span class="fas fa-check"></span> ' . UserManagementModule::t('back', 'Salvar'),
																['class'=>'btn btn-primary btn-sm']
															) ?>
														</div>

														<div class="col-sm-6">
															<input id="search-in-routes" autofocus="on" type="text" class="form-control form-control-sm" placeholder="Pesquisar rota">
														</div>

														<div class="col-sm-3 text-right">
															<span id="show-only-selected-routes" class="btn btn-default btn-sm">
																<i class="fa fa-minus"></i> Mostrar apenas selecionados
															</span>
															<span id="show-all-routes" class="btn btn-default btn-sm hide">
																<i class="fa fa-plus"></i> Mostrar tudo
															</span>

														</div>
													</div>

													<hr/>

													<?= Html::checkboxList(
														'child_routes',
														ArrayHelper::map($childRoutes, 'name', 'name'),
														ArrayHelper::map($routes, 'name', 'name'),
														[
															'id'=>'routes-list',
															'separator'=>'<div class="separator"></div>',
															'item'=>function($index, $label, $name, $checked, $value) {
																	return Html::checkbox($name, $checked, [
																		'value' => $value,
																		'label' => '<span class="route-text">' . $label . '</span>',
																		'labelOptions'=>['class'=>'route-label'],
																		'class'=>'route-checkbox',
																	]);
															},
														]
													) ?>

													<hr/>
													<?= Html::submitButton(
														'<span class="fas fa-check"></span> ' . UserManagementModule::t('back', 'Salvar'),
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
$js = <<<JS


var routeCheckboxes = $('.route-checkbox');
var routeText = $('.route-text');

// For checked routes
var backgroundColor = '#D6FFDE';

function showAllRoutesBack() {
	$('#routes-list').find('.hide').each(function(){
		$(this).removeClass('hide');
	});
}

//Make tree-like structure by padding controllers and actions
routeText.each(function(){
	var _t = $(this);

	var chunks = _t.html().split('/').reverse();
	var margin = chunks.length * 40 - 40;

	if ( chunks[0] == '*' )
	{
		margin -= 40;
	}

	_t.closest('label').css('margin-left', margin);

});

// Highlight selected checkboxes
routeCheckboxes.each(function(){
	var _t = $(this);

	if ( _t.is(':checked') )
	{
		_t.closest('label').css('background', backgroundColor);
	}
});

// Change background on check/uncheck
routeCheckboxes.on('change', function(){
	var _t = $(this);

	if ( _t.is(':checked') )
	{
		_t.closest('label').css('background', backgroundColor);
	}
	else
	{
		_t.closest('label').css('background', 'none');
	}
});


// Hide on not selected routes
$('#show-only-selected-routes').on('click', function(){
	$(this).addClass('hide');
	$('#show-all-routes').removeClass('hide');

	routeCheckboxes.each(function(){
		var _t = $(this);

		if ( ! _t.is(':checked') )
		{
			_t.closest('label').addClass('hide');
			_t.closest('div.separator').addClass('hide');
		}
	});
});

// Show all routes back
$('#show-all-routes').on('click', function(){
	$(this).addClass('hide');
	$('#show-only-selected-routes').removeClass('hide');

	showAllRoutesBack();
});

// Search in routes and hide not matched
$('#search-in-routes').on('change keyup', function(){
	var input = $(this);

	if ( input.val() == '' )
	{
		showAllRoutesBack();
		return;
	}

	routeText.each(function(){
		var _t = $(this);

		if ( _t.html().indexOf(input.val()) > -1 )
		{
			_t.closest('label').removeClass('hide');
			_t.closest('div.separator').removeClass('hide');
		}
		else
		{
			_t.closest('label').addClass('hide');
			_t.closest('div.separator').addClass('hide');
		}
	});
});

JS;

$this->registerJs($js);

?>