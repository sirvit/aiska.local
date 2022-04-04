<?php

namespace frontend\controllers;

use common\models\Street;
use common\models\StreetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StreetController implements the CRUD actions for Street model.
 */
class StreetController extends Controller
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
     * Lists all Street models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StreetSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Street model.
     * @param int $s_id S ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($s_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($s_id),
        ]);
    }

    /**
     * Creates a new Street model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Street();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 's_id' => $model->s_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Street model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $s_id S ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($s_id)
    {
        $model = $this->findModel($s_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 's_id' => $model->s_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Street model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $s_id S ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($s_id)
    {
        $this->findModel($s_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Street model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $s_id S ID
     * @return Street the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($s_id)
    {
        if (($model = Street::findOne(['s_id' => $s_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
