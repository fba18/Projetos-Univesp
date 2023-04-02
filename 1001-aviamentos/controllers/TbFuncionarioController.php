<?php

namespace app\controllers;

use app\models\TbFuncionario;
use app\models\TbFuncionarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TbFuncionarioController implements the CRUD actions for TbFuncionario model.
 */
class TbFuncionarioController extends Controller
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
            ]
        );
    }

    /**
     * Lists all TbFuncionario models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TbFuncionarioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TbFuncionario model.
     * @param int $id_matricula_funcionario Id Matricula Funcionario
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_matricula_funcionario)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_matricula_funcionario),
        ]);
    }

    /**
     * Creates a new TbFuncionario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TbFuncionario();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_matricula_funcionario' => $model->id_matricula_funcionario]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TbFuncionario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_matricula_funcionario Id Matricula Funcionario
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_matricula_funcionario)
    {
        $model = $this->findModel($id_matricula_funcionario);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_matricula_funcionario' => $model->id_matricula_funcionario]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TbFuncionario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_matricula_funcionario Id Matricula Funcionario
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_matricula_funcionario)
    {
        $this->findModel($id_matricula_funcionario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TbFuncionario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_matricula_funcionario Id Matricula Funcionario
     * @return TbFuncionario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_matricula_funcionario)
    {
        if (($model = TbFuncionario::findOne(['id_matricula_funcionario' => $id_matricula_funcionario])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
