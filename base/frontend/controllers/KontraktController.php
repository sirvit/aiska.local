<?php

namespace frontend\controllers;

use common\models\Kontrakt;
use common\models\KontraktSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KontraktController implements the CRUD actions for Kontrakt model.
 */
class KontraktController extends Controller
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
                'access' => [
                    'class' => \yii\filters\AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],

            ]
        );
    }

    /**
     * Lists all Kontrakt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KontraktSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kontrakt model.
     * @param int $id_kontrakt Id Kontrakt
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_kontrakt)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_kontrakt),
        ]);
    }

    /**
     * Creates a new Kontrakt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kontrakt();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_kontrakt' => $model->id_kontrakt]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kontrakt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_kontrakt Id Kontrakt
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_kontrakt)
    {
        $model = $this->findModel($id_kontrakt);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_kontrakt' => $model->id_kontrakt]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kontrakt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_kontrakt Id Kontrakt
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_kontrakt)
    {
        $this->findModel($id_kontrakt)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kontrakt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_kontrakt Id Kontrakt
     * @return Kontrakt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_kontrakt)
    {
        if (($model = Kontrakt::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
