<?php
/**
 *
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var webvimark\modules\UserManagement\models\rbacDB\Role $model
 */
use webvimark\modules\UserManagement\UserManagementModule;

$this->title = UserManagementModule::t('back', 'Criação de Papel');
$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Papéis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!--h2 class="lte-hide-title"><?= $this->title ?></h2-->

<div class="panel panel-default">
	<div class="panel-body">
		<?= $this->render('_form', [
			'model'=>$model,
		]) ?>
	</div>
</div>