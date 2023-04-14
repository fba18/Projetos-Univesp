<?php

use yii\helpers\Html;



?>

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#001040;">
    <!-- Brand Logo -->
    <a href="../index" class="brand-link" style='font-family:calibri; color:#fcfc30;'>
        <img src="/" style="margin-left:9px;margin-right:12px" width='40px'>
        <b style='font-size:30px;'>
            1001
        </b>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!--div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block" style="color:#fcfc30">1001 Aviamentos</a>
            </div>
        </div-->

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->

        <nav class="mt-2">
            <?php
            if (!Yii::$app->user->isGuest && Yii::$app->user->identity->superadmin == 0) {
                if (Yii::$app->user->identity->funcao <> 'Externo 3corp') {
                    echo \hail812\adminlte\widgets\Menu::widget(
                        [
                            'items' =>
                            [
                                /*[
                                        'label' => 'Starter Pages',
                                        'icon' => 'tachometer-alt',
                                        'badge' => '<span class="right badge badge-info">2</span>',
                                        'items' => [
                                            ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                                            ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                                        ]
                                    ],*/





                                [
                                    'label' => 'Geral',
                                    'icon' => 'bi bi-globe',
                                    'items' =>
                                    [
                                        ['label' => 'Trocar Senha', 'icon' => 'bi bi-key', 'url' => ['/user-management/user/change-my-password']],
                                    ],
                                ],

                            ],
                        ]
                    );

                    //caso não for externo imprime o menu acima
                } else {
                    echo \hail812\adminlte\widgets\Menu::widget(
                        [
                            'items' =>
                            [
                                [
                                    'label' => 'Controle de Termos de Instalação e Desinstalação',
                                    'icon' => 'far',
                                    'items' =>
                                    [
                                        [
                                            'label' => 'Listagem', 'url' => ['#'],
                                        ],
                                    ],

                                ],
                            ],
                        ]
                    );
                }
            }

            if (!Yii::$app->user->isGuest && Yii::$app->user->identity->superadmin == 1) {
                echo \hail812\adminlte\widgets\Menu::widget(
                    [
                        'items' =>
                        [

                            [
                                'label' => 'Geral',
                                'icon' => 'bi bi-globe',
                                'items' =>
                                [
                                    ['label' => 'Trocar Senha', 'icon' => 'bi bi-key', 'url' => ['/user-management/user/change-my-password']],
                                    ['label' => 'Funcionário', 'icon' => 'bi bi-key', 'url' => ['/user-management/user']],
                                ],
                            ],

                            [
                                'label' => 'Estoque',
                                'icon' => 'bi bi-globe',
                                'items' =>
                                [
                                    ['label' => 'Produto', 'icon' => 'bi bi-key', 'url' => ['/tb-produto']],
                                    ['label' => 'Saldo Estoque', 'icon' => 'bi bi-key', 'url' => ['/tb-estoque']],
                                ],
                            ],


                            //['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                            //['label' => 'Yii2 PROVIDED', 'header' => true],
                            //['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                            //['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                            //['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                            //['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
                            /*['label' => 'Level1'],
                                    [
                                        'label' => 'Level1',
                                        'items' => [
                                            ['label' => 'Level2', 'iconStyle' => 'far'],
                                            [
                                                'label' => 'Level2',
                                                'iconStyle' => 'far',
                                                'items' => [
                                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                                                ]
                                            ],
                                            ['label' => 'Level2', 'iconStyle' => 'far']
                                        ]
                                    ],*/
                            //['label' => 'Level1'],
                            //['label' => 'LABELS', 'header' => true],
                            //['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                            //['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                            //['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                        ],


                    ]
                );
            }

            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>