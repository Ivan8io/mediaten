<?php

namespace backend\controllers;

use backend\models\Category;
use backend\models\ProductTag;
use backend\models\Tag;
use Yii;
use backend\models\Product;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    public const ACTION_UPDATE = true;

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

        $this->save($model);

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

        $this->save($model, static::ACTION_UPDATE);

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
     * @param int $productId
     * @return void
     */
    protected function addTagsToProduct(array $tags, int $productId) : void
    {
        foreach ($tags as $tagId) {
            $productTag = new ProductTag();
            $productTag->product_id = $productId;
            $productTag->tag_id = $tagId;
            $productTag->save();
        }
    }

    /**
     * Create or Update product
     *
     * @param Product $model
     * @param string|null $actionUpdate
     * @return void|\yii\web\Response
     */
    protected function save(Product $model, string $actionUpdate = null)
    {
        $validModel = $model->load(Yii::$app->request->post()) && $model->save();

        if (!$validModel) {
            return;
        }

        if ($actionUpdate) {
            ProductTag::deleteAll(['product_id' => $model->id]);
        }

        if ($tags = Yii::$app->request->post('Product')['tags']) {
            $this->addTagsToProduct($tags, $model->id);
        }

        return $this->redirect(['view', 'id' => $model->id]);
    }
}