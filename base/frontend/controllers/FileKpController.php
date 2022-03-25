<?php

namespace frontend\controllers;

use common\models\FileKp;
use common\models\FileKpSearch;
use common\models\Proekt;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * FileKpController implements the CRUD actions for FileKp model.
 */
class FileKpController extends Controller
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
     * Lists all FileKp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FileKpSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FileKp model.
     * @param int $id_file_kp Id File Kp
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionViewproekt($id)
    {
//        return $this->render('view', [
//            'model' => $this->findModelproekt($id),
//        ]);
        $searchModel = new FileKpSearch();
        $dataProvider = $searchModel->searchproekt($id);
        $proekt = Proekt::findOne(['id_proekt'=>$id]);
        return $this->render('indexproekt', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'proekt'=>$proekt,
        ]);


    }

    /**
     * Creates a new FileKp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FileKp();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_file_kp]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreateproekt($id=null)
    {

        $model = new FileKp();
        if ($id){
            $model->id_proekt=$id;
        }
        $model->file_kp_kz = Yii::$app->user->id;
        $model->file_kp_ds = date('d-m-Y');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())){

        if ($file = UploadedFile::getInstances($model, 'file')){
            $dir = Yii::getAlias('@images').'/kp/';
            foreach ($file as $f){
                $model_new = new FileKp();
                $model_new->id_proekt =$model->id_proekt;
                $model_new->file_kp_kz = Yii::$app->user->id;
                $model_new->file_kp_ds = date('d-m-Y');
                $model_new->file_kp_ds = preg_replace('#(\d{2})-(\d{2})-(\d{4})#', '$3-$2-$1', $model_new->file_kp_ds) ;
                $model_new->file_kp_name = $f->baseName.'.'.$f->extension;

                $model_new->file_kp_content = strtotime('now').'_'.Yii::$app->getSecurity()->generateRandomString(6).'.'.$f->extension;
                $f->saveAs($dir.$model_new->file_kp_content);
                if (!$model_new->save()){
                    var_dump($model_new->errors);
                }
            }
        }
                //$model->save()
                return $this->redirect(['viewproekt', 'id' => $model->id_proekt]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FileKp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_file_kp Id File Kp
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['viewproekt', 'id' => $model->id_proekt]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FileKp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_file_kp Id File Kp
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->file_kp_del = 1;
        $model->file_kp_kz=Yii::$app->user->id;
        $model->file_kp_ds=date('d-m-Y');
        $model->file_kp_ds=preg_replace('#(\d{2})-(\d{2})-(\d{4})#', '$3-$2-$1', $model->file_kp_ds) ;
        $model->save(false);

        //return $this->redirect(['index']);


        //$this->findModel($id)->delete();

        return $this->redirect(Yii::$app->request->referrer);
        //return $this->redirect(['index']);
    }

    /**
     * Finds the FileKp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_file_kp Id File Kp
     * @return FileKp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FileKp::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findModelproekt($id)
    {
        if (($model = FileKp::find()->where(['id_proekt'=> $id])->all()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
