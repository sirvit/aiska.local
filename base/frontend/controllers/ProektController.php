<?php

namespace frontend\controllers;

use common\models\Proekt;
use common\models\ProektSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ProektController implements the CRUD actions for Proekt model.
 */
class ProektController extends Controller
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
//                        [
//                            'allow' => true,
//                            'roles' => ['@'],
//                        ],
                        [
                            'allow' => true,
                            'actions' => ['index'],
                            'roles' => ['workProekt'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['view'],
                            'roles' => ['workProekt'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['create'],
                            'roles' => ['workProekt'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['update'],
                            'roles' => ['workProekt'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['delete'],
                            'roles' => ['workProekt'],
                        ],
                    ],
                ],

            ]
        );
    }

    /**
     * Lists all Proekt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProektSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Proekt model.
     * @param int $id_proekt id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Proekt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Proekt();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->p_zapros=preg_replace('#(\d{2})-(\d{2})-(\d{4})#', '$3-$2-$1', $model->p_zapros) ;
                $model->p_dz=preg_replace('#(\d{2})-(\d{2})-(\d{4})#', '$3-$2-$1', $model->p_dz) ;

                if ($model->save()){
                    return $this->redirect(['index', 'id' => $model->id_proekt]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }
//        $model->p_zapros = strtotime(date('d-m-Y'));
        $model->p_zapros = date('d-m-Y');
        $model->p_dz = date('d-m-Y');
        $model->p_kz=Yii::$app->user->id;
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Proekt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_proekt id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->p_zapros=preg_replace('#(\d{4})-(\d{2})-(\d{2})#', '$3-$2-$1', $model->p_zapros) ;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_proekt' => $model->id_proekt]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Proekt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_proekt id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        //$this->findModel($id_proekt)->delete();
        $model = $this->findModel($id);
        $model->p_del = 1;
        $model->p_zapros=preg_replace('#(\d{2})-(\d{2})-(\d{4})#', '$3-$2-$1', $model->p_zapros) ;
        $model->p_kz=Yii::$app->user->id;
        $model->p_dz=date('d-m-Y');
        $model->p_dz=preg_replace('#(\d{2})-(\d{2})-(\d{4})#', '$3-$2-$1', $model->p_dz) ;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Proekt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_proekt id
     * @return Proekt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Proekt::findOne($id)) !== null) {
            $model->p_zapros=preg_replace('#(\d{4})-(\d{2})-(\d{2})#', '$3-$2-$1', $model->p_zapros) ;

            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
