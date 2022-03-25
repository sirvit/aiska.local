<?php

namespace frontend\controllers;

use common\models\FileTz;
use common\models\FileTzSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FileTzController implements the CRUD actions for FileTz model.
 */
class FileTzController extends Controller
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
     * Lists all FileTz models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FileTzSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FileTz model.
     * @param int $id_file_tz Id File Tz
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_file_tz)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_file_tz),
        ]);
    }

    /**
     * Creates a new FileTz model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FileTz();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_file_tz' => $model->id_file_tz]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FileTz model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_file_tz Id File Tz
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_file_tz)
    {
        $model = $this->findModel($id_file_tz);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_file_tz' => $model->id_file_tz]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FileTz model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_file_tz Id File Tz
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_file_tz)
    {
        $this->findModel($id_file_tz)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FileTz model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_file_tz Id File Tz
     * @return FileTz the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_file_tz)
    {
        if (($model = FileTz::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
