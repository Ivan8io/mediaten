<?php

namespace backend\controllers;

use backend\models\Category;
use backend\models\ProductTag;
use backend\models\Tag;
use Yii;
use backend\models\Product;
use backend\models\ProductSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if ($tags = Yii::$app->request->post('Product')['tags']) {
                $this->addTagsToProduct($tags, $model->id);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        $categoryNamesList = Category::getNamesList();
        $tagNamesList = Tag::getNamesList();

        return $this->render('create', [
            'model' => $model,
            'categoryNamesList' => $categoryNamesList,
            'tagNamesList' => $tagNamesList
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $categoryNamesList = Category::getNamesList();
        $tagNamesList = Tag::getNamesList();

        return $this->render('update', [
            'model' => $model,
            'categoryNamesList' => $categoryNamesList,
            'tagNamesList' => $tagNamesList
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не существует.');
    }

    /**
     * Fill product_tag table when creating product
     *
     * @param array $tags
     * @param int $id
     *
     * @return void
     */
    protected function addTagsToProduct(array $tags, int $id)
    {
        foreach ($tags as $tag) {
            $productTag = new ProductTag();
            $productTag->product_id = $id;
            $productTag->tag_id = $tag;
            $productTag->save();
        }
    }

}
