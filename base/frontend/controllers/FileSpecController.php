<?php

namespace frontend\controllers;

use common\models\FileSpec;
use common\models\FileSpecSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FileSpecController implements the CRUD actions for FileSpec model.
 */
class FileSpecController extends Controller
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
     * Lists all FileSpec models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FileSpecSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FileSpec model.
     * @param int $id_file_spec Id File Spec
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_file_spec)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_file_spec),
        ]);
    }

    /**
     * Creates a new FileSpec model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FileSpec();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_file_spec' => $model->id_file_spec]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FileSpec model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_file_spec Id File Spec
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_file_spec)
    {
        $model = $this->findModel($id_file_spec);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_file_spec' => $model->id_file_spec]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FileSpec model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_file_spec Id File Spec
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_file_spec)
    {
        $this->findModel($id_file_spec)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FileSpec model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_file_spec Id File Spec
     * @return FileSpec the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_file_spec)
    {
        if (($model = FileSpec::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
