<?php

namespace app\controllers;

use app\models\TbEstoque;
use app\models\TbEstoqueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\TbProduto;
use app\models\TbProdutoSearch;
use Yii;

/**
 * TbEstoqueController implements the CRUD actions for TbEstoque model.
 */
class TbEstoqueController extends Controller
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
     * Lists all TbEstoque models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TbEstoqueSearch();
        /*$dataProvider = $searchModel->search($this->request->queryParams);

        */

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => TbEstoque::find()
                ->select(['tb_estoque.*', 'tb_produto.nome_produto', 'tb_produto.estado_produto', 'tb_produto.preco_produto'])
                ->leftJoin('tb_produto', 'tb_estoque.num_produto = tb_produto.num_produto'),
            'sort' => [
                'attributes' => [

                    'id_estoque',
                    'num_produto',
                    'qtd_itens',
                    'endereco_item',
                    'nome_produto',
                    'estado_produto',
                    'preco_produto',
                ],
            ],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TbEstoque model.
     * @param int $id_estoque Id Estoque
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_estoque)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_estoque),
        ]);
    }

    /**
     * Creates a new TbEstoque model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TbEstoque();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('error', 'Dados atualizados com sucesso!');
                return $this->redirect(['update', 'id_estoque' => $model->id_estoque]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TbEstoque model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_estoque Id Estoque
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_estoque)
    {
        $model = $this->findModel($id_estoque);


        /*if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_estoque' => $model->id_estoque]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);*/

        $produtoModel = TbProduto::findOne($model->num_produto);

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        Yii::$app->session->setFlash('error', 'Dados atualizados com sucesso!');
        return $this->redirect(['update', 'id' => $model->id_estoque]);
        //return $this->redirect(['index']);
    }

    return $this->render('update', [
        'model' => $model,
        'produtoModel' => $produtoModel,
    ]);

    }

    public  static function actionObterDados($num_produto){


        $produtoModel = new TbProduto();
        $data = $produtoModel->getProdutos2($num_produto);
        //var_dump($data);
       // echo $item['preco_produto'];
        return json_encode($data);
    }

    /**
     * Deletes an existing TbEstoque model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_estoque Id Estoque
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_estoque)
    {
        $this->findModel($id_estoque)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TbEstoque model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_estoque Id Estoque
     * @return TbEstoque the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_estoque)
    {
        if (($model = TbEstoque::findOne(['id_estoque' => $id_estoque])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



}