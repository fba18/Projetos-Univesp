<?php

namespace app\controllers;

use app\models\TbProduto;
use app\models\TbProdutoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use Yii;

/**
 * TbProdutoController implements the CRUD actions for TbProduto model.
 */
class TbProdutoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access'=> [
                    'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
                    ],
            ]
        );
    }

    /**
     * Lists all TbProduto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TbProdutoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TbProduto model.
     * @param int $num_produto Num Produto
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($num_produto)
    {
        return $this->render('view', [
            'model' => $this->findModel($num_produto),
        ]);
    }

    /**
     * Creates a new TbProduto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TbProduto();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('error', 'Dados salvos com sucesso!');
                //return $this->redirect(['view', 'num_produto' => $model->num_produto]);
                return $this->redirect(['update', 'num_produto' => $model->num_produto]);
                //return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TbProduto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $num_produto Num Produto
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($num_produto)
    {
        $model = $this->findModel($num_produto);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('error', 'Dados atualizados com sucesso!');
            return $this->redirect(['update', 'num_produto' => $model->num_produto]);
            //return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TbProduto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $num_produto Num Produto
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($num_produto)
    {
        $this->findModel($num_produto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TbProduto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $num_produto Num Produto
     * @return TbProduto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($num_produto)
    {
        if (($model = TbProduto::findOne(['num_produto' => $num_produto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
