<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap4\Breadcrumbs;
//use yii\widgets\Breadcrumbs;
//use app\assets\AppAsset;



//AppAsset::register($this);

?>
<div class="content-wrapper ">

     <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0"><strong>
                         <?php
                        if (!is_null($this->title)) {
                            echo \yii\helpers\Html::encode($this->title);
                        } else {
                            echo \yii\helpers\Inflector::camelize($this->context->id);
                        }
                        ?>
                        </strong>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-4">
                    <?php
                    echo Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => [
                            'class' => 'breadcrumb float-sm-right'
                        ]
                    ]);
                    ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <!--  <div class="content">
  Colocar a $ content--><!-- /.container-fluid -->
    <!--</div>-->
    <!-- /.content -->


    <!-- Main content -->
    <section class="content ">
        <div class="container-fluid ">
            <?= $content ?>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>