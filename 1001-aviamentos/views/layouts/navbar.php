<?php

use yii\helpers\Html;




//Antigo:

\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);

$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');

$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

$publishedRes = Yii::$app->assetManager->publish('@vendor/hail812/yii2-adminlte3/src/web/js');
$this->registerJsFile($publishedRes[1].'/control_sidebar.js', ['depends' => '\hail812\adminlte3\assets\AdminLteAsset']);


?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">



<?php
                if (Yii::$app->user->isGuest&&Yii::$app->user->identity->superadmin==0) {

                    echo ' <!-- Navbar -->
                    <nav class="main-header navbar navbar-expand navbar-white navbar-light;" style="background-color:#348cb3;">
                        <!-- Left navbar links -->
                        <ul class="navbar-nav"><br><br></ul>

                        <img src="/" style="margin-right:2%;" width="35px">
                        <h4 style="color:yellow;"> 1001 AVIAMENTOS </h4>

                        '

                        /*
                        <li class="nav-item">'.
                        Html::a('<i class="fas fa-sign-out-alt"></i>', ['site/logout'], ['data-method' => 'post', 'class' => 'nav-link']).'
                        </li>
                        */
                        .'</nav>'

                        ;


                }

                else
                    {
                        echo '

                            <!-- Navbar -->
                                <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:#0879A6;">

                                    <!-- Left navbar links -->
                                    <ul class="navbar-nav">

                                        <li class="nav-item">
                                            <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color:#FFFFFF"><i class="fas fa-bars"></i></a>
                                        </li>
                                        <li class="nav-item d-none d-sm-inline-block">
                                            <a href="'.\yii\helpers\Url::home().'" class="nav-link" style="color:#FFFFFF">Home</a>
                                        </li>
                                        <!--li class="nav-item d-none d-sm-inline-block">
                                            <a href="#" class="nav-link" style="color:#007bff">Contact</a>
                                        </li-->
                                    </ul>

                                    <!-- Right navbar links -->



                                    <ul class="navbar-nav ml-auto">

                                        <!-- Navbar Search -->
                                        <!--li class="nav-item">

                                            <a class="nav-link" data-widget="navbar-search" href="#" role="button ">
                                                <i class="fas fa-search" style="color:#FFFFFF"></i>
                                            </a>

                                            <div class="navbar-search-block">

                                                <form class="form-inline">
                                                    <div class="input-group input-group-sm">
                                                        <input class="form-control form-control-navbar" style="background-color:#fff;border-color:#FFFFFF" type="search" placeholder="Search" aria-label="Search">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-navbar" type="submit">
                                                                <i class="fas fa-search" style="color:#FFFFFF"></i>
                                                            </button>
                                                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                                                <i class="fas fa-times" style="color:#FFFFFF"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>

                                        </li-->


                                        <!-- Messages Dropdown Menu -->


                                        <!-- Notifications Dropdown Menu -->





                                        <li class="nav-item">'.
                                        (strpos(Yii::$app->request->url, 'user-management') !== false ? Html::a('<i class="fas fa-sign-out-alt" style="color:#FFFFFF"></i>', ['../site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) : Html::a('<i class="fas fa-sign-out-alt" style="color:#FFFFFF"></i>', ['site/logout'], ['data-method' => 'post', 'class' => 'nav-link'])).'
                                        </li>


                                        <li class="nav-item">
                                            <a class="nav-link" style="color:#FFFFFF" data-widget="fullscreen" href="#" role="button">
                                                <i class="fas fa-expand-arrows-alt"></i>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" style="color:#FFFFFF" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                                                <i class="fas fa-th-large"></i>
                                            </a>
                                        </li>

                                    </ul>

                                </nav>
                            <!-- /.navbar -->
                        ';
                    }

?>