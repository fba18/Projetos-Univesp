<?php

/* @var $this \yii\web\View */
/* @var $content string */

\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
$this->registerCssFile('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
\hail812\adminlte3\assets\PluginAsset::register($this)->add(['fontawesome', 'icheck-bootstrap']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monitora - Login</title>
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body class="hold-transition login-page" style="background-color:#465eff">

<?php  $this->beginBody() ?>

    <div class="login-box" >
            <div class="login-logo">
                <a href="<?\yii\helpers\Url::home()?>" class="brand-link" style='font-family:calibri;font-size:24px;color:#fcfc30;'>
                    <p style="text-align:center">
                        <img src="" style="margin-right:2%;"  width='40px'>

                            <b >
                                1001
                            AVIAMENTOS
                            </b>

                        <hr>
						</hr>
                    </p>
                </a>
            </div>
        <!-- /.login-logo -->

        <?= $content ?>
    </div>
<!-- /.login-box -->
<?php $this->endBody() ?>
</body>
<footer class="footer" >
    <div class="container" style="font-family:calibri;color:#fcfc30 ">
        <b class="pull-left" >&copy; 1001 Aviamentos <?= date('Y') ?></b>
    </div>
</footer>

</html>
<?php $this->endPage() ?>