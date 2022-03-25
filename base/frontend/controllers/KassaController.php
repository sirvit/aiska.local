<?php

namespace frontend\controllers;

use common\models\Kassa;
use common\models\KassaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KassaController implements the CRUD actions for Kassa model.
 */
class KassaController extends Controller
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
     * Lists all Kassa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KassaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kassa model.
     * @param int $id_kassa Id Kassa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_kassa)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_kassa),
        ]);
    }

    /**
     * Creates a new Kassa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kassa();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_kassa' => $model->id_kassa]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kassa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_kassa Id Kassa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_kassa)
    {
        $model = $this->findModel($id_kassa);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_kassa' => $model->id_kassa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kassa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_kassa Id Kassa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_kassa)
    {
        $this->findModel($id_kassa)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kassa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_kassa Id Kassa
     * @return Kassa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_kassa)
    {
        if (($model = Kassa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
