<?php

namespace backend\controllers;

use common\models\LoginForm;
use common\rules\AuthorproektRule;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'role'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['canAdmin'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRole(){
/** Создание Ролей */
//        $admin = Yii::$app->authManager->createRole('admin');
//        $admin->description = 'Администратор';
//        Yii::$app->authManager->add($admin);
//
//        $content = Yii::$app->authManager->createRole('content');
//        $content->description = 'Контент менеджер';
//        Yii::$app->authManager->add($content);
//
//        $user = Yii::$app->authManager->createRole('user');
//        $user->description = 'Пользователь';
//        Yii::$app->authManager->add($user);
//
//        $ban = Yii::$app->authManager->createRole('banned');
//        $ban->description = 'Заблокированный';
//        Yii::$app->authManager->add($ban);

/** Создание Разрешений */
//        $permit = Yii::$app->authManager->createPermission('updateProekt');
//        $permit->description = 'Право редактировать Proekt';
//        Yii::$app->authManager->add($permit);


/** Наследования ролей и прав */
//        $role_a = Yii::$app->authManager->getRole('admin');
//        $role_c = Yii::$app->authManager->getRole('content');
//        $permit = Yii::$app->authManager->getPermission('canAdmin');
//        Yii::$app->authManager->addChild($role_a, $permit);
//        Yii::$app->authManager->addChild($role_c, $permit);

/** Привязка ролей к пользователю */
//        $userRole = Yii::$app->authManager->getRole('admin');
//        Yii::$app->authManager->assign($userRole, 1);

//        $auth = Yii::$app->authManager;
//        $rule = new AuthorproektRule();
//        $auth->add($rule);
//
//        $updateOwnPost = $auth->createPermission('updateOwnProekt');
//        $updateOwnPost->description = 'Редактировать Проекты';
//        $updateOwnPost->ruleName = $rule->name;
//        $auth->add($updateOwnPost);

// "updateOwnPost" наследует право "updatePost"
//        $updatePost = Yii::$app->authManager->getPermission('updateProekt');
//        $auth->addChild($updateOwnPost, $updatePost);

//        $author = Yii::$app->authManager->getRole('manager');
// и тут мы позволяем автору редактировать свои посты
//        $auth->addChild($author, $updateOwnPost);


        return 'Role RBAC created';
    }
}
