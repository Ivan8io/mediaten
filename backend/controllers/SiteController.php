<?php
namespace backend\controllers;

use backend\models\Category;
use backend\models\Product;
use backend\models\Tag;
use common\models\User;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

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
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
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
        $mainSections = [
            'users' => [
                'label' => 'Пользователи',
                'class' => 'bg-aqua',
                'count' => User::find()->count(),
                'url' => Url::to(['user/index'])
            ],
            'products' => [
                'label' => 'Товары',
                'class' => 'bg-green',
                'count' => Product::find()->count(),
                'url' => Url::to(['product/index'])
            ],
            'categories' => [
                'label' => 'Категории',
                'class' => 'bg-yellow',
                'count' => Category::find()->count(),
                'url' => Url::to(['category/index'])
            ],
            'tags' => [
                'label' => 'Теги',
                'class' => 'bg-red',
                'count' => Tag::find()->count(),
                'url' => Url::to(['tag/index'])
            ]
        ];

        return $this->render('index', [
            'mainSections' => $mainSections
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main-login';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
