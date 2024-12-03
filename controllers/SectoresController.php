<?php

namespace app\controllers;

use app\models\Sectores;
use app\models\SectoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SectoresController implements the CRUD actions for Sectores model.
 */
class SectoresController extends Controller
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
     * Lists all Sectores models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SectoresSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sectores model.
     * @param string $id_sector Id Sector
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_sector)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_sector),
        ]);
    }

    /**
     * Creates a new Sectores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Sectores();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_sector' => $model->id_sector]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Sectores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_sector Id Sector
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_sector)
    {
        $model = $this->findModel($id_sector);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_sector' => $model->id_sector]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sectores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_sector Id Sector
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_sector)
    {
        $this->findModel($id_sector)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sectores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_sector Id Sector
     * @return Sectores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_sector)
    {
        if (($model = Sectores::findOne(['id_sector' => $id_sector])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
