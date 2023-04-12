<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;



use app\assets\AppAsset;

AppAsset::register($this);

/*\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);

$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');

$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

$publishedRes = Yii::$app->assetManager->publish('@vendor/hail812/yii2-adminlte3/src/web/js');
$this->registerJsFile($publishedRes[1].'/control_sidebar.js', ['depends' => '\hail812\adminlte3\assets\AdminLteAsset']);*/

?>

<!--link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"-->


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<?php $this->registerCsrfMetaTags() ?>-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body class="hold-transition sidebar-mini sidebar-collapse" style="min-width:100%; "><!--  layout-fixed  -->
    <?php $this->beginBody() ?>

        <div class="wrapper">
            <?php
            //<!-- Navbar -->
            include_once('navbar.php');
            //<!-- /.navbar -->

            //<!-- Main Sidebar Container -->
            include_once('sidebar.php');

            //<!-- Content Wrapper. Contains page content -->
            include_once('content.php');
            //<!-- /.content-wrapper -->

            //<!-- Main Footer -->
            include_once('footer.php');

            //<!-- Control Sidebar -->
            include_once('control-sidebar.php');
            //<!-- /.control-sidebar -->

            ?>

        </div>


    <?php $this->endBody() ?>

    <style type="text/css">
      .ui-datepicker table {
          font-size: .8em;
      }
    </style>

    <style type="text/css">
        .nav-sidebar{
            nav-legacy;
      }
    </style>



<!-- TESTE 2 -->

<!-- Bootstrap 4 -->
<script><?php echo file_get_contents("../vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js",  FILE_USE_INCLUDE_PATH) ?></script>

<!-- Select2 -->
<script><?php echo file_get_contents("../vendor/almasaeed2010/adminlte/plugins/select2/js/select2.full.min.js",  FILE_USE_INCLUDE_PATH) ?></script>

<!-- Bootstrap4 Duallistbox -->
<script><?php echo file_get_contents("../vendor/almasaeed2010/adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js",  FILE_USE_INCLUDE_PATH) ?></script>

<!-- InputMask -->
<script><?php echo file_get_contents("../vendor/almasaeed2010/adminlte/plugins/moment/moment.min.js",  FILE_USE_INCLUDE_PATH) ?></script>
<script><?php echo file_get_contents("../vendor/almasaeed2010/adminlte/plugins/inputmask/jquery.inputmask.min.js",  FILE_USE_INCLUDE_PATH) ?></script>

<!-- date-range-picker -->
<script><?php echo file_get_contents("../vendor/almasaeed2010/adminlte/plugins/daterangepicker/daterangepicker.js",  FILE_USE_INCLUDE_PATH) ?></script>

<!-- bootstrap color picker -->
<script><?php echo file_get_contents("../vendor/almasaeed2010/adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js",  FILE_USE_INCLUDE_PATH) ?></script>

<!-- Tempusdominus Bootstrap 4 -->
<script><?php echo file_get_contents("../vendor/almasaeed2010/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js",  FILE_USE_INCLUDE_PATH) ?></script>

<!-- Bootstrap Switch -->
<script><?php echo file_get_contents("../vendor/almasaeed2010/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js",  FILE_USE_INCLUDE_PATH) ?></script>

<!-- BS-Stepper -->
<script><?php echo file_get_contents("../vendor/almasaeed2010/adminlte/plugins/bs-stepper/js/bs-stepper.min.js",  FILE_USE_INCLUDE_PATH) ?></script>

<!-- dropzonejs -->
<script><?php echo file_get_contents("../vendor/almasaeed2010/adminlte/plugins/dropzone/min/dropzone.min.js",  FILE_USE_INCLUDE_PATH) ?></script>




<!-- Page specific script -->



<!-- FIM TESTE 2 -->

</body>
</html>
<?php $this->endPage() ?>